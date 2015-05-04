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

$this->title = 'Change Password';
?>
<div class="row">
    <div class="col-md-6"><h3><strong><?php echo $this->title; ?></strong></h3></div>
</div>
<div class="row"><hr style="border-color:grey;"></div>
<?php echo Alert::widget(); ?>
<?php $form = ActiveForm::begin();?>
<div class="row">
    <div class="col-md-5">
        <?php echo $form->field($model, 'old_password')->passwordInput(['placeholder'=>'Old Password'])->label($model->getAttributeLabel('old_password'));?>
        <?php echo $form->field($model, 'password')->passwordInput(['placeholder'=>'New Password'])->label($model->getAttributeLabel('New Password'));?>
        <?php echo $form->field($model, 'confirm_password')->passwordInput(['placeholder'=>'Confirm Password'])->label($model->getAttributeLabel('confirm_password'));?>
        <?php echo Html::submitButton('Change Password', ['class'=>'btn btn-success']);?>
    </div>
</div>
<?php ActiveForm::end();?>


