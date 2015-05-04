<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/


namespace yii\cfusermgmt\backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\helpers\Url;

/******Models we goona use in this controller*****/
use yii\cfusermgmt\common\models\UserGroup;


class UserGroupController extends Controller{
    
    #################################### CONTROLLER BASE ####################################
    
    
    #################################### CONTROLLER BASE ####################################
    
    
    
    
    #################################### ADMIN FUNCTIONS ####################################
    
    /*
     * To show all the records (Users) listing
     * return the view of listing of records (Users)
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $results = UserGroup::find()->onCondition(['type'=>'1']);   //Type 1 is for Role (Type 2 is for permission)
            $pagination = new Pagination(['defaultPageSize'=>DEFAULT_PAGE_SIZE, 'totalCount'=> $results->count()]);
            $results = $results->offset($pagination->offset)->limit($pagination->limit)->orderBy('name')->all();
            return $this->render('index', ['results'=>$results, 'pagination'=>$pagination]);
        }else{
            Yii::$app->session->setFlash("danger", 'You have to be logged in to perform any private operation', true);
            $this->redirect(Url::to(['user/login']));
        }    
    }
    
    /**
     * To add a record into the model (User)
     * @return : view of add record (User) form
     */
    public function actionSave()
    {
        if(!Yii::$app->user->isGuest){
            $model = new UserGroup;
            $model->scenario = 'userGroup';
            if($model->load(Yii::$app->request->post())){
                $model->type = 1; // type 1 is for Role
                if($model->validate()){
                    $model->save(false) ? Yii::$app->session->setFlash('success', 'You have been registered successfully', true) : Yii::$app->session->setFlash('danger', 'Your registration was not successful.', true);
                    return $this->refresh();
                }    
            }
            return $this->render('save', ['model'=>$model]);
        }else{
            Yii::$app->session->setFlash("danger", 'You have to be logged in to perform any private operation', true);
            $this->redirect(Url::to(['user/login']));
        }    
    }
    
    /**
     * To see the particular record information (User Profile)
     * @param type $id : record id to fetch the particular user Profile Detail (user_id)
     * @return : view of record information (User Profile)
     */
    public function actionView($id = NULL)
    {
        if(!Yii::$app->user->isGuest){
            $model = UserGroup::findOne($id);
            if(isset($model) && !empty($model)){
                return $this->render('view', ['model'=>$model]);
            }else{
                Yii::$app->session->setFlash("danger", 'Invalid role or role does not exist', true);
                return $this->redirect(Url::to(['user-group/index']));
            }
        }
    }
    
    /**
     * To edit the record information (User Profile)
     * @param long $id : To get the particular user's id
     * @return : the view of edit User form
     */
    public function actionEdit($name = NULL)
    {
        if(!Yii::$app->user->isGuest){
            $model = UserGroup::findOne($name);
            if(isset($model) && !empty($model)){
                $model->scenario = 'userGroup';
                if($model->load(Yii::$app->request->post()) && $model->updateAll(['name'=>$model->name], ['name'=>$name])){
                    Yii::$app->session->setFlash("success", 'Role has been updated successfully', true);
                    return $this->redirect(Url::to(['user-group/index']));
                }else{
                    return $this->render('edit', ['model'=>$model]);
                }
            }else{
                Yii::$app->session->setFlash("danger", 'Invalid Role', true);
                return $this->redirect(Url::to(['user/index']));
            }
        }else{
            Yii::$app->session->setFlash("danger", 'You have to be looged in to perform any private operation', true);
            return $this->redirect(Url::to(['user/index']));
        }
    }
    
    #################################### ADMIN FUNCTIONS ####################################
    
    
    
    
    
    #################################### AJAX FUNCTIONS ####################################
    
    public function actionDeleteRole()
    {
        $name = $_POST['id'];
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if(strtolower($name) == strtolower(SUPER_ADMIN_ROLE_NAME)){
                return ['status'=>'blocked', 'message'=>'This role can never be deleted as it is SuperAdmin('.SUPER_ADMIN_ROLE_NAME.')'];
            }
            if(isset($_POST['confirmed']) && !empty($_POST['confirmed'])){
                $model = AuthItem::findOne($name);
                if(isset($model) && !empty($model)){
                    return ($model->deleteAll(['name'=>$model->name])) ? ['status'=>'success', 'recordDeleted'=>DELETED] : ['status'=>'failure'];
                }
            }else{
                $modelChildren = AuthItemChild::getAllChildren($name);
                $modelParent = AuthItemChild::getAllParent($name);
                if((count($modelParent) !=0) || (count($modelChildren)  != 0)){
                    return ['status'=>'staged', 'childOrParent'=>true, 'children'=>  count($modelChildren), 'parent'=>  count($modelParent)];
                }else{
                    return ['status'=>'staged', 'childOrParent'=>false];
                }
            }
                
        }
    }
    
    
    #################################### AJAX FUNCTIONS ####################################
    
    
}
    

