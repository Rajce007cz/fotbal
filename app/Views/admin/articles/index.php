<h1>Správa článků</h1>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<a href="<?= base_url('admin/articles/create') ?>" class="btn btn-primary mb-3">Přidat nový článek</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Název</th>
            <th>Datum</th>
            <th>Top</th>
            <th>Akce</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($articles)): ?>
            <tr><td colspan="5">Žádné články.</td></tr>
        <?php else: ?>
            <?php foreach($articles as $article): ?>
                <tr>
                    <td><?= esc($article['id']) ?></td>
                    <td><?= esc($article['title']) ?></td>
                    <td><?= date('j. n. Y', $article['date']) ?></td>
                    <td><?= $article['top'] ? 'Ano' : 'Ne' ?></td>
                    <td>
                        <a href="<?= base_url('admin/articles/edit/' . $article['id']) ?>" class="btn btn-sm btn-warning">Upravit</a>
                        <a href="<?= base_url('admin/articles/delete/' . $article['id']) ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Opravdu smazat článek?');">Smazat</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>