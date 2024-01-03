<?php
use app\core\Application;
    $this->title = 'profile';
?>
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
    <a href="/register" class="card-link">Update</a>
  </div>
</div>