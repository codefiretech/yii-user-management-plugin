<?php 
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

	use yii\helpers\Html;
?>
<thead>
    <tr>
        <th>Controller </th>
        <th>Action</th>
        <th><?php echo Html::checkbox('select_all', false, ['id' => 'select_all']) ?> Permissions</th>
    </tr>
</thead>
<tbody>
	<?php if($allAuthItem){
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
		<?php if(in_array($value['name'], $mainChildAction)){ ?>
			<td class="success">
			<?php echo Html::checkbox($value['name'], true, ['class'=>'select_me'] );  ?>
			</td>
		<?php }elseif(in_array($value['name'], $childChildAction)){ ?>
			<td class="danger">
			<?php echo Html::checkbox($value['name'], true, ['class'=>'select_me'] ); ?>
			</td>
		<?php }else{ ?>
			<td>
			<?php echo Html::checkbox($value['name'], false , ['class'=>'select_me'] ); ?>
			</td>
			<?php } ?>
</tr>
<?php } } ?>
</tbody>
<script>
    $('#select_all').bind('click', function(){
        ($(this).prop('checked') == true) ? $('.select_me').prop('checked', true) : $('.select_me').prop('checked', false);
    });
</script>
