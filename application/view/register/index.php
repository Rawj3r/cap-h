<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-5 cell">
                <?php $this->renderFeedbackMessages(); ?>
                <h2>Sign up</h2>
                <br>
                <form method="post" action="<?php echo Config::get('URL'); ?>register/register_action">
                    <!-- the user name input field uses a HTML5 pattern check -->
                    <label class="form-label">Username</label>
                        <input type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="letters/numbers, 2 - 64 Chars (e.g. John3)" required />
                    <label class="form-label">Email address</label>
                        <input type="text" name="user_email" placeholder="john@example.com" required />
                    <label class="form-label">Password</label>
                        <input type="password" name="user_password_new" pattern=".{6,}" placeholder="6+ Characters" required autocomplete="off" />
                    <label><small>Clicking Create account means that you agree to the <a href="">Cap-H Services Agreement</a> and <a href="">privacy and cookies statement.</a></small></label>
                    <br><br>
                    <input type="submit" class="button" value="Create account" />
                </form>
            </div>
        </div>
    </div>
</div>
