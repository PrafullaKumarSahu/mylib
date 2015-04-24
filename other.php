<!DOCTYPE HTML>
    <?php
        require_once("core/ini.php");
        if(!$user->isLoggedIn())
        {
            Redirect::to("login.php");
        }
    ?>
    <html lang="en" class="app">
        <head>
            <?php
                include_once("include/content/head.php");
                print("<title>".$user->getData('username')."</title>");
            ?>
        </head>
        <body class="secondary-b">
            <section class="vbox">
                <?php include_once("include/content/top-bar.php");?>
                <section>
                    <section class="hbox stretch">
                        <?php include_once("include/content/menu.php");?>
                        <section id="content">
                            <section class="vbox">
                                <section class="scrollable wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- .breadcrumb -->
                                            <ul class="breadcrumb">
                                                <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                                <li class="active">Settings</li>
                                            </ul>
                                            <!-- / .breadcrumb -->
                                        </div>
                                        <div class="col-lg-12">
                                            <section class="panel panel-default">
                                                <header class="panel-heading bg-light">
                                                    <ul class="nav nav-tabs nav-justified">
                                                        <li class=""><a href="#home" data-toggle="tab">Home</a></li>
                                                        <li class=""><a href="#profile" data-toggle="tab">Profile</a></li>
                                                        <li class="active"><a href="#messages" data-toggle="tab">Messages</a></li>
                                                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                                    </ul>
                                                </header>
                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane" id="home">home</div>
                                                        <div class="tab-pane" id="profile">profile</div>
                                                        <div class="tab-pane active" id="messages">message</div>
                                                        <div class="tab-pane" id="settings">settings</div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </section>
                            </section>
                            <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                        </section>
                    </section>
                </section>
            </section>
            <?php require_once("include/content/js.php"); ?>
        </body>
    </html>