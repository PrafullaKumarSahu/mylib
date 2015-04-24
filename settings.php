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
                                                                    <?php
                                                                        if(isForm()) {
                                                                            $fname = inputValue('fname');
                                                                            $lname = inputValue('lname');
                                                                            $public = inputValue('public');
                                                                            $opassword = inputValue('opassword');
                                                                            $npassword = inputValue('npassword');
                                                                            $npassword2 = inputValue('npassword2');


                                                                            if ($fname != $user->getData('fname') && !empty($fname)) {
                                                                                $user->updateDetails("users", array
                                                                                    (
                                                                                        "fname" => $fname
                                                                                    )
                                                                                    , "id=" . $user->getData('id'));
                                                                            }
                                                                            if ($lname != $user->getData('lname') && !empty($lname)) {
                                                                                $user->updateDetails("users", array
                                                                                    (
                                                                                        "lname" => $lname
                                                                                    )
                                                                                    , "id=" . $user->getData('id'));
                                                                            }
                                                                            if ($public != $user->getData('public') && !empty($public) && $public == 1 || $public == 0) {
                                                                                $user->updateDetails("users", array
                                                                                    (
                                                                                        "public" => $public
                                                                                    )
                                                                                    , "id=" . $user->getData('id'));
                                                                            }
                                                                            if (!empty($opassword) && Security::encrypt($opassword) == $user->getData('password') && !empty($npassword) && !empty($npassword2)) {
                                                                                if ($npassword != $npassword2) {
                                                                                    $message->add("The new passwords do not match!");
                                                                                }
                                                                                else
                                                                                {
                                                                                    if(Security::encrypt($npassword) != Security::encrypt($opassword))
                                                                                    {
                                                                                        $user->updateDetails("users", array
                                                                                            (
                                                                                                "password" => Security::encrypt($npassword)
                                                                                            )
                                                                                            , "id=" . $user->getData('id'));
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $message->add("Your already using that password");
                                                                                    }
                                                                                }
                                                                            }
                                                                            if (!empty($opassword) && Security::encrypt($opassword) == $user->getData('password') && empty($npassword) && empty($npassword2))
                                                                            {
                                                                                $message->add("Please enter your new password!");
                                                                            }
                                                                            if (empty($opassword) && !empty($npassword) && !empty($npassword2)) {
                                                                                $message->add("Please enter your current password!");
                                                                            }
                                                                        }

                                                                    ?>
                                                                    <form class="form-horizontal" action="" method="post">
                                                                        <?php
                                                                            if($message->get())
                                                                            {
                                                                                print '<div class="alert alert-danger text-center"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ban-circle"></i><strong>'.$message->get().'</strong></div>';
                                                                            }
                                                                        ?>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">First Name:</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="text" class="form-control" name="fname" value="<?php print $user->getData('fname'); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Last Name:</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="text" class="form-control" name="lname" value="<?php print $user->getData('lname'); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="line line-dashed b-b line-lg pull-in"></div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label" for="input-id-1">Username:</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="text" class="form-control" id="input-id-1" disabled="disabled" value="<?php print $user->getData('username'); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label" for="input-id-1">Public Profile:</label>
                                                                            <div class="col-sm-5">
                                                                                <select class="form-control" name="public">
                                                                                    <?php
                                                                                        if($user->getData('public') == 1)
                                                                                        {
                                                                                            print("<option value='1'selected>Yes</option>");
                                                                                            print("<option value='0'>No</option>");
                                                                                        }
                                                                                        elseif($user->getData('public') == 0)
                                                                                        {
                                                                                            print("<option value='0' selected>No</option>");
                                                                                            print("<option value='1'>Yes</option>");
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="line line-dashed b-b line-lg pull-in"></div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Current Password:</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="password" class="form-control" name="opassword">
                                                                                <input type="hidden" class="form-control" name="csfr_token" value="<?php print(Security::doToken()); ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Password:</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="password" class="form-control" name="npassword">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Password Again:</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="password" class="form-control" name="npassword2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-offset-3 col-sm-5">
                                                                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-xs-3 padder-v"></div>
                                                            </div>
                                                        </div>
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