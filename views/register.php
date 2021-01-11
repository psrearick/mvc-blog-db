<?php
/** @var $model \app\models\User */

use app\src\form\Form;

$this->title = 'Register';
?>

<div>
    <h1>Register</h1>
</div>

<div>
    <?php $form = Form::begin('', 'post') ?>
        <?php echo $form->field($model, 'name') ?>
        <?php echo $form->field($model, 'email') ?>
        <?php echo $form->field($model, 'password')->passwordField() ?>
        <?php echo $form->field($model, 'passwordConfirmation')->passwordField() ?>
        <button>Register</button>
        <a href="/"><button type="button">Cancel</button></a>
    <?php Form::end() ?>
</div>
