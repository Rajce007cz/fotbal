<?php
$this->extend("layout/layout");
$this->section("content"); ?>
<h1>Upravit článek</h1>

<form action="<?= base_url('admin/articles/update/' . $article['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="title" class="form-label">Název článku</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= esc($article['title']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Obsah</label>
        <textarea class="form-control" id="content" name="content" rows="6" required><?= esc($article['text']) ?></textarea>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Datum (formát: YYYY-MM-DD)</label>
        <input type="date" class="form-control" id="date" name="date" value="<?= date('Y-m-d', $article['date']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Aktuální obrázek:</label><br>
        <?php if (!empty($article['photo'])): ?>
            <img src="<?= base_url('img/sigma/' . esc($article['photo'])) ?>" alt="Obrázek" style="max-height: 150px;">
        <?php else: ?>
            <em>Žádný obrázek</em>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Změnit obrázek (volitelné)</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="top" name="top" value="1" <?= $article['top'] ? 'checked' : '' ?>>
        <label class="form-check-label" for="top">Hlavní dlaždice (Top)</label>
    </div>

    <button type="submit" class="btn btn-primary">Uložit změny</button>
    <a href="<?= base_url('admin/articles') ?>" class="btn btn-secondary">Zpět</a>
</form>
<?php 
  $this->endSection();?>