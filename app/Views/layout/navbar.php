
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php foreach ($navLeft as $item): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= esc($item['url']) ?>"><?= esc($item['title']) ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php foreach ($navRight as $item): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= esc($item['url']) ?>"><?= esc($item['title']) ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>