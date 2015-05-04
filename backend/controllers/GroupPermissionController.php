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
use components\MessageComponent;
use yii\cfusermgmt\common\models\AuthItem;
use yii\cfusermgmt\common\models\AuthItemChild;



class GroupPermissionController extends Controller{
    
    
    #################################### CONTROLLER BASE ####################################
    
    
    #################################### CONTROLLER BASE ####################################
    
    
    
    
    #################################### ADMIN FUNCTIONS ####################################
    
    /**
     * To get log in the user
     * @return : to home url (the logged in user)
     */
    public function actionIndex()
    {
		if(!empty($_POST['permission'])){
			$mainChild = array();
			$childchildAction = array();
			$mainChildAction = array();
			if(!empty($_POST['permission_child'])){
				$mainChild = $_POST['permission_child'];
			}
			$mainChildarray = array();
			if($mainChild){
				$i = 0;
				foreach($mainChild as $key=>$value){
						$mainChildarray[$i]['parent'] = $_POST['permission'];
						$mainChildarray[$i]['child'] = $value;
						$i++;
				}
				$queryData2 = AuthItemChild::find()->where(['parent'=>$_POST['permission_child']])->asArray()->all();
				if($queryData2){
					foreach($queryData2 as $key=>$value){
						$childchildAction[] = $value['child'];
					}
				}
			}
			$possibleChild = array_keys($_POST);
			$j = 0;
			foreach($possibleChild as $key=>$value){
				if (strpos($value,':') !== false) {
					if(!in_array($value, $childchildAction)){
						$mainChildAction[$j]['parent'] = $_POST['permission'];
						$mainChildAction[$j]['child'] = $value;
						$j++;
					}
				}
			}
			
			if(empty($_POST['mode_name']) && empty($_POST['controller_name'])){
				AuthItemChild::deleteAll('parent = :parent', [':parent' => $_POST['permission']]);
			}else{
				$conditions[':parent'] = $_POST['permission'];	
				if(!empty($_POST['mode_name'])){
					$condition = 'parent = :parent and child like :child';
					$conditions[':child'] = "".$_POST['mode_name']."%";				
				}
				if(!empty($_POST['controller_name'])){
					if(strpos($_POST['controller_name'], "cfusermgmt:") === 0){
						$_POST['controller_name'] = substr($_POST['controller_name'], strlen('cfusermgmt:'));;
					}
					$condition = 'parent = :parent and child like :child';
					$conditions[':child'] = "%:".$_POST['controller_name'].":%";					
				}
				if(!empty($_POST['mode_name']) && !empty($_POST['controller_name'])){
					$condition = 'parent = :parent and child like :child';
					$conditions[':child'] = "".$_POST['mode_name'].":".$_POST['controller_name'].":%";
				}
				AuthItemChild::deleteAll($condition, $conditions);
				if(!empty($_POST['permission_child'])){
					$inArray = array();
					foreach($_POST['permission_child'] as $key=>$value){
						$inArray[] = '"'.$value.'"';
					}
					$newInArray = implode(",", $inArray);
					AuthItemChild::deleteAll('parent = :parent and child in ('.$newInArray.')', [':parent' => $_POST['permission']]);
				}
			}
			if($mainChildarray){
				Yii::$app->db->createCommand()->batchInsert('auth_item_child', ['parent', 'child'], $mainChildarray)->execute();
			}
			if($mainChildAction){
				Yii::$app->db->createCommand()->batchInsert('auth_item_child', ['parent', 'child'], $mainChildAction)->execute();
			}
			$this->redirect(Url::to(['group-permission/index']));
		}
		$AuthItemAction = AuthItem::find()->where(['type' => 2])->andWhere('name like :name or name like :name1 or name like :name2 or name like :name3 or name like :name4 or name like :name5',[':name'=>"common%", ':name1'=>"frontend%", ':name2'=>"backend%", ':name3'=>"cfusermgmt:common%", ':name4'=>"cfusermgmt:backend%", ':name5'=>"cfusermgmt:frontend%"])->asArray()->all();
		$AuthItemRole = AuthItem::find()->where(['type' => 1])->asArray()->all();
		$usersRole = array();
		$usersRole[0] = 'Please Select';
		foreach($AuthItemRole as $key=>$value){
			$usersRole[$value['name']] = $value['name'];
		}
		return $this->render('index', ['allAuthItem'=>$AuthItemAction, 'usersRole'=>$usersRole]);
    }
    
