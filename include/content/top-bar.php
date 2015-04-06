<header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
            <i class="fa fa-bars"></i>
        </a>
        <a href="index.html" class="navbar-brand">
            <img src="images/logo/main_logo.png" class="m-r-sm" alt="scale">
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
            <i class="fa fa-cog"></i>
        </a>
    </div>
    <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
                <input type="text" class="form-control input-sm no-border" placeholder="Search for libraries">
            </div>
        </div>
    </form>
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="<?php
                  if($user->getData('avatar') == 'avatardefault.jpg')
                  {
                      print("images/users/avatardefault.jpg");
                  }
                  else
                  {
                      print("include/users/".$user->getData('token')."/".$user->getData('avatar'));
                  }
              ?>" alt="...">
            </span>
                <?php print($user->getData('username')); ?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight">
                <li>
                    <span class="arrow top"></span>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="">Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>