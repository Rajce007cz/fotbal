<?php
$this->extend("layout/layout");
$this->section("content"); ?>
<div class="container my-5">
    <h2>Přihlášení do administrace</h2>
    <form action="<?= base_url('/login') ?>" method="post">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-primary">Přihlásit se</button>
    </form>
</div>

<?php 
  $this->endSection();?>