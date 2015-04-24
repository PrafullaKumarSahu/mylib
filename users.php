<!DOCTYPE HTML>
    <?php
        require_once("core/ini.php");
        $username = $_GET['a'];

        if(isset($username))
        {
            if($user->isValidUser($username))
            {
                $data = $user->getProfile($username);
                if($data[0]['public'] == 0)
                {
                    Redirect::to("/");
                }

                $add = $data[0]['views'] + 1;
                $user->updateDetails("users", array
                    (
                        "views" => $add
                    )
                , "id=".$data[0]['id']);
            }
            else
            {
                Redirect::to("include/errors/404.php");
            }
        }

    ?>
    <html lang="en" class="app">
        <head>
            <?php
                include_once("include/content/head.php");
                print("<title>".$data[0]['username'].'- mylib.co.uk'."</title>");
            ?>
        </head>
        <body>
            <section class="vbox">
                <?php include_once("include/content/top-bar.php");?>
                <section>
                    <section class="hbox stretch">
                        <?php
                            if($user->isLoggedIn())
                            {
                                include_once("include/content/menu.php");
                            }
                        ?>
                        <section id="content">
                            <section class="vbox">
                                <section class="scrollable">
                                    <section class="hbox stretch">
                                        <aside class="aside-lg bg-light lter b-r">
                                            <section class="vbox">
                                                <div class="wrapper">
                                                    <section class="panel no-border lt">
                                                        <div class="panel-body">
                                                            <div class="row m-t-xl">
                                                                <div class="col-xs-3 text-right padder-v"></div>
                                                                <div class="col-xs-6 text-center">
                                                                    <div class="inline">
                                                                        <div class="easypiechart easyPieChart" data-percent="0" data-line-width="6" data-bar-color="#fff" data-track-color="#FCD14C" data-scale-color="false" data-size="140" data-line-cap="butt" data-animate="1000" style="width: 140px; height: 140px; line-height: 140px;">
                                                                            <div class="thumb-lg avatar">
                                                                                <img src="<?php

                                                                                    if($data[0]['avatar'] == 'avatardefault.jpg')
                                                                                    {
                                                                                        print("$host"."images/users/avatardefault.jpg");
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        print($data[0]['avatar']);
                                                                                    }

                                                                                ?>" class="dker">
                                                                            </div>
                                                                            <canvas width="140" height="140"></canvas></div>
                                                                        <div class="h4 m-t m-b-xs font-bold text-lt"><?php print($data[0]['fname']. " " . $data[0]['lname']); ?></div>
                                                                        <small class="text-muted m-b"><?php print($data[0]['username']); ?></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-3 padder-v"></div>
                                                            </div>
                                                            <div class="wrapper m-t-xl m-b">
                                                                <div class="row m-b">
                                                                    <div class="col-xs-6 text-right">
                                                                        <small>E-mail</small>
                                                                        <div class="text-lt font-bold">
                                                                            <?php
                                                                                if($user->isLoggedIn())
                                                                                {
                                                                                    print($data[0]['email']);
                                                                                }
                                                                                else
                                                                                {
                                                                                    print("Private");
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <small>Number of Books</small>
                                                                        <div class="text-lt font-bold"><?php print(sizeof($library->getBooks($data[0]['id']))); ?></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-6 text-right">
                                                                        <small>Profile Views</small>
                                                                        <div class="text-lt font-bold"><?php print($data[0]['views']); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <small>Country</small>
                                                                        <div class="text-lt font-bold">United Kingdom</div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-6 text-right">
                                                                        <small>Member Since</small>
                                                                        <div class="text-lt font-bold"><?php print($data[0]['date_joined']); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <small>Last Seen</small>
                                                                        <div class="text-lt font-bold"><?php print($data[0]['last_login']); ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <section class="panel panel-default"> <header class="panel-heading bg-light"> <ul class="nav nav-tabs nav-justified"> <li class="active"><a href="#home" data-toggle="tab">Home</a></li> <li class=""><a href="#profile" data-toggle="tab">Profile</a></li> <li><a href="#messages" data-toggle="tab">Messages</a></li> <li><a href="#settings" data-toggle="tab">Settings</a></li> </ul> </header> <div class="panel-body"> <div class="tab-content"> <div class="tab-pane active" id="home">home</div> <div class="tab-pane" id="profile">profile</div> <div class="tab-pane" id="messages">message</div> <div class="tab-pane" id="settings">settings</div> </div> </div> </section>
                                                    </section>
                                                </div>
                                            </section>
                                        </aside>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
            <?php require_once("include/content/js.php"); ?>
        </body>
    </html>