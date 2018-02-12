<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
            <?php $this->renderFeedbackMessages(); ?>
            <h2>Account settings</h2>
            <br>
                <ul class="tabs" data-tabs id="example-tabs">
                    <li class="tabs-title is-active">
                        <a href="<?php echo Config::get('URL'); ?>user/edituseremail">Email address</a>
                    </li>
                    <li class="tabs-title">
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>user/changepassword">Password</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/editavatar">Profile picture</a>
                    </li>
                </ul>

        <!-- new password form box -->
        <form method="post" action="<?php echo Config::get('URL'); ?>user/changePassword_action" name="new_password_form">
            <label for="change_input_password_current"><b>Current Password</b></label>
            <p><input id="change_input_password_current" class="reset_input" type='password'
                   name='user_password_current' pattern=".{6,}" required autocomplete="off"  /></p>
            <label for="change_input_password_new"><b>New password (min. 6 characters)</b></label>
            <p><input id="change_input_password_new" class="reset_input" type="password"
                   name="user_password_new" pattern=".{6,}" required autocomplete="off" /></p>
            <label for="change_input_password_repeat"><b>Repeat new password</b></label>
            <p><input id="change_input_password_repeat" class="reset_input" type="password"
                   name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /></p>
            <input type="submit" class="button small"  name="submit_new_password" value="Submit new password" />
        </form>

    </div>
</div>
