<!DOCTYPE HTML>
    <?php
        require_once("core/ini.php");
        if($user->isLoggedIn())
        {
           Redirect::to("/");
        }
    ?>
    <html lang="en" class="app">
        <head>
            <?php include_once("include/content/head.php"); ?>
        </head>
        <body>
            <section id="content" class="m-t-lg wrapper-md">
                <div class="container aside-xl">
                    <img class="logo" src="<?php print($host); ?>images/logo/main_logo.png">
                    <section class="m-b-lg">
                        <header class="wrapper text-center">
                            <strong>Register Page</strong>
                        </header>
                        <?php
                            if(isForm())
                            {
                                // Input Field Values
                                $username = inputValue("username");
                                $email = inputValue("email");
                                $password = inputValue("password");
                                $password2 = inputValue("password2");
                                $token = inputValue("csrf_token");

                                if(!empty($username) && !empty($password) && !empty($password2) && !empty($email))
                                {
                                    if(Security::isToken($token))
                                    {
                                        if(!$user->isValidUser($username))
                                        {
                                            if(!$user->emailExist($email))
                                            {
                                                if($password != $password2)
                                                {
                                                    $message->add("The passwords your entered do not match!");
                                                }
                                                else
                                                {
                                                    $user->createUser("users", array(
                                                        "email" => $email,
                                                        "username" => $username,
                                                        "password" => Security::encrypt($password),
                                                        "date_joined" => $date->format("Y-m-d"),
                                                        "token" => Security::generate()
                                                    ));

                                                    print '<div class="alert alert-success text-center"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ban-circle"></i><strong>Image Changed</strong></div>';
                                                }
                                            }
                                            else
                                            {
                                                $message->add("That email is already in use!");
                                            }
                                        }
                                        else
                                        {
                                            $message->add("That Username already exists!");
                                        }
                                    }
                                    else
                                    {
                                        $message->add("Something went wrong please refresh the page");
                                    }
                                }
                                else
                                {
                                    $message->add("Please complete the form!");
                                }

                            }
                        ?>
                        <form action="/register/" method="post">
                            <div class="list-group">
                                <div class="list-group-item">
                                    <input type="text" placeholder="Username" name="username" class="form-control no-border">
                                </div>
                                <div class="list-group-item">
                                    <input type="text" placeholder="Email" name="email" class="form-control no-border">
                                </div>
                                <input type="hidden" name="csrf_token" value="<?php print(Security::doToken()); ?>">
                                <div class="list-group-item">
                                    <input type="password" placeholder="Password" name="password" class="form-control no-border">
                                </div>
                                <div class="list-group-item">
                                    <input type="password" placeholder="Password" name="password2" class="form-control no-border">
                                </div>
                            </div>
                            <?php
                                if($message->get())
                                {
                                    print '<div class="alert alert-danger text-center"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ban-circle"></i><strong>'.$message->get().'</strong></div>';
                                }
                            ?>
                            <button type="submit" class="btn btn-lg btn-default btn-block">Create Account</button>
                            <div class="line line-dashed"></div>
                            <p class="text-muted text-center"><small>Already Have an Account?</small></p>
                            <a href="/" class="btn btn-lg btn-primary btn-block">Login Page</a>
                        </form>
                    </section>
                </div>
            </section>
            <!-- footer -->
            <footer id="footer">
                <div class="text-center padder">
                    <p>
                        <small>mylib.co.uk &copy; 2013</small>
                    </p>
                </div>
            </footer>
            <?php require_once("include/content/js.php"); ?>
        </body>
    </html>