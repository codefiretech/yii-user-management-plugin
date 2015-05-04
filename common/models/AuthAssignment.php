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
 * AuthAssignment model
 *
 * @property string $item_name
 * @property integer $user_id
 * @property integer $created_at
 */
 
class AuthAssignment extends ActiveRecord
{
	/**
     * To tell the model which table to use for this model 
     * @return string : the table name with to use for this model (with auto prefix)
     */
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }
}

?>