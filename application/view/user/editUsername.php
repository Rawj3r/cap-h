<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
    <?php $this->renderFeedbackMessages(); ?>
    <ul class="tabs" data-tabs id="example-tabs">
                    <li class="tabs-title is-active">
                        <a href="<?php echo Config::get('URL'); ?>dashboard/index">Pending</a>
                    </li>
                    <li class="tabs-title">
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>dashboard/approved">Approved</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>dashboard/declined">Declined</a>
                    </li>
                </ul>
        <h2>Change your username</h2>

        <form action="<?php echo Config::get('URL'); ?>user/editUserName_action" method="post">
            <!-- btw http://stackoverflow.com/questions/774054/should-i-put-input-tag-inside-label-tag -->
            <label>
                New username: <input type="text" name="user_name" required />
            </label>
			<!-- set CSRF token at the end of the form -->
			<input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
            <input type="submit" value="Submit" />
        </form>
    </div>
</div>
