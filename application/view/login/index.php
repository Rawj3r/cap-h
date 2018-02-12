<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-5 cell">
                <?php $this->renderFeedbackMessages(); ?>
                <h2>Sign in</h2>
                <br>
                <form action="<?php echo Config::get('URL'); ?>login/login" method="post">
                    <label class="form-label">Email address or username</label>
                    <input type="text" name="user_name" placeholder="johnsnow@example.com or johnsnow" required />
                    <label class="form-label">Password</label>
                    <input type="password" name="user_password" required />
                    <label for="set_remember_me_cookie" class="">
                        <input type="checkbox" name="set_remember_me_cookie" class="" />
                        Remember me for 2 weeks
                    </label><br>
                    <!-- when a user navigates to a page that's only accessible for logged a logged-in user, then
                         the user is sent to this page here, also having the page he/she came from in the URL parameter
                         (have a look). This "where did you came from" value is put into this form to sent the user back
                         there after being logged in successfully.
                         Simple but powerful feature, big thanks to @tysonlist. -->
                    <?php if (!empty($this->redirect)) { ?>
                        <input type="hidden" name="redirect" value="<?php echo $this->encodeHTML($this->redirect); ?>" />
                    <?php } ?>
					<!--
						set CSRF token in login form, although sending fake login requests mightn't be interesting gap here.
						If you want to get deeper, check these answers:
							1. natevw's http://stackoverflow.com/questions/6412813/do-login-forms-need-tokens-against-csrf-attacks?rq=1
							2. http://stackoverflow.com/questions/15602473/is-csrf-protection-necessary-on-a-sign-up-form?lq=1
							3. http://stackoverflow.com/questions/13667437/how-to-add-csrf-token-to-login-form?lq=1
					-->
					<input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
                    <input type="submit" class="button" value="Sign in"/>
                </form>
                <div class="link-forgot-my-password">
                    <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset">I forgot my password</a>
                </div>
            </div>
        </div>
    </div>
</div>
