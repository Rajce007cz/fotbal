<?php
$this->extend("layout/layout");
$this->section("content"); ?>
<h2 class="mt-3 mb-4">Zápasy sezóny</h2>

<?php if (!empty($matches)): ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Kolo</th>
                <th>Domácí</th>
                <th>Skóre</th>
                <th>Hosté</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matches as $match): ?>
                <tr>
                    
            
                    <td><?= esc($match['round']) ?></td>
                    <td><?= esc($match['home_name']) ?></td>
                    <td><a href="<?= base_url("match/" . $match['id']) ?>"><?= esc($match['goals_home']) ?> : <?= esc($match['goals_away']) ?></a></td>
                    <td><?= esc($match['away_name']) ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Žádné zápasy nebyly nalezeny.</p>
<?php endif; ?>

<?php 
  $this->endSection();?>