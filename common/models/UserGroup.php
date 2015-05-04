<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/


namespace yii\cfusermgmt\common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


class UserGroup extends \yii\db\ActiveRecord{
	public $classPath = 'yii\cfusermgmt\common\models\UserGroup';
		
    public static function tableName(){
        return '{{%auth_item}}';
    }
    
    public function rules(){
		
        return [
            [['name'], 'required', 'on'=>'userGroup'],
            ['name', 'unique', 'targetClass' => $this->classPath, 'message' => 'Role name already exists', 'on'=>'userGroup'],
        ];
    }
    
    public function scenarios() {
        return [
            //'default'=> ['bday', 'marital_status', 'location', 'web_page', 'gender', 'cellphone'],
            'userGroup'=> ['name'],
            
            'register'=> ['user_id'],   //For Guest User registration
            
            
            'addUser'=>['user_id'],     //For Admin User registration
            'editUser'=>['bday', 'marital_status', 'location', 'web_page', 'gender', 'cellphone'],     //For Admin User registration
        ];
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
    
    
}





