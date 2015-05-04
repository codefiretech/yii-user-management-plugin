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

$this->title = 'All User Activities';
?>
<div class="col-md-12">
<!--    <h4>All Users</h4><hr>-->
    <?php echo Html::img(Yii::$app->homeUrl.'images/'.APP_IMAGES_DIRECTORY.'/'.AJAX_LOADING_BIG_IMAGE, ['class'=>'loading-img']);?>
    <?php echo Alert::widget();?>
    <?php if(!empty($results)) { $i = (intval($pagination->offset) + 1);?>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Last Url</th>
          <th>Browser</th>
          <th>IP Address</th>
          <th>Last Seen</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($results as $result): ?>
            <tr class="<?php echo ($result->status == ACTIVE) ? 'success' : 'danger'; ?>" id="rowId<?php echo preg_replace('/[.]/', '', $result->ip_address);?>">
                <td><?php echo Html::encode($result->user_id);?></td>
                <td><?php echo !empty($result->name) ? Html::encode($result->name) : 'Guest';?></td>
                <td><?php echo !empty($result->username) ? Html::encode($result->username) : NOT_FOUND_TEXT;?></td>
                <td><?php echo !empty($result->email) ? Html::encode($result->email) : NOT_FOUND_TEXT;?></td>
                <td><?php echo Html::encode($result->last_url);?></td>
                <td><?php echo Html::encode($result->user_browser);?></td>
                <td><?php echo Html::encode($result->ip_address);?></td>
                <td><?php echo date(DATE_FORMAT, ($result->created_at));?></td>
                <td>
                    <?php if($result->user_id != Yii::$app->user->getId()){
                        $statusClass = Html::encode($result->status == ACTIVE) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-ban-circle';
                        $status = Html::encode($result->status == ACTIVE) ? 'Inactive' : 'Active';
                        echo Html::a('<span class="'.$statusClass.'"></span>', 'javascript:void(0)', ['class'=>'ableToChangeStatus', 'id'=>'ableToChangeStatus'.$result->user_id, 'url'=>Url::to([Yii::$app->controller->id."/status-user"]), 'title'=>'Make this user '.$status]);
                    }
                    echo Html::a('<span class="glyphicon glyphicon-off" style="margin-left:5px;"></span>', 'javascript:void(0)', ['class'=>'ableToLogoutUser', 'id'=>'ableToLogoutUser'.$result->ip_address, 'url'=>Url::to([Yii::$app->controller->id."/logout-user"]), 'title'=>'Logout this user']);
                    ?>
                    <?php ?>
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



