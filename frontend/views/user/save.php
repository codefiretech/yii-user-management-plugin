<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="col-md-4">
    <?php 
        $form = ActiveForm::begin();
        //echo "<pre>";print_r($model);
        echo $form->field($model, 'group_id')->textInput(['placeholder'=>$model->getAttributeLabel('Group')])->label("Group");
        echo $form->field($model, 'id')->hiddenInput()->label(false);
        echo $form->field($model, 'username')->textInput(['placeholder'=>$model->getAttributeLabel('username')])->label('Username');
        echo $form->field($model, 'first_name')->textInput(['placeholder'=>$model->getAttributeLabel('first_name')])->label('First Name');
        echo $form->field($model, 'last_name')->textInput(['placeholder'=>$model->getAttributeLabel('last_name')])->label('Last Name');
        echo $form->field($model, 'email')->textInput(['placeholder'=>$model->getAttributeLabel('email')])->label('Email');
        echo $form->field($model, 'password')->passwordInput(['placeholder'=>$model->getAttributeLabel('password')])->label('Password');
        echo $form->field('User', 'confirm_password')->label('Confirm Password');
        
//        echo $form->field($model, 'firstname')->label('First Name');
//        echo $form->field($model, 'lastname')->label('Last Name');
        
//        echo $form->field($model, 'password')->label('Password');
//        echo $form->field($model, 'confirm_password')->label('Confirm Password');
        
        echo Html::submitButton('Submit', ['class'=>'btn btn-primary']);
        ActiveForm::end();
    ?>
</div>