    public function actionLoad(){
		$home_base_path = Yii::$app->params['home_base_path'];
		$ext_base_path = Yii::$app->params['ext_base_path'];
		//$base_path = substr($base_path, 0, -8);
		
		$fileType = 'Controller.php';
		$baseController = 'yii\web\Controller';
		$dirName = array('common', 'backend', 'frontend');
		$cList = array();
		$allFunctionList = array();
		foreach($dirName as $key=>$value){
			if(file_exists($home_base_path.'//'.$value.'/controllers')){
				$cList['home'][$value] = scandir($home_base_path.'//'.$value.'/controllers');
			}
			if(file_exists($ext_base_path.'//'.$value.'/controllers')){
				$cList['cfusermgmt'][$value] = scandir($ext_base_path.'//'.$value.'/controllers');
			}
		}
		$parentMethodList = get_class_methods($baseController);
		$actionList  = array();
		$i = 0;
		foreach($cList as $key=>$value){
			if($value){
				foreach($value as $key0=>$value0){
					if($value0){
						foreach($value0 as $key1=>$value1){
							if(substr($value1, -14) == $fileType){
								$value1 = substr($value1, 0, -4);
								//var_dump($value1);
								if($key == 'cfusermgmt'){
									$classFullName = 'yii\\'.$key.'\\'.$key0.'\controllers\\'.$value1;
								}else{
									$classFullName = $key0.'\controllers\\'.$value1;
								}
								$controllerName = substr($value1, 0, -10);
								$currentList = get_class_methods($classFullName);
								if($currentList && $parentMethodList){
									$newList = array_diff($currentList, $parentMethodList);
								}else{
									$newList = array();
								}
								//var_dump($classFullName);
								//var_dump($newList);
								//exit;
								$methodList = array();
								foreach($newList as $key2=>$value2){
									$methodList[] = substr($value2, 6);
									if($key == 'cfusermgmt'){
										$allFunctionList[$i]['name'] = $key.':'.$key0.':'.$controllerName.':'.substr($value2, 6);
									}else{
										$allFunctionList[$i]['name'] = $key0.':'.$controllerName.':'.substr($value2, 6);
									}
									$allFunctionList[$i]['type'] = 2;
									$allFunctionList[$i]['description'] = 'Allow call to '.$controllerName.' '.substr($value2, 6).'';
									$i++;
								}
								$actionList[$key0][$controllerName] = $methodList;
							}
						}
					}
				}
			}
		}
		foreach($allFunctionList as $key=>$value){
			$AuthItem = AuthItem::findOne(['name' => $value['name']]);
			if(!$AuthItem){
				$AuthItem = new AuthItem();
				$AuthItem->name = $value['name'];
				$AuthItem->type = 2;
				$AuthItem->description = $value['description'];
				$AuthItem->save();
			}
		}
		return $this->render('group-permission', ['allFunctionList' => $allFunctionList]);
	}
	
	public function actionGetChild($parent=null){
		$childArray = array();
		$data = AuthItemChild::getChild($parent, $childArray);
		echo '<pre>';
		print_r($data);
		exit;
	}
	
	public function actionGetParent($child=null){
		$parentArray = array();
		$data = AuthItemChild::getParent($child, $parentArray);
		echo '<pre>';
		print_r($data);
		exit;
	}
	
	#################################### AJAX FUNCTIONS ####################################
	
