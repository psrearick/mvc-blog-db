<?php

/** @var $model Post */
/** @var $this View */
/** @var $categories array */
/** @var $tags array */

use app\models\Post;
use core\form\Form;
use core\form\SelectField;
use core\form\TextareaField;
use core\View;

$this->title = "Edit Post - $model->post_title";
?>

<div class="page create-category-page">
    <div class="form-container flex">
        <header>
            <div>
                <h1>Edit Blog Post</h1>
            </div>
        </header>

        <?php $form = Form::begin('', 'post') ?>

        <div class="fields">
            <?php echo $form->field($model, 'post_title') ?>
            <?php echo $form->field($model, 'slug') ?>
            <?php echo (new TextareaField($model, 'body'))->__toString() ?>
            <?php echo (new TextareaField($model, 'excerpt'))->__toString() ?>
            <?php echo (new SelectField($model, 'category_id', $categories, false))->__toString() ?>
            <?php echo (new SelectField($model, 'tags', $tags, true))->__toString() ?>
            <?php echo $form->field($model, 'image_url') ?>
        </div>

        <div class="control-buttons flex">
            <button class="control-btn btn-success" type="submit">Edit</button>
            <a href="/posts" class="control-btn btn-cancel">Cancel</a>
        </div>
        <?php $form::end(); ?>
    </div>
</div>