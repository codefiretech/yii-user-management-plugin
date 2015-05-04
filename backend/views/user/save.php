<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\widgets\Alert;

$this->title = 'Add User';
?>
<div class="row">
    <div class="col-md-12">
<!--        <h3><strong>Add User</strong></h3><hr style="border-color:grey;">-->
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
            echo Html::submitButton('Submit', ['class'=>'btn btn-success']);
            ActiveForm::end();
        ?>
</div>



