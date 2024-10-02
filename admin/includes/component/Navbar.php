<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?= Home(); ?>
                    </li>

                    <li class="nav-item dropdown">
                        <?= Management(); ?>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <?= User(); ?>
                                    <?= Team(); ?>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <?= ProductManagement(); ?>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <?= ProductCategory(); ?>
                                    <?= Product(); ?>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <?= Testimonial(); ?>
                    </li>

                    <!-- <li class="nav-item">
                        <?= Messages(); ?>
                    </li> -->

                    <li class="nav-item dropdown">
                        <?= Tools(); ?>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <?= EventLog(); ?>
                                    <?= DebugTools(); ?>
                                    <?= ResetPasswordTools(); ?>
                                    <!-- <?= Settings(); ?> -->
                                    <?= MetaTag(); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="page-wrapper">