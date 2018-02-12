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
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>user/employment">Employment information</a>
                    </li>
                    <li style="display:none;" class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/skills">Skills information</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/leaves">Leaves</a>
                    </li>
                </ul>
            <div class="large-12 cell">
                <!-- echo out the system feedback (error and success messages) -->
                <?php $this->renderFeedbackMessages(); ?>
                
                <?php if ($this->user) { ?>
                    <div class="grid-x grid-padding-x">
                        <div class="large-12 cell">
                            <br><br>
                            <h6 class="subheader"><b>Employment Information</b></h6>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x personal">
                        <div class="large-3 cell">
                            <label><b>Employee number</b></label><br>
                            <label><?= $this->user->person_number; ?></label>
                        </div>
                        <div class="large-3 cell">
                            <label><b>Managed by</b></label><br>
                            <label><?= $this->user->second_name; ?></label>
                        </div>
                        <div class="large-3 cell">
                            <label><b>Role</b></label><br>
                            <label><?= $this->user->role; ?></label>
                        </div>
                        <div class="large-3 cell">
                            <label><b>Date Hired</b></label><br>
                            <label><?= $this->user->date_hired; ?></label>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
