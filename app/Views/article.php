<?php
$this->extend("layout/layout");
$this->section("content");
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">

            <!-- Název článku -->
            <h1 class="mb-3"><?= esc($article['title']) ?></h1>

            <!-- Datum -->
            <div class="text-muted mb-4 small">
                Přidáno: <?= esc(date('j. n. Y', $article['date'])) ?>
            </div>

            <!-- Obrázek -->
            <?php if (!empty($article['photo'])): ?>
                <img src="<?= base_url('img/sigma/' . esc($article['photo'])) ?>"
                     alt="<?= esc($article['title']) ?>"
                     class="img-fluid rounded mb-4 w-100 object-fit-cover"
                     style="max-height: 400px; object-position: center;">
            <?php endif; ?>

            <!-- Text článku -->
            <div class="article-content mb-4">
                <?= $article['text'] /* předpokládám, že je HTML a bezpečně uložený */ ?>
            </div>

            <a href="<?= base_url('admin/articles') ?>" class="btn btn-secondary">Zpět na seznam článků</a>

            <?php if (session()->get('is_admin')): ?>
                <a href="<?= base_url('admin/articles/edit/' . $article['id']) ?>" class="btn btn-warning">Upravit</a>
                <a href="<?= base_url('admin/articles/delete/' . $article['id']) ?>"
                   class="btn btn-danger"
                   onclick="return confirm('Opravdu smazat článek?');">Smazat</a>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php
$this->endSection();
?>