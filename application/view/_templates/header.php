<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cap H &mdash; Leave Management System</title>
        <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/foundation.css">
        <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/app.css">
    </head>
    <body>
        <header class="cd-auto-hide-header">
        <div class="logo">
            <a href="<?php echo Config::get('URL'); ?>"><img src="<?php echo Config::get('URL'); ?>img/cap-logo-1.png" style="width: 45px !important; height: 45px !important;" /></a>
        </div>

        <nav class="cd-primary-nav">
            <a href="#cd-navigation" class="nav-trigger">
                <span>
				<em aria-hidden="true"></em>
			</span>
            </a>

            <ul id="cd-navigation">
                <?php if (Session::userIsLoggedIn()) { ?>
                    <?php if (Session::get("user_account_type") == 7) { ?>
                        <li><?php if (View::checkForActiveController($filename, "index")) ?>
                            <a href="<?php echo Config::get('URL'); ?>dashboard/">Dashboard</a></li>
                        <li><?php if (View::checkForActiveController($filename, "index")) ?>
                            <a href="<?php echo Config::get('URL'); ?>profile/index/">Employees</a></li>
                        <li><?php if (View::checkForActiveController($filename, "index")) ?>
                            <a href="<?php echo Config::get('URL'); ?>notification/">Notifications</a></li>
                        <li><?php if (View::checkForActiveController($filename, "index")) ?>
                            <a href="<?php echo Config::get('URL'); ?>user/">Me</a></li>

                              <li><?php if (View::checkForActiveController($filename, "pay")) ?>
                            <a href="<?php echo Config::get('URL'); ?>pay/">Pay</a></li>

                        <li><?php if (View::checkForActiveController($filename, "login")) ?>
                            <a href="<?php echo Config::get('URL'); ?>login/logout">Sign out</a></li>
                    <?php } else { ?>
                        <?php if (Session::get("user_account_type") == 1) { ?>
                            <li><?php if (View::checkForActiveController($filename, "index")) ?>
                                <a href="<?php echo Config::get('URL'); ?>dashboard/">Dashboard</a></li>
                            <li><?php if (View::checkForActiveController($filename, "index")) ?>
                                <a href="<?php echo Config::get('URL'); ?>notification/">Notifications</a></li>
                            <li><?php if (View::checkForActiveController($filename, "index")) ?>
                                <a href="<?php echo Config::get('URL'); ?>user/">Me</a></li>
                            <li><?php if (View::checkForActiveController($filename, "login")) ?>
                                <a href="<?php echo Config::get('URL'); ?>login/logout">Sign out</a></li>
                        <?php } ?>
                    <?php } ?>
                <?php } else { ?>
                    <!-- for not logged in users -->
                    <!-- <li <?php if (View::checkForActiveControllerAndAction($filename, "login/index/")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>login/index/">How it works</a>
                    </li> -->
                    <li <?php if (View::checkForActiveControllerAndAction($filename, "register/index/")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>login/index/">Sign in</a>
                    </li>
                    <li <?php if (View::checkForActiveControllerAndAction($filename, "register/index/")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>register/index/">Sign up</a>
                    </li>
                    <li <?php if (View::checkForActiveControllerAndAction($filename, "contact/index/")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>contact/index/">Contact</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </header>