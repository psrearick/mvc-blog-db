<?php

/** @var $model \app\models\Tag */
/** @var $this \app\src\View */

use app\src\form\Form;

$this->title = 'Create Tag';

?>

<h1>Create Tag</h1>

<?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'tagName') ?>
    <button type="submit">Create</button>
<?php $form::end(); ?>
