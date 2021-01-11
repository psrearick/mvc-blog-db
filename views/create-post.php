<?php

/** @var $model \app\models\CreatePostForm */
/** @var $this \app\src\View */

use app\src\form\Form;
use app\src\form\TextareaField;

$this->title = 'Create Post';
?>

<h1>Create Blog Post</h1>

<?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'postTitle') ?>
    <?php echo new TextareaField($model, 'body') ?>
    <?php echo $form->field($model, 'tags') ?>
    <?php echo $form->field($model, 'imageUrl') ?>
    <button type="submit">Create</button>
<?php $form::end(); ?>
