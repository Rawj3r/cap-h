<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <ul class="tabs cell" data-tabs id="example-tabs">
                    <li class="tabs-title is-active">
                        <a href="<?php echo Config::get('URL'); ?>user/index">Basic information</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/payroll">Payroll information</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/employment">Employment information</a>
                    </li>
                    <li style="display:none;" class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/skills">Skills information</a>
                    </li>
                    <li class="tabs-title">
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>user/leaves">Leaves</a>
                    </li>
                </ul>
            <div class="large-12 cell">
                <!-- echo out the system feedback (error and success messages) -->
                <?php $this->renderFeedbackMessages(); ?>
                <div class="grid-x grid-padding-x">
                    <div class="large-5 medium-5 small-5 cell cards">
                        <h5 class="subheader">Leave transaction</h5>
                        <?php if ($this->leave_information) { ?>
                        <?php foreach($this->leave_information as $key => $value) { ?>
                        <label><?= htmlentities($value->leave_name); ?></label>
                        <label><?= htmlentities($value->max_days); ?></label>
                        <?php }?>
                        <?php }?>
                    </div>
                    <div class="large-5 medium-5 small-5 cell cards">
                        <h5 class="subheader">Leave balance</h5>
                        <?php if ($this->leave_information) { ?>
                        <?php foreach($this->leave_information as $key => $value) { ?>
                        <label><?= htmlentities($value->leave_name); ?></label>
                        <label><?= htmlentities($value->max_days - 5); ?></label>
                        <?php }?>
                        <?php }?>
                    </div>
                    <div class="large-2 medium-2 small-2 cell cards">
                        <h5 class="subheader">Leave</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
