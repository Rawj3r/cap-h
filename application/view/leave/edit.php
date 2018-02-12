<div class="container">
    <h1>NoteController/edit/:note_id</h1>

    <div class="box">
        <h2>Edit a note</h2>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->leave) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>leave/editSave">
                <label>Change text of note: </label>
                <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                <input type="hidden" name="id" value="<?php echo htmlentities($this->leave->id); ?>" />
                <input type="text" name="leave_type" value="<?php echo htmlentities($this->leave->leave_type); ?>" />
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This note does not exist.</p>
        <?php } ?>
    </div>
</div>
