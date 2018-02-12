<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-5 cell">
            <!-- echo out the system feedback (error and success messages) -->
            <?php $this->renderFeedbackMessages(); ?>
            <h2>Leave application</h2>
            <br><br>
            <form method="post" action="<?php echo Config::get('URL');?>leave/create">
                <label class="subheader"><b>Leave type</b></label>
                <select name="leave_id">
                    <option value="1">Annual leave</option>
                    <option value="2">Sick leave</option>
                    <option value="3">Maternity leave</option>
                    <option value="4">Family responsibility</option>
                    <option value="6">Study</option>
                    <option value="5">Unpaid</option>
                </select>
                <br>
                <div class="grid-x grid-padding-x">
                    <div class="large-6 cell">
                        <label class="subheader"><b>From </b></label><input type="date" name="from_date" />
                    </div>
                    <div class="large-6 cell">
                        <label class="subheader"><b>To </b></label><input type="date" name="to_date" />
                    </div>
                </div>
                <label class="subheader"><b>Comments</b></label>
                <input type="text" name="comments" />
                <input type="file" class="file-upload">
                <br><br>
                <input type="submit" value='Apply for leaves' class="button small expanded" autocomplete="off" />
            </form>
        </div>
    </div>
</div>