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
use yii\captcha\Captcha;
?>
<div class="row">
    <div class="col-md-12">
        <h3><strong>Sign Up</strong></h3><hr style="border-color:grey;">
    </div>
</div>
<?php echo Alert::widget() ?>
<div class="row">
    <div class="col-md-4">
        <?php 
            $form = ActiveForm::begin();
            echo $form->field($model, 'first_name')->textInput(['placeholder'=>'Please enter your First name'])->label($model->getAttributeLabel('first_name'));
            echo $form->field($model, 'last_name')->textInput(['placeholder'=>'Please enter your Last name'])->label($model->getAttributeLabel('last_name'));
            echo $form->field($model, 'username')->textInput(['placeholder'=>'Please enter a Username'])->label($model->getAttributeLabel('username'));
            echo $form->field($model, 'email')->textInput(['placeholder'=>'Please enter your EMail Id'])->label($model->getAttributeLabel('email'));
            echo $form->field($model, 'password')->passwordInput(["placeholder"=>"Please enter a password"])->label($model->getAttributeLabel('password'));
            echo $form->field($model, 'confirm_password')->passwordInput(["placeholder"=>"Please re-enter your password"])->label($model->getAttributeLabel('confirm_password'));
            if(USE_RECAPTCHA){
                echo $form->field($model, 'verifyCode')->widget(Captcha::className(), ['template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-6">{input}</div></div>']); 
            }
            echo Html::submitButton('Submit', ['class'=>'btn btn-primary']);
            ActiveForm::end();
        ?>
<!--        <div class="row">
            <div class="col-md-4">
                <?php echo Html::beginForm();?>
                <div class="form-group"> 
                <?php 
                    echo Html::label($model->getAttributeLabel('first_name'), 'first_name', ['class'=>'control-label']);
                    echo Html::textInput('User[first_name]', null, ['name'=>'User[first_name]', 'id'=>'user-first_name', 'placeholder'=>'Please enter your First name', 'class'=>'form-control']);
                    echo "<div class='help-block'></div>";
                ?>
                </div>    
                <div class="form-group"> 
                <?php 
                    echo Html::label($model->getAttributeLabel('last_name'), 'last_name');
                    echo Html::textInput('User[last_name]', null, ['name'=>'User[last_name]', 'id'=>'user-last_name', 'placeholder'=>'Please enter your Last name', 'class'=>'form-control']);
                ?>
                </div>    
                <div class="form-group"> 
                <?php 
                    echo Html::label($model->getAttributeLabel('username'), 'username');
                    echo Html::textInput('User[username]', null, ['name'=>'User[username]', 'id'=>'user-username', 'placeholder'=>'Please enter your username', 'class'=>'form-control']);
                ?>
                </div>    
                <div class="form-group"> 
                <?php 
                    echo Html::label($model->getAttributeLabel('email'), 'email');
                    echo Html::textInput('User[email]', null, ['name'=>'User[email]', 'id'=>'user-email', 'placeholder'=>'Please enter your email', 'class'=>'form-control']);
                ?>
                </div>    
                <div class="form-group"> 
                <?php 
                    echo Html::label($model->getAttributeLabel('password'), 'password');
                    echo Html::passwordInput('User[password]', null, ['name'=>'User[password]', 'id'=>'user-password', 'placeholder'=>'Please enter your Password', 'class'=>'form-control']);
                ?>
                </div>    
                <div class="form-group"> 
                <?php 
                    echo Html::label($model->getAttributeLabel('confirm_password'), 'confirm_password');
                    echo Html::passwordInput('first_name', null, ['name'=>'User[confirm_password]', 'id'=>'user-confirm_password', 'placeholder'=>'Please re-enter your Password', 'class'=>'form-control']);
                ?>
                </div>    
                <?php 
                    echo Html::submitButton('Submit', ['class'=>'btn btn-primary']);
                    Html::endForm();
                ?>    
            </div>
        </div>-->
    </div>
    <div class="col-md-6">
        <?php echo Html::a('Register Using Twitter', Url::to(['user/register-using-apis', 'using'=>'twitter']), []);?>
    </div>
    
</div>