	public function actionGetChildRole(){
		$this->layout = false;
		if(Yii::$app->request->isAjax){
			$parentData = AuthItemChild::getParent($_POST['id'], $parentArray);
			$inArray = array();
			$inArray[] = '"'.$_POST['id'].'"';
			if($parentData){
				foreach($parentData as $key=>$value){
					$inArray[] = '"'.$value.'"';
				}
				
			}
			$newInArray = implode(",", $inArray);
		
            $queryData = AuthItem::find()->where(['type' => 1])->andWhere('name != :name and name not in ('.$newInArray.')', [':name'=>$_POST['id']])->asArray()->all();
			$roleChild = array();
			$childData = AuthItemChild::getChild($_POST['id'], $childArray);
			if($childData){
				$roleChild = $childData;
			}
			if($queryData){
				$AuthItemRole = array();
				foreach($queryData as $key=>$value){
					$AuthItemRole[$value['name']] = $value['name'];
				}
				return $this->render('role-selected', ['AuthItemRole' => $AuthItemRole, 'roleChild'=>$roleChild]);
			}
        }
	}
	
	public function actionGetRolePermission(){
		$this->layout = false;
		$roleChild = array();
		$mainChildAction = array();
		$childChildAction = array();
		if(Yii::$app->request->isAjax){
			if(empty($_POST['controllerMode']) && empty($_POST['controller'])){
				$AuthItemAction = AuthItem::find()->where(['type' => 2])->andWhere('name like :name or name like :name1 or name like :name2 or name like :name3 or name like :name4 or name like :name5',[':name'=>"common%", ':name1'=>"frontend%", ':name2'=>"backend%", ':name3'=>"cfusermgmt:common%", ':name4'=>"cfusermgmt:backend%", ':name5'=>"cfusermgmt:frontend%"])->asArray()->all();
			}else{
				if(!empty($_POST['controllerMode'])){
					$condition = 'name like :name1 or name like :name2';
					$conditions[':name1'] = "".$_POST['controllerMode']."%";
					$conditions[':name2'] = "cfusermgmt:".$_POST['controllerMode']."%";
				}
				if(!empty($_POST['controller'])){
					if(strpos($_POST['controller'], "cfusermgmt:") === 0){
						$_POST['controller'] = substr($_POST['controller'], strlen('cfusermgmt:'));;
					}
					$condition = 'name like :name3';
					$conditions[':name3'] = "%:".$_POST['controller'].":%";					
				}
				if(!empty($_POST['controllerMode']) && !empty($_POST['controller'])){
					$condition = '(name like :name1 or name like :name2) and name like :name3';
				}
				$AuthItemAction = AuthItem::find()->where(['type' => 2])->andWhere($condition, $conditions)->asArray()->all();
			}
			if(!empty($_POST['id'])){
				$queryData = AuthItem::find()->where(['type' => 1])->andWhere('name != :name', ['name'=>$_POST['id']])->asArray()->all();
				$queryData1 = AuthItemChild::find()->where(['parent' => $_POST['id']])->asArray()->all();
				$roleChild = array();
				$childData = AuthItemChild::getChild($_POST['id'], $childArray);
				if($childData){
					$roleChild = $childData;
				}
				if($queryData){
					$AuthItemRole = array();
					foreach($queryData as $key=>$value){
						$AuthItemRole[$value['name']] = $value['name'];
					}
					if($queryData1){
						foreach($queryData1 as $key=>$value){
							if(!in_array($value['child'], $AuthItemRole)){
								$mainChildAction[] = $value['child'];
							}
						}
					}
				}
				if($roleChild || !empty($_POST['child'])){
					if(!empty($_POST['child'])){
						$roleChild = explode(',', $_POST['child']);
					}
					$queryData2 = AuthItemChild::find()->where(['parent'=>$roleChild])->asArray()->all();
					if($queryData2){
						foreach($queryData2 as $key=>$value){
							// if (strpos($value['child'],':') !== false) {
								// $newVal = explode(':', $value['child']);
								// $value['child'] = $newVal[2];
							// }
							$childChildAction[] = $value['child'];
						}
					}
				}
			}
			return $this->render('role-permission', ['allAuthItem' => $AuthItemAction, 'childChildAction'=>$childChildAction, 'mainChildAction'=>$mainChildAction]);
        }
	}
}

