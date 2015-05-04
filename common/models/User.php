<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

namespace yii\cfusermgmt\common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    
    #################################### MODEL BASE ####################################
    
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const ROLE_USER = 10;
    
    /*Fields not the part of database fields...declare them public*/
    public $password;        
    public $old_password;
    public $new_password;
    public $confirm_password;
    public $verifyCode;
    public $file;
    

    /**
     * To tell the model which table to use for this model 
     * @return string : the table name with to use for this model (with auto prefix)
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * To specify the behaviors to use for this model
     * @return : behaviors to use for this model 
     */
    public function behaviors() 
    {
        return [
            TimestampBehavior::className(),
        ];
    }
	

    /**
     * To validate the input fields
     * @return : the validation rules to validate and respective error messages
     */
    public function rules() 
    {
        $useCaptcha = USE_RECAPTCHA ? ['register'] : [];
        return [
            [['first_name', 'last_name','username', 'email', 'password', 'confirm_password'], 'required'],    //default
            ['email', 'email', 'message'=>'Please enter a valid email address'],        //default
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address is already registerd'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Username not available'],
            ['password', 'string', 'min' => 6, 'message'=>'Please choose password of min. 6 characters'],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'message'=>'Both passwords should match'],  //default
            ['username', 'verifyBannedUsernames'],                                  //for user and admin both
            
            
            [['old_password', 'password', 'confirm_password'], 'required', 'on'=>'changePassword'],         //for user and admin both
            ['old_password', 'verifyOldPassword', 'on'=>'changePassword'],                                  //for user and admin both
            [['first_name', 'last_name', 'username', 'email'], 'required', 'on'=>'editProfile'],
            
            
            
            [['password', 'confirm_password'], 'required', 'on'=>'changeUserPassword'],         //for admin only
            
            
            
            ######Default values to go 
            ['status', 'default', 'value' =>DEFAULT_STATUS_FOR_NEW_USER, 'on'=>['register', 'addUser']],      
            ['by_admin', 'default', 'value' =>BY_ADMIN, 'on'=>'addUser'],      
            ['verifyCode', 'captcha', 'on'=>$useCaptcha],
            
            
