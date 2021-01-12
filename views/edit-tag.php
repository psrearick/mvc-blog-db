<?php

/** @var $model \app\models\Tag */
/** @var $this \app\src\View */

use app\src\form\Form;

$this->title = 'Edit Tag - ' . $model->tagName;

?>

<h1>Edit Tag</h1>

<?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'tagName') ?>
    <button type="submit">Edit</button>
<?php $form::end(); ?>
