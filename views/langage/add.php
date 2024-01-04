<?php
use app\core\form\Form;
use app\models\Langage;
use app\models\Level;
use app\models\UserLangage;
$model = new UserLangage();
$langage = new Langage();
$level = new Level();
?>


<h2>Add langage</h2>
<a href="/langage" class="btn btn-primary">New Langage</a>


<?php $form = Form::begin('/addLangageForUser', "post") ?>
    <?= $form->datalistField($langage, 'langage') ?>
    <?= $form->datalistField($level, 'level')?>
    <?= $form->inputField($model,'exp')?>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
<?php Form::end() ?>

