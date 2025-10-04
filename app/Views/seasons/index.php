<?php
$this->extend("layout/layout");
$this->section("content"); ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Rok</th>
            <th>Název ligy</th>
            <th>Úroveň</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $grouped = [];

        foreach ($seasons as $s) {
            $year = $s['start'];

            $grouped[$year][]= $s;

        }

        foreach ($grouped as $year => $leagues):
            $uniqueId = 'row-' . md5($year);
        ?>
            <tr class="main-row" data-toggle="<?= $uniqueId ?>" style="cursor:pointer;">
                <td>
            <strong><?= esc($year) ?></strong> <span class="arrow">&#x25BC;</span>
        </a></td>
                <td colspan="2">Liga</td>
            </tr>

            <?php foreach ($leagues as $league): ?>
                <tr class="sub-row <?= $uniqueId ?>" style="display:none;">
                    <td></td>
            <td>
            <a href="<?= base_url("seasons/" . $league['season_id']) ?>">
                <?= esc($league['name']) ?>
            </a>
            </td>
        <td><?= esc($league['level']) ?></td>
    </tr>
<?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    document.querySelectorAll('.main-row').forEach(row => {
        row.addEventListener('click', () => {
            const targetClass = row.getAttribute('data-toggle');
            const rows = document.querySelectorAll('tr.' + targetClass);
            rows.forEach(r => {
                if (r.style.display === 'table-row') {
                    r.style.display = 'none';
                    row.querySelector('.arrow').textContent = '↓';
                } else {
                    r.style.display = 'table-row';
                    row.querySelector('.arrow').textContent = '↑';
                }
            });
        });
    });
</script>
<?php 
  $this->endSection();?>