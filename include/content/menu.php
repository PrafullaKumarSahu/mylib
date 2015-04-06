<aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
    <section class="vbox">
        <section class="w-f scrollable">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 223px;"><div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railopacity="0.2" style="overflow: hidden; width: auto; height: 223px;">
                <nav class="nav-primary hidden-xs">
                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Main Menu</div>
                        <!-- Content Action Menu -->
                        <ul class="nav nav-main" data-ride="collapse">
                            <li>
                                <a href="#" class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="i i-circle-sm-o text"></i>
                                        <i class="i i-circle-sm text-active"></i>
                                    </span>
                                    <b class="badge bg-danger pull-right"><?php print(sizeof($library->favBooks())); ?></b>
                                    <i class="fa fa-star icon">
                                    </i>
                                    <span class="font-bold">Favorite Books</span>
                                </a>
                                <ul class="nav dk">
                                    <?php
                                        $favorites = $library->favBooks();
                                        for($i = 0; $i < sizeof($favorites); $i++)
                                        {
                                            print('<li><a href="#" class="auto"><i class="i i-dot"></i><span>'.$favorites[$i]['title'].'</span></a></li>');
                                        }
                                    ?>
                                </ul>

                            </li>
                            <li>
                                <a href="#" class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="i i-circle-sm-o text"></i>
                                        <i class="i i-circle-sm text-active"></i>
                                    </span>
                                    <b class="badge bg-danger pull-right"><?php print(sizeof($library->categories())); ?></b>
                                    <i class="fa fa-folder-open icon">
                                    </i>
                                    <span class="font-bold">Categories</span>
                                </a>
                                <ul class="nav dk">
                                    <?php
                                        $categories = $library->categories();
                                        for($i = 0; $i < sizeof($categories); $i++)
                                        {
                                            print('<li><a href="#" class="auto"><i class="i i-dot"></i><span>'.$categories[$i]['name'].'</span></a></li>');
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="auto">
                                    <span class="pull-right text-muted">
                                        <i class="i i-circle-sm-o text"></i>
                                        <i class="i i-circle-sm text-active"></i>
                                    </span>
                                    <i class="fa fa-cogs icon">
                                    </i>
                                    <span class="font-bold">Manage</span>
                                </a>
                                <ul class="nav dk">
                                    <li>
                                        <a href="#" class="auto">
                                            <i class="fa fa-upload"></i>
                                            <span>Upload book</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="auto">
                                            <i class="fa  fa-file-o"></i>
                                            <span>Categories</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="auto">
                                            <i class="fa  fa-files-o"></i>
                                            <span>Sub-Categories</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="line dk hidden-nav-xs"></div>
                        <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">My Account</div>
                        <ul class="nav">
                            <li>
                                <a href="#">
                                    <i class="i i-circle-sm-o text-danger-dk"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="i i-circle-sm-o text-success-lt"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <i class="i i-circle-sm-o text-warning"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- / nav -->
                </div><div class="slimScrollBar" style="width: 10px; position: absolute; top: -282px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 0px; height: 88.4857651245552px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 10px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 0px; background: rgb(51, 51, 51);"></div></div>
        </section>
    </section>
</aside>