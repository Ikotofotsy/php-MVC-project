<?php
use app\core\form\Form;
use app\models\User;
/**
 * @var $model \app\models\User
 */
$this->title = 'register';
?>
<h2>Sing In</h2>

<?php $form = Form::begin('', "post") ?>
    <div class="row">
        <div class="col">
            <?= $form->inputField($model, 'firstname') ?>
        </div>
        <div class="col">
            <?= $form->inputField($model, 'lastname') ?>
        </div>
    </div>
    <?= $form->inputField($model, 'email') ?>
    <?= $form->inputField($model, 'password')->passwordField() ?>
    <?= $form->inputField($model, 'confirmPassword')->passwordField() ?>
    <?= $form->inputField($model, 'picture')->fileField()?>
    <button type="submit" name="valide" class="btn btn-primary">Submit</button>
    <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
<?php Form::end() ?>

