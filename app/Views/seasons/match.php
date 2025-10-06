<?php
$this->extend("layout/layout");
$this->section("content"); ?>
<div class="container my-5">
    <h2 class="mb-5">Detail zápasu</h2>

    <div class="row align-items-center text-center mb-4">
        <div class="col-md-4">
            <img src="<?= base_url('img/logos/' . esc($match['home_logo'])) ?>" alt="<?= esc($match['home_name']) ?>" style="max-height: 80px;">
            <h4 class="mt-2"><?= esc($match['home_name']) ?></h4>
        </div>

        <div class="col-md-4">
            <h2><?= esc($match['goals_home']) ?> : <?= esc($match['goals_away']) ?></h2>
        </div>

        <div class="col-md-4">
            <img src="<?= base_url('img/logos/' . esc($match['away_logo'])) ?>" alt="<?= esc($match['away_name']) ?>" style="max-height: 80px;">
            <h4 class="mt-2"><?= esc($match['away_name']) ?></h4>
        </div>
    </div>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Stadion</th>
                <td><?= esc($match['stadium']) ?></td>
            </tr>
            <tr>
                <th>Počet diváků</th>
                <td><?= number_format($match['attendance'], 0, ',', ' ')?>
</td>
            </tr>
            <tr>
                <th>Poločasový výsledek</th>
                <td><?= esc($match['ht_goals_home'])?> : <?= esc($match['ht_goals_away'])?></td>
            </tr>
            <tr>
                <th>Datum</th>
                <td><?= date('j. n. Y', strtotime($match['date'])) ?></td>
            </tr>
            <tr>
                <th>Čas</th>
                <td><?= !empty($match['time']) ? esc(substr($match['time'], 0, 5)) : 'Neznámý' ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php 
  $this->endSection();?>