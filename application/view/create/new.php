<div class="main-container">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-5 cell">
            <!-- echo out the system feedback (error and success messages) -->
            <?php $this->renderFeedbackMessages(); ?>

            <!-- login box on left side -->
            <div class="login-box">

                <!-- register form -->
                <form method="post" action="<?php echo Config::get('URL'); ?>create/register_action">
                    <!-- the user name input field uses a HTML5 pattern check -->
                    <h3>Signin Information</h3>
                    <br><br>
                    <label class="form-label">Username</label>
                        <input type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="letters/numbers, 2 - 64 Chars (e.g. John3)" required />
                    <label class="form-label">Email address</label>
                        <input type="text" name="user_email" placeholder="john@example.com" required />
                    <label class="form-label">Password</label>
                        <input type="password" name="user_password_new" pattern=".{6,}" placeholder="6+ Characters" required autocomplete="off" />
                    <br><br>
                    <h3>Personal Information</h3>
                    <br><br>
                    <label class="form-label">Firstname</label>
                        <input type="text" name="firstname" placeholder="John" />
                    <label class="form-label">Surname</label>
                        <input type="text" name="surname" placeholder="Snow" />
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
                        <input type="text" name="identity" placeholder="min of 13 Characters" />
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
