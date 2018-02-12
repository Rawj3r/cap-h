<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
                <ul class="tabs" data-tabs id="example-tabs">
                    <li class="tabs-title is-active">
                        <a href="<?php echo Config::get('URL'); ?>notification/index">Pending</a>
                    </li>
                    <li class="tabs-title">
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>notification/approved">Approved</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>notification/declined">Declined</a>
                    </li>
                </ul>
                <div class="box">
                    <!-- echo out the system feedback (error and success messages) -->
                    <?php $this->renderFeedbackMessages(); ?>
                    <?php if (Session::get("user_account_type") == 7) { ?>
                        <?php if ($this->leave_request) { ?>
                            <table class="note-table">
                                <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>leave type</td>
                                    <td>from</td>
                                    <td>to</td>
                                    <td>number of days</td>
                                    <td>status</td>
                                    <td>user id</td>
                                    <td>Balance</td>
                                    <td>comments</td>
                                    <td class="float-right">Options</td>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->leave_request as $key => $value) { ?>
                                        
                                        <tr>
                                            <td><?= $value->id; ?></td>
                                            <td><?= htmlentities($value->leave_type); ?></td>
                                            <td><?= htmlentities($value->start_date); ?></td>
                                            <td><?= htmlentities($value->end_date); ?></td>
                                            <td><?= htmlentities($value->number_of_days); ?></td>
                                            <td><?= htmlentities($value->status); ?></td>
                                            <td><?= htmlentities($value->user_id); ?></td>
                                            <td><?= htmlentities($value->leave_balance); ?></td>
                                            <td><?= htmlentities($value->comments); ?></td>
                                            <td>
                                                <div class="small button-group float-right">
                                                    <a class="button alert hollow" href="<?= Config::get('URL') . 'dashboard/decline/' . $value->id; ?>">Decline</a></td>
                                                </div>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } else { ?>
                                <div class="large-12 text-center cell">
                                    <br><br>
                                    <img src="<?php echo Config::get('URL'); ?>icons/no-calendar.png" width="80" />
                                    <br><br>
                                    <h6 class="subheader">No approved leaves</h6>
                                </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
