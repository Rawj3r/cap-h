<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-5 cell">

            <!-- echo out the system feedback (error and success messages) -->
            <?php $this->renderFeedbackMessages(); ?>

            <div class="login-box">

                <!--div class="feedback info">
                   Complete your profile with personal information.
                </div-->
                <br><br>

                <!-- register form -->
                <form method="post" action="<?php echo Config::get('URL'); ?>create/register_action">

                    <h3>Personal Information</h3>
                    <br><br>
                    <label class="form-label">Firstname</label>
                        <input type="text" name="first_name" placeholder="Jon" />
                    <label class="form-label">Surname</label>
                        <input type="text" name="second_name" placeholder="Snow" />
                    <label class="form-label">Date hired</label>
                        <input type="date" name="date_of_birth" />
                    <label class="form-label">Phone</label>
                        <input type="text" name="phone" placeholder="+27" />
                    <label class="form-label">Gender</label>
                    <select name="gender">
                        <option>Male</option>
                        <option>Female</option>
                        <option>I don't want to specify</option>
                    </select>
                    <br>
                    <label class="form-label">Race</label>
                    <select name="race">
                        <option>African</option>
                        <option>Indian</option>
                        <option>Coloured</option>
                        <option>White</option>
                        <option>I don't want to specify</option>
                    </select>
                    <br>
                    <label class="form-label">SA ID or Passport number</label>
                        <input type="text" name="sa_passport" placeholder="min of 13 Characters" />
                    <label class="form-label">Address</label>
                        <textarea rows="3" name="address" placeholder="123 The Place, Johannesburg, Gauteng"></textarea>
                    <br>
                    <label class="form-label">City</label>
                        <input type="text" name="city" placeholder="Johannesburg" />
                    <label class="form-label">Province</label>
                        <input type="text" name="province" placeholder="Gauteng" />
                    <label class="form-label">Employee number</label>
                        <input type="text" name="person_number" placeholder="123456" />
                    <label class="form-label">Employee TAX number</label>
                        <input type="text" name="tax_number" placeholder="tax number" />
                    <label class="form-label">Role</label>
                        <input type="text" name="role" placeholder="iOS developer" />
                    <label class="form-label">Date hired</label>
                        <input type="date" name="date_hired" />
                        <input type="submit" class="button expanded" value="Create this employee" />
                </form>
            </div>
        </div>
    </div>
</div>
