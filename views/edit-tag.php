<?php

/** @var $model Tag */
/** @var $this View */

use app\models\Tag;
use core\form\Form;
use core\View;

$this->title = 'Edit Tag - ' . $model->tagName;

?>
<div class="page create-category-page">
    <div class="form-container flex">
        <header>
            <div>
                <h1>Edit Tag</h1>
            </div>
        </header>
        <?php $form = Form::begin('', 'post') ?>
        <div class="fields">
            <?php echo $form->field($model, 'tagName') ?>
        </div>
        <div class="control-buttons flex">
            <button class="control-btn btn-success" type="submit">Edit</button>
            <a href="/tags" class="control-btn btn-cancel">Cancel</a>
        </div>
        <?php $form::end(); ?>
    </div>
</div>
