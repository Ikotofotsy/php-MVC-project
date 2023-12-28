<?php
use app\core\form\Form;
?>
<h2>Log In</h2>

<?php $form = Form::begin('', "post") ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>

