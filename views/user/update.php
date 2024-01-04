<?php
use app\core\Application;
use app\core\form\Form;
use app\models\User;
$model = Application::$app->user;
$this->title = 'register';
?>
<h2>Update</h2>

<?php $form = Form::begin('', "post") ?>
    <div class="row">
        <div class="col">
            <?= $form->inputField($model, 'firstname') ?>
        </div>
        <div class="col">
            <?= $form->inputField($model, 'lastname') ?>
        </div>
    </div>
    <?= $form->textarea($model, 'about')?>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
<?php Form::end() ?>

