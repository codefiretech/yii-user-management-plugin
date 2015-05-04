<?php
/*
cfUserMgmt for YII

Copyright 2015, CodeFire Technologies Pvt Ltd (www.CodeFire.org)

This software is covered by GNU General Public License v3 (GPL-3.0)
You should have received a copy of the GNU General Public License along with this program.  If not, see <http://opensource.org/licenses/GPL-3.0>.

*/

use yii\helpers\Html;

$verifyEmailLink = Yii::$app->urlManager->createAbsoluteUrl(['user/verify-email', 'id'=>$details->id, 'token' => $details->auth_key]);
?>

Hello <?= Html::encode($details->username) ?>,

Follow the link below to verify your email:

<?= Html::a(Html::encode($verifyEmailLink), $verifyEmailLink) ?>
