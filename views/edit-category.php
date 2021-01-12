<?php

/** @var $model \app\models\Category */
/** @var $this \app\src\View */

use app\src\form\Form;

$this->title = 'Edit Category';

?>

<h1>Edit Category</h1>

<?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'category') ?>
    <button type="submit">Edit</button>
<?php $form::end(); ?>
