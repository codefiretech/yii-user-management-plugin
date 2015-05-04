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
<div class="row">
    <div class="col-md-12">
        <h3><strong>Login</strong></h3><hr style="border-color:grey;">
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <?php 
        $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data', 'id'=>'photo-upload']]);
        echo $form->field($model, 'file')->fileInput()->label($model->getAttributeLabel('email'));
        echo Html::submitButton('Submit', ['class'=>'btn btn-primary']);
        ActiveForm::end();
    ?>
    </div>
</div>



