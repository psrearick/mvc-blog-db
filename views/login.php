<?php
/** @var $model \app\models\User */

use app\src\form\Form;
?>

<div>
    <h1>Log In</h1>
</div>

<div>
    <?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <button>Login</button>
    <a href="/"><button type="button">Cancel</button></a>
    <?php Form::end() ?>
</div>
