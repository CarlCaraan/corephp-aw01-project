    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <!-- <img src="images/logo.png" alt="Logo"> -->
                    Welcome
                </a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php if (($toggle_active) == "dashboard") {
                                    echo "active";
                                } ?>">
                        <a href="../staff/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown <?php echo $toggle ?> <?php if ($toggle_active == "customer" || $toggle_active == "atm" || $toggle_active == "sps" || $toggle_active == "spsv1") {
                                                                                            echo "active";
                                                                                        }  ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Customer</a>
                        <ul class="sub-menu children dropdown-menu <?php echo $toggle ?>">
                            <li style="<?php if (($toggle_active) == "customer") {
                                            echo "font-weight: bold;";
                                        } ?>"><i class="fa fa-credit-card"></i><a href="add_costumer">Add Costumer</a></li>
                            <li style="<?php if (($toggle_active) == "atm") {
                                            echo "font-weight: bold;";
                                        } ?>"><i class="fa fa-credit-card"></i><a href="atm">ATM</a></li>
                            <li style="<?php if (($toggle_active) == "sps") {
                                            echo "font-weight: bold;";
                                        } ?>"><i class="fa fa-money"></i><a href="sps">SPS</a></li>
                            <li style="<?php if (($toggle_active) == "spsv1") {
                                            echo "font-weight: bold;";
                                        } ?>"><i class="fa fa-bars"></i><a href="spsv1">SPSV1</a></li>
                        </ul>
                    </li>
                    <li class="<?php if (($toggle_active) == "chat") {
                                    echo "active";
                                } ?>">
                        <a href="chat"> <i class="menu-icon fa fa-envelope"></i>Chat</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->