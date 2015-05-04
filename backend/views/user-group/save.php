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

$this->title = 'Add Role';
?>
<div class="row">
    <div class="col-md-12">
<!--        <h3><strong>Add Group</strong></h3><hr style="border-color:grey;">-->
    </div>
</div>
<?php echo Alert::widget() ?>
<div class="row">
    <div class="col-md-4">
        <?php
            $form = ActiveForm::begin();
            echo $form->field($model, 'name')->textInput(['placeholder'=>'Please enter group name'])->label($model->getAttributeLabel('name'));
            //echo $form->field($model, 'alias_name')->textInput(['placeholder'=>'Please enter alias name for group'])->label($model->getAttributeLabel('alias_name'));
            //echo $form->field($model, 'allowRegistration')->checkbox();
            echo Html::submitButton('Submit', ['class'=>'btn btn-success']);
            ActiveForm::end();
        ?>
</div>



