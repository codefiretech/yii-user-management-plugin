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
use frontend\widgets\Alert;
use common\models\User;

$this->title = 'User Profile';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <?php echo Html::a('Edit User Profile', Url::to(['user/edit', 'id'=>$model->id]), ['class'=>'btn btn-success pull-right']);?>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <a href="<?php echo Url::to(['user/edit-profile'])?>" class="thumbnail">
            <?php echo Html::img(Yii::$app->homeUrl.'images/'.USER_PROFILE_IMAGES_DIRECTORY.'/'.USER_PROFILE_DEFAULT_IMAGE, ['height'=> '150px','width'=> '150px']);?>
        </a>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('username')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->username)) ? (Html::encode($model->username)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('first_name')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->first_name)) ? (Html::encode($model->first_name)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('last_name')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->last_name)) ? (Html::encode($model->last_name)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('email')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->email)) ? (Html::encode($model->email)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('gender')));?></div>
            <div class="col-md-6"><?php echo (array_key_exists(Html::encode($model->userDetail->gender), $genderOptions)) ? $genderOptions[Html::encode($model->userDetail->gender)] : NOT_FOUND_TEXT;?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('marital_status')));?></div>
            <div class="col-md-6"><?php echo array_key_exists(Html::encode($model->userDetail->marital_status), $maritalOptions) ? $maritalOptions[Html::encode($model->userDetail->marital_status)] : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('bday')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->userDetail->bday)) ? date(DATE_FORMAT, strtotime(Html::encode($model->userDetail->bday))) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('cellphone')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->userDetail->cellphone)) ? (Html::encode($model->userDetail->cellphone)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('web_page')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->userDetail->web_page)) ? (Html::encode($model->userDetail->web_page)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('location')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->userDetail->location)) ? (Html::encode($model->userDetail->location)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('joined')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->created_at)) ? date(DATE_FORMAT, (Html::encode($model->created_at))) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('status')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->status)) ? ((Html::encode($model->status) == ACTIVE) ? 'Active' : 'Inactive') : NOT_FOUND_TEXT; ?></div>
        </div>
    </div>
    <div class="col-md-5"></div>
</div>



