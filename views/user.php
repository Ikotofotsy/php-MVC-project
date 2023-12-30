<?php
    $this->title = 'user';
?>
<h2>Utilisateur</h2>
<form action="" method="post">
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="pass" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>