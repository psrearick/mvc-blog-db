<?php

/** @var $model \app\models\Post */
/** @var $this \app\src\View */
/** @var $categories array */
/** @var $tags array */

use app\src\form\Form;
use app\src\form\SelectField;
use app\src\form\TextareaField;

$this->title = "Edit Post - $model->post_title";
?>

<h1>Edit Blog Post</h1>
<h2><?php echo $model->post_title ?></h2>

<?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'post_title') ?>
    <?php echo $form->field($model, 'slug') ?>
    <?php echo (new TextareaField($model, 'body'))->__toString() ?>
    <?php echo (new TextareaField($model, 'excerpt'))->__toString() ?>
    <?php echo (new SelectField($model, 'category_id', $categories, false))->__toString() ?>
    <?php echo (new SelectField($model, 'tags', $tags, true))->__toString() ?>
    <?php echo $form->field($model, 'image_url') ?>
    <button type="submit">Edit</button>
    <a href="/post/<?php echo $model->slug ?>"><button type="button">Cancel</button></a>
<?php $form::end(); ?>
