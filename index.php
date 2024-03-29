<!DOCTYPE HTML>
    <?php
        require_once("core/ini.php");
        if(!$user->isLoggedIn())
        {
            Redirect::to("login/");
        }
    ?>
    <html lang="en" class="app">
        <head>
            <?php
                include_once("include/content/head.php");
                print("<title>".$user->getData('username').'- mylib.co.uk'."</title>");
            ?>
        </head>
        <body>
            <section class="vbox">
                <?php include_once("include/content/top-bar.php");?>
                <section>
                    <section class="hbox stretch">
                        <?php include_once("include/content/menu.php");?>
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

                                                                                    if($user->getData('avatar') == 'avatardefault.jpg')
                                                                                    {
                                                                                        print("images/users/avatardefault.jpg");
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        print($user->getData('avatar'));
                                                                                    }

                                                                                ?>" class="dker">
                                                                            </div>
                                                                            <canvas width="140" height="140"></canvas></div>
                                                                        <div class="h4 m-t m-b-xs font-bold text-lt"><?php print($user->getData("fname"). " " . $user->getData("lname")); ?></div>
                                                                        <small class="text-muted m-b"><?php print($user->getData("username")); ?></small>
                                                                    </div>
                                                                    <?php
                                                                        if(isForm())
                                                                        {
                                                                            $image = inputValue("image");
                                                                            if(strlen($image) > 255)
                                                                            {
                                                                                $message->add("That URL is too large");
                                                                            }
                                                                            else
                                                                            {
                                                                                $user->updateDetails("users", array
                                                                                    (
                                                                                        "avatar" => $image
                                                                                    )
                                                                                    , "id=" . $user->getData('id'));
                                                                                print '<div class="alert alert-success text-center"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ban-circle"></i><strong>Image Changed</strong></div>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                    <?php
                                                                        if($message->get())
                                                                        {
                                                                            print '<div class="alert alert-danger text-center"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ban-circle"></i><strong>'.$message->get().'</strong></div>';
                                                                        }
                                                                    ?>
                                                                    <form action="" method="post">
                                                                        <input type="text" name="image" placeholder="Please enter a URL"><br>
                                                                        <input type="submit" value="Change Picture">
                                                                    </form>
                                                                </div>
                                                                <div class="col-xs-3 padder-v"></div>
                                                            </div>
                                                            <div class="wrapper m-t-xl m-b">
                                                                <div class="row m-b">
                                                                    <div class="col-xs-6 text-right">
                                                                        <small>E-mail</small>
                                                                        <div class="text-lt font-bold"><?php print($user->getData("email")); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <small>Number of Books</small>
                                                                        <div class="text-lt font-bold"><?php print(sizeof($library->books())); ?></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-6 text-right">
                                                                        <small>Profile Views</small>
                                                                        <div class="text-lt font-bold"><?php print($user->getData('views')); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <small>Country</small>
                                                                        <div class="text-lt font-bold">United Kingdom</div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-6 text-right">
                                                                        <small>Member Since</small>
                                                                        <div class="text-lt font-bold"><?php print($user->getData("date_joined")); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <small>Last Seen</small>
                                                                        <div class="text-lt font-bold"><?php print($user->getData("last_login")); ?></div>
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