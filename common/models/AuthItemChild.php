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

class AuthItemChild extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'auth_item_child';
    }
	
	public static function getChild($parent=null, &$childArray){
		$queryData1 = AuthItemChild::find()->where(['parent' => $parent])->andWhere('child not like :child1 and child not like :child2', [':child1'=>'backend:%', ':child2'=>'frontend:%'])->asArray()->all();
		if($queryData1){
			foreach($queryData1 as $key=>$value){
				$childArray[] = $value['child'];
				self::getChild($value['child'], $childArray);
			}
		}
		if($childArray){
			return array_unique($childArray);
		}
	 }
	 
	public static function getParent($child=null, &$parentArray){
		$queryData1 = AuthItemChild::find()->where(['child' => $child])->andWhere('parent not like :parent1 and parent not like :parent2', [':parent1'=>'backend:%', ':parent2'=>'frontend:%'])->asArray()->all();
		if($queryData1){
			foreach($queryData1 as $key=>$value){
				$parentArray[] = $value['parent'];
				self::getParent($value['parent'], $parentArray);
			}
		}
		if($parentArray){
			return array_unique($parentArray);
		}
	 }
     
    public static function getAllChildren($parent = NULL){
       $childArray = array();
       $data = self::getChild($parent, $childArray);
       return $data;
    }
    
    public static function getAllParent($child = NULL){
        $parentArray = array();
		$data = self::getParent($child, $parentArray);
		return $data;
    }
}

?>