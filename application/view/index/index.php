<style>
        .front-banner {
            background: url(<?php echo Config::get('URL'); ?>img/icon-pattern-blue.png) center center no-repeat;
            height: 410px;
            background-size: cover;
        }
        .background{
            background: url(<?php echo Config::get('URL'); ?>img/small-business.jpg) center center no-repeat;
            background-size: cover;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }
    </style>
<?php $this->renderFeedbackMessages(); ?>
<?php if(!Session::userIsLoggedIn()){ ?>
    <section class="front-banner">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="large-5 cell intro-title end">
                    <h2>Hello! We are Cap-H</h2>
                    <hr width="15%" class="float-left"><br><br>
                    <h5>Say hello to a better leave management tool for start-ups &amp; SMEs.</h5>
                    <br>
                    <a href="<?php echo Config::get('URL'); ?>register/index/" class="button small" style="background: #fff; color: #2979FF;">GET ME STARTED</a>
                </div>
            </div>
        </div>
    </section>
    <div class="main-page main-section">
        <div class="section main-content" style="padding-top: 3rem;">
        <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="marketing-site-features">
                <h3><p class="marketing-site-features-subheadline subheader">What CAP H does</p></h3>
                <div class="grid-x grid-padding-x">
                    <div class="large-4 cell">
                        <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                        <h4 class="marketing-site-features-title">Automated Leave Management</h4>
                        <label class="marketing-site-features-desc">Preloaded legislated leave allowance across all categories</label>
                        <label class="marketing-site-features-desc">Leave balances update automatically</label>
                        <label class="marketing-site-features-desc">Notifications to approver and employee emailed automatically</label>
                        <label class="marketing-site-features-desc">Employee profile with updateable records</label>
                        <label class="marketing-site-features-desc">Downloadable reports breaking down pending leaves by employee</label>

                    </div>
                    <div class="large-4 cell">
                        <i class="fa fa-angellist" aria-hidden="true"></i>
                        <h4 class="marketing-site-features-title">Coming Soon - Automated Employee Relations</h4>
                        <label class="marketing-site-features-desc">Automated process guides in line with current labour relations legislation (updated as law changes)</label>
                        <label class="marketing-site-features-desc">Allows SMEs to stay in line with Labour law in disciplinary processes</label>
                        <label class="marketing-site-features-desc">Access to employee relations specialists if disciplinary engagement warrants it</label>
                        <label class="marketing-site-features-desc">Includes templates for all necessary paperwork;</label>
                        <label class="marketing-site-features-desc">Timestamped recordkeeping to ensure compliance and audit trail</label>
                    </div>
                    <div class="large-4 cell">
                        <i class="fa fa-bullseye" aria-hidden="true"></i>
                        <h4 class="marketing-site-features-title">Coming Soon – Timesheet and Attendance Management</h4>
                        <!-- <label class="marketing-site-features-desc">Dicta quas optio alias voluptas nobis iusto mollitia asperiores.</label> -->
                    </div>
                    <!-- <div class="large-3 cell">
                        <i class="fa fa-battery-full" aria-hidden="true"></i>
                        <h4 class="marketing-site-features-title">Feature 4</h4>
                        <label class="marketing-site-features-desc">Dicta quas optio alias voluptas nobis iusto mollitia asperiores.</label>
                    </div> -->
                </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
<?php Redirect::to('dashboard/index'); ?>
<?php } ?>