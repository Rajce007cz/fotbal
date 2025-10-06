<h1>Vytvořit nový článek</h1>

<form action="<?= base_url('admin/articles/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="title" class="form-label">Název článku</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Obsah</label>
        <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Datum (formát: YYYY-MM-DD)</label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Obrázek (volitelné)</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="top" name="top" value="1">
        <label class="form-check-label" for="top">Hlavní dlaždice (Top)</label>
    </div>

    <button type="submit" class="btn btn-success">Uložit</button>
    <a href="<?= base_url('admin/articles') ?>" class="btn btn-secondary">Zpět</a>
</form>