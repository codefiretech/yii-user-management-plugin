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
use yii\db\ActiveRecord;

class UserActivity extends ActiveRecord{
    
    public static function tableName(){
        return '{{%user_activities}}';
    }
    
    public static function actionSave($event){
        UserActivity::deleteAll("(unix_timestamp(now()) - created_at) > :abc or logout = 1", [':abc'=>1*60]);
        
        $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : "";
        $model =  new UserActivity;
        $model->last_url = $event->sender->requestedRoute;
        $model->ip_address = $ip;
        $model->user_browser = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $model->created_at = time();
        $user = UserActivity::findOne(['ip_address'=>$ip]);
        if(empty($user)){
            $model->save();
        }else{
            if(!empty($user->logout)){
                Yii::$app->user->logout();
            }
            if(!Yii::$app->user->isGuest){
                $loginDetail = Yii::$app->user->getIdentity();
                $user->last_url = $model->last_url;
                $user->ip_address = $model->ip_address;
                $user->user_browser = $model->user_browser;
                $user->created_at = $model->created_at;
                $user->user_id = $loginDetail->getId();
                $user->name = $loginDetail->first_name." ".$loginDetail->last_name;
                $user->username = $loginDetail->username;
                $user->email = $loginDetail->email;
                $user->status = $loginDetail->status;
            }
            $user->update();
        }    
    }
}

