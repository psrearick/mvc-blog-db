<?php
/** @var $model User */

use app\models\User;
use app\src\form\Form;

$this->title = "Log in";
?>
<div class="page create-category-page">
    <div class="form-container flex">
        <header>
            <div>
                <h1>Log In</h1>
            </div>
        </header>

        <?php $form = Form::begin('', 'post') ?>
        <div class="fields">
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passwordField() ?>
        </div>
        <div class="control-buttons flex">
            <button class="control-btn btn-success" type="submit">Login</button>
            <a href="/" class="control-btn btn-cancel">Cancel</a>
        </div>
        <?php Form::end() ?>
    </div>
</div>
