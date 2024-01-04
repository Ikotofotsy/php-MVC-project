<?php
use app\core\Application;
use app\models\Langage;
use app\models\Level;
use app\models\User;
use app\models\UserLangage;
    $this->title = 'profile';
    $langages = [];
    $userLangage = new UserLangage();
    echo "<pre>";
    foreach($userLangage->findMyLangage(implode('',Application::$app->user->primaryKeyValues())) as $practice)
    {
      $langage = new Langage();
      $langage = $langage->findOne([implode($langage->primaryKey()) => $practice->langage]);
      $level = new Level();
      $level = $level->findOne([implode($level->primaryKey()) => $practice->level]);
      $exp = $practice->exp;
      $langages[] = [
        'langage'=> $langage->langage,
        'level' => $level->level,
        'exp' => $exp
      ];
    }
    
?>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="<?= '/images/'.Application::$app->user->picture?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?=Application::$app->user->getDisplayName()?></h5>
          <p class="card-text"><?=Application::$app->user->about?></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?=Application::$app->user->email?></li>
        </ul>
        <div class="card-body">
          <a href="/userUpdate" class="card-link">Update</a>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <a href="/addLangageForUser" class="btn btn-primary">Add</a>
      <table class="table">
        <thead>
          <tr>
            <th>Langage</th>
            <th>Level</th>
            <th>Experience</th>
          </tr>
        </thead>
        <body>
          <?php foreach($langages as $langage) :?>
            <tr>
              <td><?=$langage['langage']?></td>
              <td><?=$langage['level']?></td>
              <td><?=$langage['exp']?> xp</td>
            </tr>
          <?php endforeach?>
        </body>
      </table>
    </div>
  </div>
</div>
