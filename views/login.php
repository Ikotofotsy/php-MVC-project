<?php
use app\core\form\Form;
/**
 * @var $model \app\models\User
 */
    $this->title = 'login';

?>
<h2>Log In</h2>

<?php $form = Form::begin('', "post") ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>

