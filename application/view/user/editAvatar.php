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
                        <a  href="<?php echo Config::get('URL'); ?>user/changepassword">Password</a>
                    </li>
                    <li class="tabs-title">
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>user/editavatar">Profile picture</a>
                    </li>
                </ul>

        <div class="feedback info">
            If you still see the old picture after uploading a new one: Hard-Reload the page with F5!
        </div>
        <br><br>
        <form action="<?php echo Config::get('URL'); ?>user/uploadAvatar_action" method="post" enctype="multipart/form-data">
            
            <input type="file" name="avatar_file" required />
            <br><br>
            <!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
            
            <input type="submit" class="button small" value="Upload this image" /><br>
            <small for="avatar_file">(Image will be scaled to 80x80 px, only .jpg)</small>
            <hr>
        </form>
        <h3>Delete your profile picture</h3>
        <p><a class="button small secondary" href="<?php echo Config::get('URL'); ?>user/deleteAvatar_action">Delete your profile picture</a>
    </div>
</div>