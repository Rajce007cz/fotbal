<?php
$this->extend("layout/layout");
$this->section("content"); ?>

<table class="table table-striped">
        <thead>
            <tr>
                <th>Stadium</th>
                <th>Návštěvnost</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($game as $g): ?>
                <tr>
                    <td><?= esc($s['stadium']) ?></td>
                    <td><?= esc($s['attendance']) ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php 
  $this->endSection();?>