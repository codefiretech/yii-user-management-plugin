<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use frontend\widgets\Alert;
?>
<div class="row">
    <div class="col-md-12">
        <h3><strong>Login</strong></h3><hr style="border-color:grey;">
        <?php  echo Alert::widget();?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <?php 
        $form = ActiveForm::begin();
        echo $form->field($model, 'username')->textInput(['placeholder'=>'Please enter your EMail Id'])->label($model->getAttributeLabel('email'));
        echo $form->field($model, 'password')->passwordInput(['placeholder'=>'Please enter a password'])->label($model->getAttributeLabel('password'));
    ?>
    <div class="row">
        <div class="col-md-6"><?php echo  $form->field($model, 'rememberMe')->checkbox(['value'=>0]);?></div>
        <div class="col-md-6"><?php echo  Html::a('Forgot Password?',Url::to(['user/request-password-reset']), ['class'=>'pull-right']);?></div>
    </div>
    <?php 
        echo Html::submitButton('Submit', ['class'=>'btn btn-primary']);
        ActiveForm::end();
    ?>
    </div>
</div>



