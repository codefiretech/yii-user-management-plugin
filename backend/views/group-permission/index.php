<?php 
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

	use yii\helpers\Html;
	use yii\helpers\Url;
	$this->title = 'Update Permission';
?>
<div class="col-md-12">
	<?php echo Html::beginForm( $action = '', $method = 'post', $options = []); ?>
	
	<div class="row">
		<div class="col-md-2"><h4>Select Role</h4></div>
		<div class="col-md-4">
			<?php 
				echo Html::dropDownList('permission', $selection = null, $usersRole, $options = ['style'=>'padding: 5px; width: 200px; margin-top: 9px;', 'id'=>'userRoleParent', 'url'=>Url::to(['group-permission/get-child-role'])]); 
			?>
		</div>
        <div class="col-md-2"><h4>Filter by Mode</h4></div>
		<div class="col-md-4">
			<?php $controllerMode = array(0=>'Select Mode', 'backend'=>'backend', 'frontend'=>'frontend');
				echo Html::dropDownList('mode_name', $selection = null, $controllerMode, $options = ['style'=>'padding: 5px; width: 200px; margin-top: 9px;', 'id'=>'allControllerMode']); 
			?>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-2"><h4>Select Children</h4></div>
		<div class="col-md-4">
			<?php 
				unset($usersRole[0]);
				echo Html::dropDownList('permission_child', $selection = null, $usersRole, $options = ['style'=>'padding: 5px; width: 200px; margin-top: 9px;', 'multiple' => 'multiple', 'id'=>'userRoleChild', 'url'=>Url::to(['group-permission/get-role-permission'])]); 
			?>
		</div>
        <div class="col-md-2"><h4>Filter by Controller</h4></div>
		<div class="col-md-4">
			<?php 
				$allController = array();
				$allController[0] = 'Select Controller';
				if($allAuthItem){
					foreach($allAuthItem as $key=>$value){
						$name = explode(":", $value['name']);
						if($name[0] == 'cfusermgmt'){
							$allController[$name[0].':'.$name[2]] = $name[0].' '.$name[2].' controller';
						}else{
							$allController[$name[1]] = $name[1].' controller';
						}
					}
				}
				echo Html::dropDownList('controller_name', $selection = null, $allController, $options = ['style'=>'padding: 5px; width: 200px; margin-top: 9px;', 'id'=>'allControllerFilter']); 
			?>
		</div>
	</div>
	<br><br>
	<?php echo Html::submitButton('Save Permission', ['class'=>'btn btn-success pull-right']);?>
	<table class="table table-hover table-bordered" id="permissionSectionBody">
      <thead>
        <tr>
          <th>Controller </th>
          <th>Action</th>
          <th><?php echo Html::checkbox('select_all', false, ['id'=>'select_all'])?> Permissions</th>
        </tr>
      </thead>
      <tbody>
		<?php 
			if($allAuthItem){
				foreach($allAuthItem as $key=>$value){
					$name = explode(":", $value['name']);
		?>
		<tr>
			<?php if($name[0] == 'cfusermgmt'){ ?>
				<td><?php echo $name[0].' - '.$name[1].' - '.$name[2]; ?></td>
				<td><?php echo $name[3]; ?></td>
			<?php }else{ ?>
				<td><?php echo $name[0].' - '.$name[1]; ?></td>
				<td><?php echo $name[2]; ?></td>
			<?php } ?>
			<td><?php echo Html::checkbox($value['name'], false, ['class'=>'select_me'] ); ?></td>
		</tr>
		<?php } } ?>
	  </tbody>
	</table>
	<?php echo Html::submitButton('Save Permission', ['class'=>'btn btn-success pull-right']);?>
	<?php echo Html::endForm(); ?>
</div>
