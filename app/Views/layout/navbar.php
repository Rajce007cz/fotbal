<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link white" href="">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link white" href="">Sezóny</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link white" href="">Týmy</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link white" href="">Administrace</a>
        </li>
      </ul>

      <div class="d-flex gap-2">
        <?php if (session()->get('user_id')): ?>
          <a class="btn btn-outline-light" href="<?= base_url("/logout"); ?>">LogOut</a>
        <?php else: ?>
          <a class="btn btn-outline-light" href="<?= base_url("/register"); ?>">Register</a>
          <a class="btn btn-outline-light" href="<?= base_url("/login"); ?>">Log In</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
