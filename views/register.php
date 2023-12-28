<?php
use app\core\form\Form;
?>
<h2>Sing In</h2>

<?php $form = Form::begin('', "post") ?>
    <?= $form->field($model, 'firstname') ?>
    <?= $form->field($model, 'lastname') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <?= $form->field($model, 'confirmPassword')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>

<!-- <form action="" method="post">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="firstname" value="<?= $model->firstname ?>" class="form-control<?= $model->hasError('firstname') ? ' is-invalid ' : ''?>">
                <div class="invalid-feedback">
                    <?= $model->getFirstError('firstname') ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Prenoms</label>
                <input type="text" name="lastname" class="form-control">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->