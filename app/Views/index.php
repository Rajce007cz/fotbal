<?php
$this->extend("layout/layout");
$this->section("content"); ?>


<div class="container mt-4">
    <div class="row g-2">

        <?php if (!empty($mainTile)): ?>
            <div class="col-md-6">
    <a href="<?= esc($mainTile['id']) ?>" class="d-block position-relative ratio ratio-1x1">
        <img src="<?= base_url('img/sigma/' . esc($mainTile['photo'])) ?>"
             alt="<?= esc($mainTile['title']) ?>"
             class="img-fluid object-fit-cover w-100 h-100 rounded">

        <div class="position-absolute top-0 start-0 end-0 bottom-0 bg-dark bg-opacity-50 text-white p-3 d-flex flex-column justify-content-end rounded">
            <div class="fw-semibold"><?= esc($mainTile['title']) ?></div>
            <div class="small mt-2"><?= esc($mainTile['formattedDate']) ?></div>
        </div>
    </a>
</div>

        <?php endif; ?>

        <div class="col-md-6">
    <div class="row g-2">
        <?php foreach ($secondaryTiles as $tile): ?>
            <div class="col-6">
    <a href="<?= esc($tile['id']) ?>" class="d-block position-relative overflow-hidden rounded" style="aspect-ratio: 1 / 1;">
        <img src="<?= base_url('img/sigma/' . esc($tile['photo'])) ?>"
             alt="<?= esc($tile['title']) ?>"
             class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">

        <div class="position-absolute top-0 start-0 end-0 bottom-0 text-white p-3 d-flex flex-column justify-content-end bg-dark bg-opacity-50">
            <div class="fw-semibold"><?= esc($tile['title']) ?></div>
            <div class="small mt-2"><?= esc($tile['formattedDate']) ?></div>
        </div>
    </a>
</div>

        <?php endforeach; ?>
    </div>
</div>

    </div>
</div>
<?php 
  $this->endSection();?>