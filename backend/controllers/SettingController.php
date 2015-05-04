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
use yii\cfusermgmt\common\models\Setting;


class SettingController extends Controller{
    
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
            $model = new Setting;
            $results = $model->find();
            $pagination = new Pagination(['defaultPageSize'=>DEFAULT_PAGE_SIZE, 'totalCount'=> $results->count()]);
            $results = $results->offset($pagination->offset)->limit($pagination->limit)->orderBy('id')->all();
            return $this->render('index', ['results'=>$results, 'model'=>$model, 'pagination'=>$pagination]);
        }else{
            Yii::$app->session->setFlash("danger", 'You have to be logged in to perform any private operation', true);
            $this->redirect(Url::to(['user/login']));
        }    
    }
    
    
    
    /**
     * To edit the record information (User Profile)
     * @param long $id : To get the particular user's id
     * @return : the view of edit User form
     */
    public function actionEdit($id = NULL)
    {
        if(!Yii::$app->user->isGuest){
            $model = Setting::findOne(['id'=>$_POST['id']]);
            if(isset($model) && !empty($model)){
                $model->value = $_POST['value'];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $model->update(false) ? ['status'=>'success'] : ['status'=>'failure'];
            }else{
                Yii::$app->session->setFlash("danger", 'Invalid Setting', true);
                $this->refresh();
            }
        }else{
            Yii::$app->session->setFlash("danger", 'You have to be looged in to perform any private operation', true);
            $this->redirect(Url::to(['user/index']));
        }
    }
    
    #################################### ADMIN FUNCTIONS ####################################
    
    

    #################################### AJAX FUNCTIONS ####################################
    
    #################################### AJAX FUNCTIONS ####################################
    
    
}
    

