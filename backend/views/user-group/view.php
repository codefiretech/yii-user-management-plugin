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
        <?php echo Html::a('Edit Group', Url::to(['user-group/edit', 'id'=>$model->id]), ['class'=>'btn btn-success pull-right']);?>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('name')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->name)) ? (Html::encode($model->name)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('alias_name')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->alias_name)) ? (Html::encode($model->alias_name)) : NOT_FOUND_TEXT; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('registration_allowed')));?></div>
            <div class="col-md-6"><?php echo (Html::encode($model->allowRegistration) == '1') ? 'Yes' : 'No';?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><?php echo Html::label(Html::encode($model->getAttributeLabel('joined')));?></div>
            <div class="col-md-6"><?php echo (!empty($model->created_at)) ? date(DATE_FORMAT, (Html::encode($model->created_at))) : NOT_FOUND_TEXT; ?></div>
        </div>
        
    </div>
    <div class="col-md-5"></div>
</div>



