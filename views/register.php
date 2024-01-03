<?php
use app\core\Application;
use app\core\form\Form;
use app\models\User;
/**
 * @var $model \app\models\User
 */
$this->title = 'register';
if(!Application::isGuest())
{
    $model = Application::$app->user;
}
?>
<?php if(Application::isGuest()) : ?>
    <h2>Sing In</h2>
<?php else : ?>
    <h2>Update</h2>
<?php endif ?>

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
    <?php if(Application::isGuest()) : ?>
        <?= $form->inputField($model, 'password')->passwordField() ?>
        <?= $form->inputField($model, 'confirmPassword')->passwordField() ?>
        <?= $form->inputField($model, 'picture')->fileField()?>
    <?php else : ?>
        <?= $form->inputField($model, 'password')->displayNone() ?>
        <?= $form->inputField($model, 'confirmPassword')->displayNone() ?>
        <?= $form->inputField($model, 'picture')->displayNone()?>
    <?php endif ?>
    <?= $form->textarea($model, 'about')?>
    <?php if(Application::isGuest()) : ?>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <?php else : ?>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    <?php endif ?>
    <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
<?php Form::end() ?>

