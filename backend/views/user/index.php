<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use frontend\widgets\Alert;

$this->title = 'All Users';
?>
<div class="col-md-12">
<!--    <h4>All Users</h4><hr>-->
    <?php echo Html::img(Yii::$app->homeUrl.'images/'.APP_IMAGES_DIRECTORY.'/'.AJAX_LOADING_BIG_IMAGE, ['class'=>'loading-img']);?>
    <?php echo Alert::widget();?>
    <?php if(!empty($results)) { $i = (intval($pagination->offset) + 1);?>
    <?php echo Html::a('Add New', Url::to(['user/save']), ['class'=>'btn btn-success pull-right btn-sm']);?>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Group(s)</th>
          <th>Email Verified</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($results as $result): ?>
            <tr class="<?php echo ($result->status == ACTIVE) ? 'success' : 'danger'; ?>" id="rowId<?php echo $result->id;?>">
                <td><?php echo Html::encode($result->id);?></td>
                <td><?php echo Html::encode($result->first_name .' '.$result->last_name);?></td>
                <td><?php echo Html::encode($result->username);?></td>
                <td><?php echo Html::encode($result->email);?></td>
                <td><?php echo Html::encode($result->username);?></td>
                <td id = '<?php echo 'email_verified_td'.$result->id;?>'><?php echo (Html::encode($result->email_verified) == VERIFIED) ? 'Yes' : 'No';?></td>
                <td id = '<?php echo 'status_td'.$result->id;?>'><?php echo (Html::encode($result->status) == ACTIVE) ? 'Active' : 'Inactive';?></td>
                <td><?php echo date(DATE_FORMAT, ($result->created_at));?></td>
                <td>
                    <?php 
                        $statusClass = Html::encode($result->status == ACTIVE) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-ban-circle';
                        $status = Html::encode($result->status == ACTIVE) ? 'Inactive' : 'Active';
                        echo Html::a('<span class="'.$statusClass.'"></span>', 'javascript:void(0)', ['class'=>'ableToChangeStatus', 'id'=>'ableToChangeStatus'.$result->id, 'url'=>Url::to([Yii::$app->controller->id."/status"]), 'title'=>'Make this user '.$status]);
                    ?>
                    <?php echo Html::a('<span class="glyphicon glyphicon-file"></span>', Url::to(['user/view', 'id'=>$result->id]), ['title'=>'View User Profile']);?>
                    <?php echo Html::a('<span class="glyphicon glyphicon-edit"></span>', Url::to(['user/edit', 'id'=>$result->id]), ['title'=>'Edit User Details']);?>
                    <?php echo Html::a('<span class="glyphicon glyphicon-remove-circle"></span>', 'javascript:void(0)', ['title'=>'Delete this User', 'class'=>'ableToDelete', 'id'=>'ableToDelete'.$result->id,  'url'=>Url::to([Yii::$app->controller->id."/delete"])]);?>
                    <?php if(EMAIL_VERIFICATION && Html::encode($result->email_verified) == NOT_VERIFIED) { 
                        echo Html::a('<span class="glyphicon glyphicon-exclamation-sign"></span>', 'javascript:void(0)', ['title'=>'Verify User Email', 'class'=>'ableToVerifyEmail', 'id'=>'ableToVerifyEmail'.$result->id]);
                    }?>
                    <?php echo Html::a('<span class="glyphicon glyphicon-lock"></span>', Url::to(['user/change-user-password', 'id'=>$result->id]), ['title'=>'Change User\'s Password']);?>
                    <?php //echo Html::a('<span class="glyphicon glyphicon-lock"></span>', Url::to(['user/edit-permissions', 'id'=>$result->id]), ['title'=>'View User Permissions']);?>
                </td>
            </tr>
        <?php $i++;endforeach; ?>
      </tbody>
    </table>
    <div class="pull-right">
        <?php echo LinkPager::widget(['pagination'=>$pagination]);?>
    </div>    
    <?php } ?>
    
</div>
<script>
    
    
    $('.ableToVerifyEmail').click(function(){
        if(confirm('Are you sure ?')){ 
            var id = $(this).attr('id');
            var recordId  = id.split('ableToVerifyEmail')[1];
            $.ajax({
              url:'<?php echo Url::to([Yii::$app->controller->id."/verify-email"])?>?id='+recordId,
              type:"POST",
              dataType:'json',
              beforeSend:function(){    $('.loading-img').show();    },
              success:function(response){
                    if(response.status == 'success'){
                        if(response.recordEmailVerified == <?php echo VERIFIED; ?>){
                            $('#'+id).fadeOut();
                            $('#email_verified_td'+recordId).html('Yes');
                        }
                    }else{
                        alert('Status not updated successfully');
                    }
              },
              complete:function(){  $('.loading-img').hide();    },
              error:function(){ alert('There was a problem while requesting to verify email. Please try again');   }
           });
        }   
    });
</script>


