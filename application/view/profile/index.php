<div class="main-container">
    <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <a class="float-right" href="<?php echo Config::get('URL'); ?>create/news/">+ Add new employee</a>
        </div>
        <br><br>
    </div>
    <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <table>
                <thead class="shaded">
                    <tr class="profiles">
                        <td width="400"><br><h6 class="subheader">Full names</h6></td>
                        <td width="230"><br><h6 class="subheader">Email address</h6></td>
                        <td width="180"><br><h6 class="subheader">Mobile number</h6></td>
                        <td width="206"><br><h6 class="subheader">Employee number</h6></td>
                        <td width="177"><br><h6 class="subheader">Role</h6></td>
                        <td width="144"><br><h6 class="subheader">Date hired</h6></td>
                        <td width="177"><br><h6 class="subheader">Export data</h6></td>
                        <!--td><br><h6 class="subheader">Date modified</h6></td-->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->users as $user) { ?>
                        <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?>">
                            <td class="avatar">
                                <?php if (isset($user->user_avatar_link)) { ?>
                                    <img class="avatar-image" src="<?= $user->user_avatar_link; ?>" /><b><?= $user->first_name . '&nbsp;' .  $user->second_name.'</b>&nbsp;'; ?><small class="label small warning"><?= $user->is_admin; ?></small>
                                <?php } ?>
                            </td>
                            <td><?= $user->user_email; ?></td>
                            <td><?= $user->phone; ?></td>
                            <td><?= $user->person_number; ?></td>
                            <td><?= $user->role .'&nbsp;'; ?></td>
                            <td><?= $user->date_hired; ?></td>
                            <td><a href="<?php echo Config::get('URL'); ?>export/profile/<?php echo $user->user_id; ?>"><?= lcfirst($user->first_name)  ."". date("Y").".xls" ?></a></td>

                            <!--td><?= $user->user_email; ?></td-->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>