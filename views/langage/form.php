<?php
use app\core\form\Form;
use app\models\Langage;
$langage = new Langage();
?>
<h2>New langage</h2>
<?php $form = Form::begin('/langage', "post") ?>
    <?= $form->inputField($langage, 'langage') ?>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
<?php Form::end() ?>
<ul class="list-group">
    <?php foreach($langage->selectAll() as $langage) :?>
        <li class="list-group-item d-flex justify-content-between align-items-start"><div class="fw-bold"><?=$langage->langage?></div>Created at <?php $date = new DateTimeImmutable($langage->created_at);
echo $date->format('j F o H:i:s');?><span class="badge bg-primary rounded-pill">4</span></li>
    <?php endforeach ?>
</ul>