//            ['status', 'in', 'range' => [ACTIVE, DELETED]],
//            ['role', 'default', 'value' => self::ROLE_USER],
//            ['role', 'in', 'range' => [self::ROLE_USER]],
        ];
    }
    
    
    /**
     * To define scenarios for this model (for validation purposes)
     * @return : different scenarios to use for this model
     */
    public function scenarios() 
    {
        $register = USE_RECAPTCHA ? ['first_name', 'last_name', 'username', 'password', 'confirm_password', 'email', 'status', 'verifyCode'] : ['first_name', 'last_name', 'username', 'password', 'confirm_password', 'email', 'status'];
        return [
            'login'=>['email', 'password'],
            'register'=>$register,
            'changePassword'=>['old_password', 'password', 'confirm_password'],
            'editProfile'=>['first_name', 'last_name','username', 'email'],
            
            
            #########Scenario for admin
            'addUser'=>['first_name', 'last_name', 'username', 'password', 'confirm_password', 'email', 'status', 'by_admin'],
            'editUser'=>['first_name', 'last_name', 'username', 'email', 'status'],
            'statusChange'=>['status'],
            'changeUserPassword'=>['password', 'confirm_password'],
            'emailVerification'=>['email_verified'],
            
            #######Password reset
            'resetPassword'=>['email'],
            'resetPass'=>['password'],
        ];
        
    }
    
    /*
     * To Associate this model to another model(here associating with "UserDetail" Model)
     * @return : the relation with model
     */
    public function getUserDetail() 
    {
        return $this->hasOne(UserDetail::className(), ['user_id'=>'id']);
    }
    
    /*
     * To Associate this model to another model(here associating with "UserRole" Model)
     * @return : the relation with model
     */
    public function getUserRole() 
    {
        return $this->hasMany(UserRole::className(), ['user_id'=>'id']);
    }
    #################################### MODEL BASE ####################################
    
    
    
    
    
    #################################### STATIC ARRAY VALUES FUNCTIONS ####################################
    
    /**
     * To get all the gender options
     * @return array : array of all the gender options
     */
    public static function findGenderOptions()
    {
        return [
            'M'=>'Male',
            'F'=>'Female',
            'O'=>'Any Other',
        ];
    }
    
    /**
     * To get all the marital status options
     * @return array : array of marital status options
     */
    public static function findMaritalStatusOptions()
    {
        return [
            'M'=>'Married',
            'U'=>'Unmarried',
            'D'=>'Divorced',
            'W'=>'Widowed',
        ];
    }
    
    #################################### STATIC ARRAY VALUES FUNCTIONS ####################################
    
    
    
    
    
    #################################### USER FUNCTIONS ####################################
    
    
    /**
     * To get the identity of the user WITH STATUS
     * @param type $id : the user having this id
     * @return type record Object(User object)
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::find()->onCondition('username = :username or email = :email', [':username'=>$username, ':email'=>$username])->one();//'status' => ACTIVE
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    /**
     * To set the password for the registering user
     * @param type string password
     * @return type string password_hash (generated)
     */
    public static function setNewPassword($password = NULL)
    {
        return Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * To set the auth_key for registering user
     * @return type string auth_key(generated)
     */
    public static function generateNewAuthKey()
    {
        return Yii::$app->security->generateRandomString();
    }
    
    /**
     * To calculate the attribute label names
     * @return : the attribute label names (tranlatable in other language)
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'fb_id' => Yii::t('app', 'Fb ID'),
            'fb_access_token' => Yii::t('app', 'Fb Access Token'),
            'twt_id' => Yii::t('app', 'Twt ID'),
            'twt_access_token' => Yii::t('app', 'Twt Access Token'),
            'twt_access_secret' => Yii::t('app', 'Twt Access Secret'),
            'ldn_id' => Yii::t('app', 'Ldn ID'),
            'status' => Yii::t('app', 'Status'),
            'email_verified' => Yii::t('app', 'Email Verified'),
            'last_login' => Yii::t('app', 'Last Login'),
            'by_admin' => Yii::t('app', 'By Admin'),
            'created' => Yii::t('app', 'Created'),
            'modified' => Yii::t('app', 'Modified'),
        ];
    }
    
    /**
     * To validate the old password
     * @param string : $attribute attribute name
     * @param type : $params other params
     * adds the error in error's array if not match with old password(actual)
     */
    public function verifyOldPassword($attribute, $params)
    {
        $user = $this->findIdentity(Yii::$app->user->getId());
        if($user!=null){
          if(!$user->validatePassword($this->$attribute)){
            $this->addError($attribute, "Incorrect current password");
          }
        }
        
    }
   
    /**
     * To not allow the banned usernames 
     * @param string : $attribute attribute name
     * @param type : $params other params
     * adds the error in error's array if banned username requested to set
     */
    public function verifyBannedUsernames($attribute, $params)
    {
        $bannedUsername = explode(',', BANNED_USERNAMES);
        if(in_array(strtolower(trim($this->$attribute)), array_map('strtolower', array_map('trim', $bannedUsername)))){
            $this->addError($attribute, "This username is reserved and can not be opted");
        }
    }
    
    public static function sendMail($templateFile, $details, $to, $subject){
        return \Yii::$app->mailer->compose($templateFile, ['details' => $details])
                    ->setFrom([EMAIL_FROM_ADDRESS => EMAIL_FROM_NAME]) //\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'
                    ->setTo($to)
                    ->setSubject($subject) //\Yii::$app->name
                    ->send();
    }
	
	public static function CheckPermission($event){
		$method = $event->action->actionMethod;
		$methodName = substr($method, 6);
		$objectName = get_class($event->action->controller);
		$class = explode('\\', $objectName);
		if((strpos($objectName, "yii") === 0) && !empty($class[4])){
			$mode = $class[2];
			$ext = $class[1];
			$className = $class[4];
			$className = substr($className, 0, -10);
			$dbAction = $ext.':'.$mode.':'.$className.':'.$methodName;
		}else{
			$mode = $class[0];
			$className = $class[2];
			$className = substr($className, 0, -10);
			$dbAction = $mode.':'.$className.':'.$methodName;
		}
		
		$status = false;
		$user = AuthAssignment::find()->onCondition(['user_id'=>Yii::$app->user->getId(), 'item_name'=>ADMIN_ROLE_NAME])->one();
		if((!empty($user) && $user->item_name == ADMIN_ROLE_NAME) && (!CHECK_PERMISSIONS_FOR_ADMIN || Yii::$app->user->can($dbAction))){
            $status = true;
        }elseif(!USE_PERMISSIONS_FOR_USERS || in_array($dbAction, array('cfusermgmt:backend:User:Login', 'cfusermgmt:frontend:User:Login', 'cfusermgmt:frontend:User:Register', 'cfusermgmt:backend:User:PermissionDenied', 'cfusermgmt:frontend:User:PermissionDenied')) || Yii::$app->user->can($dbAction)) {
            $status = true;
        }
        //print_r($status);die;
        return $status;
	}
    
    #################################### USER FUNCTIONS ####################################
    
    
    
    
    
    
    
    
}
