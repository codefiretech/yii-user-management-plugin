<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

namespace yii\cfusermgmt\frontend\controllers;

use Yii;
use yii\web\Controller;
//use yii\data\Pagination;
use yii\helpers\Url;

######## Model we gonna use for this controller #########
use yii\cfusermgmt\common\models\User;
use yii\cfusermgmt\common\models\UserDetail;
use yii\cfusermgmt\common\models\LoginForm;
use yii\cfusermgmt\frontend\models\PasswordResetRequestForm;
use yii\cfusermgmt\frontend\models\ResetPasswordForm;
use yii\cfusermgmt\common\models\UserGroup;
use yii\cfusermgmt\common\models\AuthAssignment;
use yii\web\UploadedFile;

class UserController extends Controller{
    
    #################################### CONTROLLER BASE ####################################
    
    //public $defaultAction = 'dashboard';
    
    
    /**
     * To specify the behaviors to use for this model
     * @return : behaviors to use for this controller
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=> \yii\filters\AccessControl::className(),
                'only'=>['logout', 'register', 'index'],
                'rules'=>[
                    [
                        'actions'=>['register', 'index'],
                        'allow'=>true,
                        'roles'=>['?'],
                    ],
                    [
                        'actions'=>['logout', 'dashboard', 'index'],
                        'allow'=>true,
                        'roles'=>['@'],
                    ],
                ],
            ],
            
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    #################################### CONTROLLER BASE ####################################
    
    
    
    
    #################################### USER FUNCTIONS ####################################
    
    /**
     * To get log in the user
     * 
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return (LOGIN_REDIRECT_URL_FOR_USER != '') ? $this->redirect([LOGIN_REDIRECT_URL_FOR_USER]) : $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * To get log out the user
     * 
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', 'You have been logged out successfully');
        return (LOGOUT_REDIRECT_URL_FOR_USER != '') ? $this->redirect([LOGOUT_REDIRECT_URL_FOR_USER]) : $this->goHome();
    }
    
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        $model->scenario = 'requestPasswordReset';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }
        return $this->render('requestPasswordResetToken', ['model' => $model,]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
     * To register a guest
     * @return : view of registration form
     */
    public function actionRegister()
    {
        if(NEW_REGISTRATION_IS_ALLOWED){
            $model = new User;
            $modelUser = new UserDetail;
            $model->scenario = 'register';
            if($model->load(Yii::$app->request->post())){
                if($model->validate()){
                    $model->auth_key = User::generateNewAuthKey();
                    $model->password_hash = User::setNewPassword($model->password);
                    if($model->save(false)){
                        $modelUser->user_id = $model->id;
                        if($modelUser->save(false)){
                            $userGroups = UserGroup::find()->onCondition(['type'=>'1'])->asArray()->all();
                            $roleNames = [];
                            foreach($userGroups as $userGroup){
                                $roleNames[] = $userGroup['name'];
                            }
                            if(in_array(DEFAULT_ROLE_NAME, $roleNames)){
                                $userRole = new AuthAssignment;
                                $userRole->item_name = DEFAULT_ROLE_NAME;
                                $userRole->user_id = $model->id;
                                $userRole->created_at = time();
                                $userRole->save();
                            }
                            if(SEND_REGISTRATION_MAIL){ 
                                User::sendMail('welcome-email', $model, $model->email, 'Welcome to - '.SITE_NAME);
                            }
                            Yii::$app->session->setFlash('success', 'You have been registered successfully');
                        }else{
                            Yii::$app->session->setFlash('success', 'Your registration was not successful.');
                        }
                        return $this->refresh();
                    }
                }
            }
            return $this->render('register', ['model'=>$model]);
        }else{
            Yii::$app->session->setFlash('danger', 'Currently new registrations are not allowed by administrator. Please try later.');
            return $this->goHome();
        }    
    }
    
    /**
     * To show the dashboard options for the currently logged in user
     * @return : view for the dashboard of the currently logged in user
     */
    public function actionDashboard()
    {
        if(!Yii::$app->user->isGuest){
                $model = Yii::$app->user->getIdentity();
                return $this->render('dashboard', ['model'=>$model]);
        }else{
            Yii::$app->session->setFlash("danger", 'You have to be logged in to perform any private operation', true);
            $this->redirect(Url::to(['user/login']));
        }  
    }
    
    /**
     * To show the currently logged in user's profile view
     * @return : view for the currently logged in user profile
     */
    public function actionMyProfile()
    {
        if(!Yii::$app->user->isGuest){
            $user_id = Yii::$app->user->getId();
            $model = User::find()->innerJoinWith('userDetail')->onCondition(['users.id'=>$user_id])->one();
            if(isset($model) && !empty($model)){
                $genderOptions = User::findGenderOptions();
                $maritalOptions = User::findMaritalStatusOptions();
                return $this->render('my-profile', ['model'=>$model, 'genderOptions'=>$genderOptions, 'maritalOptions'=>$maritalOptions]);
            }
        }
    }
    
