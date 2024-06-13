<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <?php
    include "../../controllers/sideBarController.php";
    ?>
    <!-- Brand Logo -->
    <a href="../../index.php" class="brand-link">
        <span class="brand-text font-weight-light"><span>Janko</span>Blog</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../assets/img/<?= $_SESSION["user"]->profileImage ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#!" class="d-block"><?= $_SESSION["user"]->username ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
            <?php if($_SESSION['user']->roleId == 2): ?>
                <?php foreach ($menuUser as $n) : ?>
                    <li class="nav-item">
                        <a href="<?= $n->route ?>" class="nav-link <?php if ($file == $n->route) : ?> active <?php endif; ?>">
                            <i class="<?= $n->icon ?>"></i>
                            <p><?= $n->name ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php elseif ($_SESSION['user']->roleId == 1): ?>
                <?php foreach ($menuAdmin as $n) : ?>
                    <li class="nav-item">
                        <a href="<?= $n->route ?>" class="nav-link <?php if ($file == $n->route) : ?> active <?php endif; ?>">
                            <i class="<?= $n->icon ?>"></i>
                            <p><?= $n->name ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
        <form action="../../logout.php" method="GET">
            <a href="../../index.php" class="btn btn-link"><i class="fas fa-sign-outalt"></i></a>
            <input type="submit" class="btn btn-secondary hide-on-collapse pos-right" value="Log out" />
        </form>
        <!-- {{-- <a href="{{ route('logout') }}" class="btn btn-secondary hide-oncollapse">Log out</a>--}}
{{-- <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>--}} -->
    </div>
    <!-- /.sidebar-custom -->
</aside>