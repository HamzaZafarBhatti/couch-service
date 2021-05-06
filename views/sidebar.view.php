<nav id="navigation" class="navigation-sidebar bg-primary">
        <div class="navigation-header">
        <a href="<?php echo SITE_URL ?>"><img src="../assets/images/wbdashboard.png" style="max-width: 130px;"></a>
    </div>

    <!--Navigation Profile area-->
    <div class="navigation-profile" style="padding-bottom: 12px;">
        
        <img class="profile-img rounded-circle" src="../assets/images/avatar.png" alt="profile image">

        <a href="../controller/logout.php" class="circle-white-btn profile-setting"><i class="fa fa-sign-out star-color"></i></a>

    </div>

    <!--Navigation Menu Links-->
    <div class="navigation-menu">

        <ul class="menu-items custom-scroll mCustomScrollbar _mCS_1"><div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">

            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-folder"></i></span>
                    <span class="title">Couch Services</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/couch.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Show All</span>
                        </a>
                    </li>

                    <li>
                        <a href="../controller/add_couch.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Couches Available</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-user-group"></i></span>
                    <span class="title">Users</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">

                    <li>
                        <a href="../controller/users.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">Show All</span>
                        </a>
                    </li>

                    <li>
                        <a href="../controller/add_user.php">
                            <span class="icon-thumbnail"><i class="dripicons-dot"></i></span>
                            <span class="title">New User</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="../controller/roles.php">
                    <span class="icon-thumbnail"><i class="dripicons-user-id"></i></span>
                    <span class="title">Roles</span>
                </a>
            </li>

        </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 90px; max-height: 203.172px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></ul>
    </div>
</nav>