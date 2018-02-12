<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
                <ul class="tabs" data-tabs id="example-tabs" style="border-bottom: 0 !important;">
                    <li class="tabs-title is-active">
                        <a href="<?php echo Config::get('URL'); ?>notification/index">Pending</a>
                    </li>
                    <li class="tabs-title">
                        <a href="<?php echo Config::get('URL'); ?>notification/approved">Approved</a>
                    </li>
                    <li class="tabs-title">
                        <a aria-selected="true" href="<?php echo Config::get('URL'); ?>notification/declined">Declined</a>
                    </li>
                </ul>
                <?php if (Session::get("user_account_type") == 7) { ?>
                        <?php if ($this->leave_information) { ?>
                        <table>
                            <thead class="shaded">
                                <tr class="profiles">
                                    <td width="200"><br><h6 class="subheader">Full name</h6></td>
                                    <td width="100"><br><h6 class="subheader">Leave</h6></td>
                                    <td width="100"><br><h6 class="subheader">From</h6></td>
                                    <td width="100"><br><h6 class="subheader">&nbsp;</h6></td>
                                    <td width="100"><br><h6 class="subheader">To</h6></td>
                                    <td width="400"><br><h6 class="subheader">Comments</h6></td>
                                    <td width="250" class="float-right"><br><h6 class="subheader float-right">Action</h6></td>
                                    <!--td><br><h6 class="subheader">Date modified</h6></td-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->leave_information as $key => $value) { ?>
                                <tr>
                                    <td><?= '<b>'.$value->first_name .' '.$value->second_name .'<b><br><small class="subheader">'.$value->role.'<small>'; ?></td>
                                    <td><?= htmlentities($value->leave_name); ?></td>
                                    <td><?= htmlentities($value->from_date); ?></td>
                                    <td><img src="<?php echo Config::get('URL'); ?>icons/arrow-forward.png" width="40"></td>
                                    <td><?= htmlentities($value->to_date); ?></td>
                                    <td><small class="subheader"><?= htmlentities($value->comments); ?></small></td>
                                    <td>
                                        <div class="small button-group float-right">
                                            <a class="button success hollow" href="<?= Config::get('URL') . 'dashboard/approve/' . $value->request_id; ?>">Approve</a></td>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } else { ?>
                        <div class="large-12 text-center cell">
                            <br><br>
                            <img src="<?php echo Config::get('URL'); ?>icons/no-calendar.png" width="80" />
                            <br><br>
                            <h6 class="subheader">No declined leaves</h6>
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php if (Session::get("user_account_type") == 1) { ?>
                        <?php if ($this->leave_information) { ?>
                        <table>
                            <thead class="shaded">
                                <tr class="profiles">
                                    <td width="200"><br><h6 class="subheader">Full name</h6></td>
                                    <td width="100"><br><h6 class="subheader">Leave</h6></td>
                                    <td width="100"><br><h6 class="subheader">From</h6></td>
                                    <td width="100"><br><h6 class="subheader">&nbsp;</h6></td>
                                    <td width="100"><br><h6 class="subheader">To</h6></td>
                                    <td width="400"><br><h6 class="subheader">Comments</h6></td>
                                    <td width="250" class="float-right"><br><h6 class="subheader float-right">Action</h6></td>
                                    <!--td><br><h6 class="subheader">Date modified</h6></td-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->leave_information as $key => $value) { ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><?= htmlentities($value->start_date); ?></td>
                                    <td><img src="<?php echo Config::get('URL'); ?>icons/arrow-forward.png" width="40"></td>
                                    <td><?= htmlentities($value->end_date); ?></td>
                                    <td></td>
                                    <td>
                                        <div class="small button-group float-right">
                                            <a class="button success hollow" href="<?= Config::get('URL') . 'dashboard/approve/' . $value->id; ?>">Approve</a>&nbsp;<a class="button alert hollow" href="<?= Config::get('URL') . 'dashboard/decline/' . $value->id; ?>">Decline</a></td>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } else { ?>
                        <div class="large-12 text-center cell">
                            <br><br>
                            <img src="<?php echo Config::get('URL'); ?>icons/no-calendar.png" width="80" />
                            <br><br>
                            <h6 class="subheader">No declined leaves</h6>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
