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
                                                            <h1>Create Category</h1>
                                                            <div class="row m-t-xl">
                                                                <div class="col-xs-3 text-right padder-v"></div>
                                                                <div class="col-xs-6 text-center">
                                                                    <?php
                                                                        if(isForm())
                                                                        {
                                                                            $name = inputValue('name');
                                                                            $description = inputValue('description');
                                                                            $public = inputValue('public');
                                                                            $date = $date->format("Y-m-d");

                                                                            if(!empty($name) && !empty($description))
                                                                            {
                                                                                $library->createCategory($name, $description, $date);
                                                                                print '<div class="alert alert-success text-center"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ban-circle"></i><strong>Category Created</strong></div>';

                                                                            }
                                                                            else
                                                                            {
                                                                                $message->add("Please enter all information");
                                                                            }
                                                                        }
                                                                    ?>
                                                                    <?php
                                                                        if($message->get())
                                                                        {
                                                                            print '<div class="alert alert-danger text-center"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ban-circle"></i><strong>'.$message->get().'</strong></div>';
                                                                        }
                                                                    ?>
                                                                    <form class="form-horizontal" action="" method="post">
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Name:</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="text" class="form-control" name="name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Description:</label>
                                                                            <div class="col-sm-5">
                                                                                <input type="text" class="form-control" name="description">
                                                                            </div>
                                                                        </div>
                                                                        <div class="line line-dashed b-b line-lg pull-in"></div>
                                                                        <div class="form-group">
                                                                            <div class="col-sm-offset-3 col-sm-5">
                                                                                <button type="submit" class="btn btn-sm btn-primary">Create Category</button>
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