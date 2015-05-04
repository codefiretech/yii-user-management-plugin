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

$this->title = 'Edit Role';
?>
<div class="row">
    <div class="col-md-6">
<!--        <h3><strong>Welcome <?php echo (!empty($model->first_name)) ? (Html::encode($model->first_name).', ') : ''; ?></strong></h3><hr style="border-color:grey;">-->
    </div>
    <div class="col-md-6"><?php echo Html::a('View Group', Url::to(['user-group/view', 'id'=>$model->name]), ['class'=>'btn btn-success pull-right']);?></div>
</div>
<?php echo Alert::widget() ?>
<?php $form = ActiveForm::begin();?>
<div class="row">
    <div class="col-md-4">
        <?php 
        echo $form->field($model, 'name')->textInput(['placeholder'=>'Please enter role name'])->label($model->getAttributeLabel('name'));
        echo Html::submitButton('Submit', ['class'=>'btn btn-success']);
        ?>
    </div>
</div>
<?php ActiveForm::end();?>


