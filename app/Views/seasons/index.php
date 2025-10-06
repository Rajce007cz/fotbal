<?php
$this->extend("layout/layout");
$this->section("content"); ?>
<table class="table">
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
            $key = $s['start'] . '-' . $s['finish'];
            $grouped[$key][] = $s;
        }

        foreach ($grouped as $yearRange => $leagues):
            $uniqueId = 'row-' . md5($yearRange);
        ?>
            <tr class="main-row" data-toggle="<?= $uniqueId ?>" style="cursor:pointer;">
                <td><strong><?= esc($yearRange) ?></strong> <span class="arrow">&#x25BC;</span></td>
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
                    row.querySelector('.arrow').textContent = '\u25BC';
                } else {
                    r.style.display = 'table-row';
                    row.querySelector('.arrow').textContent = '\u25B2';
                }
            });
        });
    });
</script>

<?php 
  $this->endSection();?>