<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
            <?php $this->renderFeedbackMessages(); ?>
            <h2>Account settings</h2>
            <br>
                <ul class="tabs" data-tabs id="example-tabs">
                    <li class="tabs-title is-active">
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>user/edituseremail">Email address</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/changepassword">Password</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/editavatar">Profile picture</a>
                    </li>
                </ul>

        <form action="<?php echo Config::get('URL'); ?>user/editUserEmail_action" method="post">
            <div class="large-6 cell">
            <label><b>New email address</b></label>
                <input type="text" name="user_email" required />
            <input type="submit" class="button small" value="Submit" />
            </div>
        </form>
    </div>
</div>
