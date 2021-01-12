<?php

/** @var $model \app\models\Category */
/** @var $this \app\src\View */

use app\src\form\Form;

$this->title = 'Create Category';

?>

<h1>Create Category</h1>

<?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'category') ?>
    <button type="submit">Create</button>
<?php $form::end(); ?>
