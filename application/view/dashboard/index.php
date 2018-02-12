<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
                <div class="grid-x grid-padding-x">
                    <div class="large-12 cell">
                        <a class="float-right" href="<?php echo Config::get('URL'); ?>leave/">+ Apply for leave</a>
                    </div>
                </div>
                <!--
                    // SET leaves to user
                    INSERT INTO leaves (leave_type, balance, user_id) VALUES (:leave_type, :balance, :user_id)
                    // Get leave balance
                    SELECT balance FROM leaves WHERE leave_type = leave_type AND user_id = SESSION('user_id')
                -->
                <div class="grid-x grid-padding-x">
                    <div class="large-5 medium-5 small-5 cell cards">
                        <h5 class="subheader">Leave transaction</h5>
                    </div>
                    <div class="large-5 medium-5 small-5 cell cards">
                        <h5 class="subheader">Leave balance</h5>
                    </div>
                    <div class="large-2 medium-2 small-2 cell cards">
                        <h5 class="subheader">Leave</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
