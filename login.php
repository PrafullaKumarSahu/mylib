<!DOCTYPE HTML>
    <?php
        require_once("core/ini.php");
        if($user->isLoggedIn())
        {
           Redirect::to("index.php");
        }

        $user->login("ferrazzzz","Fzboi1992@@", $date->format("Y-m-d H:i:s"));
    ?>
    <html lang="en" class="app">
        <head>
            <?php include_once("include/content/head.php"); ?>
        </head>
        <body>
            <section id="content" class="m-t-lg wrapper-md">
                <div class="container aside-xl">
                    <img class="logo" src="images/logo/main_logo.png">
                    <section class="m-b-lg">
                        <header class="wrapper text-center">
                            <strong>Login Page</strong>
                        </header>
                        <form action="login.php" method="post">
                            <div class="list-group">
                                <div class="list-group-item">
                                    <input type="text" placeholder="Username" name="username" class="form-control no-border">
                                </div>
                                <div class="list-group-item">
                                    <input type="password" placeholder="Password" name="password" class="form-control no-border">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                            <div class="text-center m-t m-b"><a href="forgot.php"><small class="text-warning">Forgot password?</small></a></div>
                            <div class="line line-dashed"></div>
                            <p class="text-muted text-center"><small>Do not have an account?</small></p>
                            <a href="register.php" class="btn btn-lg btn-default btn-block">Create an account</a>
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