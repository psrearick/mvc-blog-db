<?php

/** @var $model Tag */
/** @var $this View */

use core\form\Form;
use core\View;
use app\models\Tag;

$this->title = 'Create Tag';

?>

<div class="page create-category-page">
    <div class="form-container flex">
        <header>
            <div>
                <h1>Create Tag</h1>
            </div>
        </header>
        <?php $form = Form::begin('', 'post') ?>
        <div class="fields">
            <?php echo $form->field($model, 'tagName') ?>
        </div>
        <div class="control-buttons flex">
            <button class="control-btn btn-success" type="submit">Create</button>
            <a href="/tags" class="control-btn btn-cancel">Cancel</a>
        </div>
        <?php $form::end(); ?>
    </div>
</div>