<?php

use app\src\form\Form;

?>

<h1>Register</h1>

<div>
    <?php $form = Form::begin('', 'post') ?>
        <?php echo $form->field($model, 'name') ?>
        <?php echo $form->field($model, 'email') ?>
        <?php echo $form->field($model, 'password')->passwordField() ?>
        <?php echo $form->field($model, 'passwordConfirmation')->passwordField() ?>
        <button>Register</button>
        <a href="/"><button type="button">Cancel</button></a>
    <?php Form::end() ?>
<!--    <form action="" method="post">-->
<!--        <div>-->
<!--            <label for="name">Name</label>-->
<!--            <input type="text" name="name" id="name">-->
<!--        </div>-->
<!---->
<!--        <div>-->
<!--            <label for="email">Email</label>-->
<!--            <input name="email" id="email" type="text">-->
<!--        </div>-->
<!---->
<!--        <div>-->
<!--            <label for="password">Password</label>-->
<!--            <input name="password" id="password" type="password">-->
<!--        </div>-->
<!---->
<!--        <div>-->
<!--            <label for="passwordConfirmation">Confirm Password</label>-->
<!--            <input name="passwordConfirmation" id="passwordConfirmation" type="password">-->
<!--        </div>-->
<!---->
<!--        <div>-->
<!--            <button type="submit">Register</button>-->
<!--            <a href="/"><button type="button">Cancel</button></a>-->
<!--        </div>-->
<!--    </form>-->
</div>
