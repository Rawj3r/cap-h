<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <ul class="tabs cell" data-tabs id="example-tabs">
                    <li class="tabs-title is-active">
                        <a href="<?php echo Config::get('URL'); ?>user/index">Basic information</a>
                    </li>
                    <li class="tabs-title">
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>notification/declined">Payroll information</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>user/employment">Employment information</a>
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
                <br><br>
                <h4 class="subheader text-center">This function has been disabled.</h4>
            </div>
        </div>
    </div>
</div>
