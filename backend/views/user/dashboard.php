<?php 
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\Alert;

$this->title = 'Dashboard';
?>
<style>
    a.thumbnail:hover, a.thumbnail:focus, a.thumbnail.active{
        background-color: rgb(232, 233, 237);
    }
</style>
<span><h4>Hi <?php echo Html::encode($model->username); ?></h4></span>
<div class="row">
    <div class=" col-md-12">
        <?php echo Alert::widget();?>
    </div>
</div>
<div class="row">
    <div class=" col-md-2">
        <a href="<?php echo Url::to(['user/my-profile']);?>" class="thumbnail" title='My Profile'>
          <img alt="100%x180" src="<?php echo Yii::$app->homeUrl; ?>/plugin-images/profile.jpg" class="dashboard-thumbnails">
          <div class="caption text-center">
            <h5>My Profile</h5>
          </div>
      </a>
    </div>
    <div class=" col-md-2">
      <a href="<?php echo Url::to(['user/save']);?>" class="thumbnail" title='Add User'>
          <img alt="100%x180" src="<?php echo Yii::$app->homeUrl; ?>/plugin-images/add-user.jpg" class="dashboard-thumbnails">
          <div class="caption text-center">
            <h5>Add User</h5>
          </div>
      </a>
    </div>
    <div class="col-md-2">
        <a href="<?php echo Url::to(['user/index']);?>" class="thumbnail" title='All Users'>
          <img alt="100%x180" src="<?php echo Yii::$app->homeUrl;?>/plugin-images/all-users.jpg" class="dashboard-thumbnails">
          <div class="caption text-center">
            <h5>All Users</h5>
          </div>
      </a>
    </div>
    <div class=" col-md-2">
      <a href="<?php echo Url::to(['user-group/save']);?>" class="thumbnail" title='Add Role'>
          <img alt="100%x180" src="<?php echo Yii::$app->homeUrl; ?>/plugin-images/add-user.jpg" class="dashboard-thumbnails">
          <div class="caption text-center">
            <h5>Add Role</h5>
          </div>
      </a>
    </div>
    <div class=" col-md-2">
      <a href="<?php echo Url::to(['user-group/index']);?>" class="thumbnail" title='All Roles'>
          <img alt="100%x180" src="<?php echo Yii::$app->homeUrl; ?>/plugin-images/add-user.jpg" class="dashboard-thumbnails">
          <div class="caption text-center">
            <h5>All Roles</h5>
          </div>
      </a>
    </div>
    <div class=" col-md-2">
      <a href="<?php echo Url::to(['setting/index']);?>" class="thumbnail" title='Settings'>
          <img alt="100%x180" src="<?php echo Yii::$app->homeUrl; ?>/plugin-images/add-user.jpg" class="dashboard-thumbnails">
          <div class="caption text-center">
            <h5>Settings</h5>
          </div>
      </a>
    </div>
</div>
<div class="row">
    <div class=" col-md-2">
        <a href="<?php echo Url::to(['user/clear-cache']);?>" class="thumbnail" title='Flush Cache(Backend)'>
            <img alt="100%x180" src="<?php echo Yii::$app->homeUrl; ?>/plugin-images/add-user.jpg" class="dashboard-thumbnails">
            <div class="caption text-center">
              <h5>Flush Cache (B)</h5>
            </div>
        </a>
    </div>
    <div class=" col-md-2">
        <a href="<?php echo Yii::$app->urlManagerFrontend->createUrl(['user/clear-cache']);?>" class="thumbnail" title='Flush Cache(Frontend)'>
            <img alt="100%x180" src="<?php echo Yii::$app->homeUrl; ?>/plugin-images/add-user.jpg" class="dashboard-thumbnails">
            <div class="caption text-center">
              <h5>Flush Cache (F)</h5>
            </div>
        </a>
    </div>
    <div class=" col-md-2">
        <a href="<?php echo Url::to(['user/online']);?>" class="thumbnail" title='Online Users'>
            <img alt="100%x180" src="<?php echo Yii::$app->homeUrl; ?>/plugin-images/add-user.jpg" class="dashboard-thumbnails">
            <div class="caption text-center">
              <h5>Online Users</h5>
            </div>
        </a>
    </div>
</div>