    /**
     * To show the edit profile form to the currently logged in user
     * @return : view for the edit form to edit the profile information (of the currently logged in user)
     */
    public function actionEditProfile()
    {
        if(!Yii::$app->user->isGuest){
            $user_id = Yii::$app->user->getId();
            $model = User::find()->innerJoinWith('userDetail')->onCondition(['users.id'=>$user_id])->one();
            if(isset($model) && !empty($model)){
                $model->scenario = 'editProfile';
                $model->userDetail->scenario = 'editProfile';
                $filePath = 'images/'.USER_PROFILE_IMAGES_DIRECTORY.'/';
                $this->uploadFile($model, $filePath);
                if(($model->load(Yii::$app->request->post()) | $model->userDetail->load(Yii::$app->request->post())) & ((($model->userDetail->update())))){
                        Yii::$app->session->setFlash("success", 'Your profile has been updated successfully', true);
                        return $this->refresh();
                }  
                else{
                    $genderOptions = User::findGenderOptions();
                    $maritalOptions = User::findMaritalStatusOptions();
                    return $this->render('edit-profile', ['model'=>$model, 'genderOptions'=>$genderOptions, 'maritalOptions'=>$maritalOptions]);
                }
            }    
        }else{
            Yii::$app->session->setFlash("danger", 'You have to be logged in to perform any private operation', true);
            $this->redirect(Url::to(['user/login']));
        }
    }
    
    /**
     * To show the Change Password for the currently logged in user
     * @return : view for the change password (For the currently logged in user)
     */
    public function actionChangePassword()
    {
        if(!Yii::$app->user->isGuest){
            $model = Yii::$app->user->getIdentity();
            $model->scenario = 'changePassword';
            if($model->load(Yii::$app->request->post())){
                if($model->validate()){
                    $model->auth_key = User::generateNewAuthKey();
                    $model->password_hash = User::setNewPassword($model->password);
                    if($model->update()){
                        if(SEND_PASSWORD_CHANGE_MAIL){ 
                            User::sendMail('change-password-email', $model, $model->email, 'Password changed for - '.SITE_NAME);
                        }
                        Yii::$app->session->setFlash('success', 'You password has been changed successfully', true);
                    }else{
                        Yii::$app->session->setFlash('danger', 'Your password NOT changed successfullly', true);
                    }
                }
            }
            return $this->render('change-password', ['model'=>$model]);
        }else{
            $this->goHome();
        }    
    }
    
    public function actionRegisterUsingApis($using = NULL){
        if(isset($using) && !empty($using))
        {
            switch($using){
                case 'twitter':
                    
            }
        }        
    }
    
    public function actionSendVerifyEmail(){
        $model = Yii::$app->user->getIdentity();
        if(!empty($model)){
            if(User::sendMail('verifyEmail', $model, $model->email, 'Verify Your Email Address for - '.SITE_NAME)){
                Yii::$app->session->setFlash('success', 'An email has been send to <strong>'.$model->email.'</strong>. Please check your email for further instructions');
                return $this->redirect(['user/my-profile']);
            }
        }
    }
    
    public function actionVerifyEmail($id = NULL, $token = NULL){
        $model = User::find()->onCondition(['id'=>$id, 'auth_key'=>$token])->one();
        if(isset($model) && !empty($model)){
            if($model->email_verified != VERIFIED){
                $model->scenario = 'emailVerification';
                $model->email_verified = VERIFIED;
                if($model->update()){
                    Yii::$app->session->setFlash("success", 'Your email has been verified successfully', true);
                }
            }else{
                    Yii::$app->session->setFlash("danger", 'Your email has been already verified. You don\'t need to do it again', true);
            }
        }else{
            Yii::$app->session->setFlash("danger", 'Invalid verification link', true);
        }    
        return $this->redirect(['user/my-profile']);
    }
    
    public function actionClearCache(){
        if(Yii::$app->cache->flush()){
            Yii::$app->session->setFlash("success", 'Frontend cache has been cleared successfully', true);
        }else{
            Yii::$app->session->setFlash("danger", 'Frontend cache NOT cleared successfully. Please try again', true);
        }   
        return $this->redirect(Yii::$app->urlManagerBackend->createUrl(['user/dashboard']));
    }
    
    public function actionPermissionDenied(){
        $this->layout = false;
		return $this->render('permission-denied');
	}
       
    #################################### USER FUNCTIONS ####################################
    
    
    
    
    
    ####################################  PROTECTED FUNCTIONS ####################################
    
//    public function beforeAction($action) {
//        if(parent::beforeAction($action)){
//            echo "<pre>";print_r($action);
//            echo "<pre>";print_r($action->controller->id);
//            echo "<pre>";print_r($action->id);die;
//            return true;
//        }
//        return false;
//    }
    
    protected function uploadFile($model, $filePath){
        $file = \yii\web\UploadedFile::getInstance($model, 'file');
        if(isset($file) && !empty($file)){
            $file->saveAs($filePath.$file->name);
            $model->userDetail->photo = $file->name;
        }    
    }
    
    
    
    #################################### PROTECTED FUNCTIONS ####################################
    
    
    
    
    


    #################################### AJAX FUNCTIONS ####################################
 
    public function actionDeleteMyAccount(){
        if(Yii::$app->request->isAjax){
            $id = Yii::$app->user->getId();
            $model = User::find()->innerJoinWith('userDetail')->onCondition(['users.id'=>$id])->one();
            if(isset($model) && !empty($model)){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                if(($model->delete($id) && UserDetail::deleteAll(['user_id'=>$id]))){
                    Yii::$app->session->setFlash("success", 'Your account has been deleted successfully from the <strong>'.SITE_NAME.'</strong>. ', true);
                    return ['status'=>'success', 'redirectUrl'=>Url::to(['user/login'])];
                }else{
                    return ['status'=>'failure'];
                }
            }    
        }
    }
 
    #################################### AJAX FUNCTIONS ####################################
    
}

