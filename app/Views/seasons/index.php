<?php
$this->extend("layout/layout");
$this->section("content"); ?>
<div class="container">
    <div class="row">
        <?php
        $grouped = [];

        foreach ($seasons as $s) {
            $key = $s['start'] . '-' . $s['finish'];
            $grouped[$key][] = $s;
        }

        foreach ($grouped as $yearRange => $leagues):
            $uniqueId = 'collapse-' . md5($yearRange);
        ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><?= esc($yearRange) ?></h5>
                        <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $uniqueId ?>" aria-expanded="false" aria-controls="<?= $uniqueId ?>">
                            <span class="collapsed">&#x25BC;</span>
                            <span class="expanded d-none">&#x25B2;</span>
                        </button>
                    </div>
                    <div class="collapse" id="<?= $uniqueId ?>">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($leagues as $league): ?>
                                <li class="list-group-item">
                                    <a href="<?= base_url("seasons/" . $league['season_id']) ?>" class="text-decoration-none">
                                        <?= esc($league['name']) ?>
                                    </a>
                                    <img src="<?= base_url('img/league/' . esc($league['logo'])) ?>" class="card-img-top mx-auto d-block" alt="Obrázek ligy" style="height: 100px; width: 100px; object-fit: cover;">
                                    <small class="text-muted d-block">Úroveň: <?= esc($league['level']) ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php 
  $this->endSection();?>