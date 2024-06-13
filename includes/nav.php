<header>
  <?php
  $menuQuery = "SELECT * from menus where admin = 0";
  $menu = $conn->query($menuQuery)->fetchAll();

  ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light my-3">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><span>Janko</span>Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav m-auto align-items-center" id="navMenu">
                <?php foreach ($menu as $m) : ?>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?= $m->route ?>"><?= $m->name ?></a>
                  </li>
                <?php endforeach; ?>


              </ul>
              <?php if (isset($_SESSION["user"])) : ?>
                
                <span class="ms-3 me-3 dropdown" style="display: block;">
                  <i class="fa fa-user"></i>
                  <div class="dropdown-content flex-column">
                    <h5 class="username">
                      <?= $_SESSION["user"]->username ?>
                    </h5> 
                      <a href="pages/admin/dashboard.php" class="cart-icon">
                        <h5>Dashboard</h5>
                      </a>
                    <a href="logout.php" class="cart-icon"><h5>Logout</h5></a>
                  </div>
                </span>
              <?php else : ?>
                <li class="text-center">
                  <a href="login.php" class="ms-3 me-3 dropdown nav-icon">
                    <i class="fas fa-solid fa-user"></i>
                  </a>
                </li>

              <?php endif; ?>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>