<?php
$this->extend("layout/layout");
$this->section("content"); ?>
<table class="table table-striped">
        <thead>
            <tr>
                <th>Stadium</th>
                <th>Domácí</th>
                <th>Hosté</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($game as $g): ?>
                <tr>
                    <td><?= esc($g['stadium']) ?></td>
                    <td><?= esc($g['goals_home']) ?></td>
                    <td><?= esc($g['goals_away']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php 
  $this->endSection();?>