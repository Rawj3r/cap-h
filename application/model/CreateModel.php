<?php

    /**
    *   Class RegistrationModel
    *
    *   Everything registration-related happens here.
    */

    class CreateModel{

        /**
        *   Handles the entire registration process for DEFAULT users (not for people who register with
        *   3rd party services, like facebook) and creates a new user in the database if everything is fine
        *
        *   @return boolean Gives back the success status of the registration
        */

        public static function registerPerson($first_name, $second_name, $date_of_birth, $gender, $race, $sa_passport, $phone, $address, $city, $province, $person_number, $tax_number, $role, $date_hired){

            $user_email = strip_tags(Request::post('user_email'));

            if (!$first_name || strlen($first_name) == 0) {
                Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
                return false;
            }

            //  Check if ID or Passport number already exists
            if (UserModel::doesIDAlreadyExist($sa_passport)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_ID_ALREADY_TAKEN'));
                $return = false;
            }

            //  Check if TAX number already exists
            if (UserModel::doesTAXAlreadyExist($tax_number)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_TAX_ALREADY_TAKEN'));
                $return = false;
            }

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "INSERT INTO person_information (user_id, first_name, second_name, date_of_birth, gender, race, sa_passport, phone, address, city, province, person_number, tax_number, role, date_hired) VALUES (:user_id, :first_name, :second_name, :date_of_birth, :gender, :race, :sa_passport, :phone, :address, :city, :province, :person_number, :tax_number, :role, :date_hired)";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => Session::get('user_id'),
                ':first_name' => $first_name, 
                ':second_name' => $second_name,
                ':date_of_birth' => $date_of_birth,
                ':gender' => $gender,
                ':race' => $race,
                ':sa_passport' => $sa_passport,
                'phone' => $phone,
                'address' => $address,
                'city' => $city,
                'province' => $province,
                'person_number' => $person_number,
                'tax_number' => $tax_number,
                'role' => $role,
                'date_hired' => $date_hired));

            if ($query->rowCount() == 1) {

                Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_SUCCESSFULLY_CREATED'));
                return true;
            }

            //  Default return
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;

        }

        public static function registerPersons($first_name, $second_name, $date_of_birth, $gender, $race, $sa_passport, $phone, $address, $city, $province, $person_number, $tax_number, $role, $date_hired){

            $user_email = strip_tags(Request::post('user_email'));

            if (!$first_name || strlen($first_name) == 0) {
                Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
                return false;
            }

            // Check if ID or Passport number already exists
            if (UserModel::doesIDAlreadyExist($sa_passport)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_ID_ALREADY_TAKEN'));
                $return = false;
            }

            // Check if TAX number already exists
            if (UserModel::doesTAXAlreadyExist($tax_number)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_TAX_ALREADY_TAKEN'));
                $return = false;
            }

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "INSERT INTO person_information (user_id, first_name, second_name, date_of_birth, gender, race, sa_passport, phone, address, city, province, person_number, tax_number, role, date_hired) VALUES (:user_id, :first_name, :second_name, :date_of_birth, :gender, :race, :sa_passport, :phone, :address, :city, :province, :person_number, :tax_number, :role, :date_hired)";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => Session::get('user_id'),
                ':first_name' => $first_name, 
                ':second_name' => $second_name,
                ':date_of_birth' => $date_of_birth,
                ':gender' => $gender,
                ':race' => $race,
                ':sa_passport' => $sa_passport,
                'phone' => $phone,
                'address' => $address,
                'city' => $city,
                'province' => $province,
                'person_number' => $person_number,
                'tax_number' => $tax_number,
                'role' => $role,
                'date_hired' => $date_hired));

            if ($query->rowCount() == 1) {

                Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_SUCCESSFULLY_CREATED'));
                return true;
            }

            // Default return
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;

        }

        public static function registerNewUser(){

            //  Clean the input
            $user_name = strip_tags(Request::post('user_name'));
            $user_email = strip_tags(Request::post('user_email'));
            $user_email_repeat = strip_tags(Request::post('user_email_repeat'));
            $user_password_new = Request::post('user_password_new');
            $user_password_repeat = Request::post('user_password_repeat');

            //  Stop registration flow if registrationInputValidation() returns false (= anything breaks the input check rules)
            $validation_result = self::registrationInputValidation($user_name, $user_password_new, $user_email);
            if (!$validation_result) {
                return false;
            }

            //  Crypt the password with the PHP 5.5's password_hash() function, results in a 60 character hash string.
            //  @see php.net/manual/en/function.password-hash.php for more, especially for potential options
            $user_password_hash = password_hash($user_password_new, PASSWORD_DEFAULT);

            //  Make return a bool variable, so both errors can come up at once if needed
            $return = true;

            //  Check if username already exists
            if (UserModel::doesUsernameAlreadyExist($user_name)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_ALREADY_TAKEN'));
                $return = false;
            }

            //  Check if email already exists
            if (UserModel::doesEmailAlreadyExist($user_email)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_USER_EMAIL_ALREADY_TAKEN'));
                $return = false;
            }

            //  If Username or Email were false, return false
            if (!$return) return false;

            //  Generate random hash for email verification (40 char string)
            $user_activation_hash = sha1(uniqid(mt_rand(), true));

            //  Write user data to database
            if (!self::writeNewUserToDatabase($user_name, $user_password_hash, $user_email, time(), $user_activation_hash)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_ACCOUNT_CREATION_FAILED'));
                return false; // no reason not to return false here
            }

            //  Get user_id of the user that has been created, to keep things clean we DON'T use lastInsertId() here
            $user_id = UserModel::getUserIdByUsername($user_name);

            if (!$user_id) {
                Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
                return false;
            }

            //  Send verification email
            if (self::sendVerificationEmail($user_id, $user_email, $user_activation_hash)) {
                Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_SUCCESSFULLY_CREATED'));
                return true;
            }

            //  If verification email sending failed: instantly delete the user
            self::rollbackRegistrationByUserId($user_id);
            Session::add('feedback_negative', Text::get('FEEDBACK_NEW_USER_VERIFICATION_MAIL_SENDING_FAILED'));
            return false;
        }

        /**
        *   Validates the registration input
        *
        *   @param $captcha
        *   @param $user_name
        *   @param $user_password_new
        *   @param $user_password_repeat
        *   @param $user_email
        *   @param $user_email_repeat
        *
        *   @return bool
        */

        public static function registrationInputValidation($user_name, $user_password_new, $user_email){

            $return = true;

            //  If username, email and password are all correctly validated, but make sure they all run on first sumbit
            if (self::validateUserName($user_name) AND self::validateUserEmail($user_email) AND self::validateUserPassword($user_password_new) AND $return) {
                return true;
            }

            //  Otherwise, return false
            return false;
        }

        /**
        *   Validates the username
        *
        *   @param $user_name
        *   @return bool
        */
        public static function validateUserName($user_name){

            if (empty($user_name)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_FIELD_EMPTY'));
                return false;
            }

            // If username is too short (2), too long (64) or does not fit the pattern (aZ09)
            if (!preg_match('/^[a-zA-Z0-9]{2,64}$/', $user_name)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
                return false;
            }

            return true;
        }

        /**
        *   Validates the email
        *
        *   @param $user_email
        *   @param $user_email_repeat
        *   @return bool
        */

        public static function validateUserEmail($user_email){

            if (empty($user_email)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_FIELD_EMPTY'));
                return false;
            }

            //  Validate the email with PHP's internal filter
            //  Side-fact: Max length seems to be 254 chars
            //  @see http://stackoverflow.com/questions/386294/what-is-the-maximum-length-of-a-valid-email-address
            if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN'));
                return false;
            }

            return true;
        }

        /**
        *   Validates the password
        *
        *   @param $user_password_new
        *   @param $user_password_repeat
        *   @return bool
        */

        public static function validateUserPassword($user_password_new){

            if (empty($user_password_new)) {
                Session::add('feedback_negative', Text::get('FEEDBACK_PASSWORD_FIELD_EMPTY'));
                return false;
            }

            if (strlen($user_password_new) < 6) {
                Session::add('feedback_negative', Text::get('FEEDBACK_PASSWORD_TOO_SHORT'));
                return false;
            }

            return true;
        }

        /**
        *   Writes the new user's data to the database
        *
        *   @param $user_name
        *   @param $user_password_hash
        *   @param $user_email
        *   @param $user_creation_timestamp
        *   @param $user_activation_hash
        *
        *   @return bool
        */

        public static function writeNewUserToDatabase($user_name, $user_password_hash, $user_email, $user_creation_timestamp, $user_activation_hash){

            $database = DatabaseFactory::getFactory()->getConnection();

            //  Write new users data into database
            $sql = "INSERT INTO users (user_name, user_password_hash, user_email, user_creation_timestamp, user_activation_hash, user_provider_type)
                        VALUES (:user_name, :user_password_hash, :user_email, :user_creation_timestamp, :user_activation_hash, :user_provider_type)";
            $query = $database->prepare($sql);
            $query->execute(array(':user_name' => $user_name,
                                ':user_password_hash' => $user_password_hash,
                                ':user_email' => $user_email,
                                ':user_creation_timestamp' => $user_creation_timestamp,
                                ':user_activation_hash' => $user_activation_hash,
                                ':user_provider_type' => 'DEFAULT'));
            $count =  $query->rowCount();
            if ($count == 1) {
                return true;
            }

            return false;
        }

        /**
        *   Deletes the user from users table. Currently used to rollback a registration when verification mail sending
        *   was not successful.
        *
        *   @param $user_id
        */
        
        public static function rollbackRegistrationByUserId($user_id){

            $database = DatabaseFactory::getFactory()->getConnection();

            $query = $database->prepare("DELETE FROM users WHERE user_id = :user_id");
            $query->execute(array(':user_id' => $user_id));
        }

        /**
        *   Sends the verification email (to confirm the account).
        *   The construction of the mail $body looks weird at first, but it's really just a simple string.
        *
        *   @param int $user_id user's id
        *   @param string $user_email user's email
        *   @param string $user_activation_hash user's mail verification hash string
        *
        *   @return boolean gives back true if mail has been sent, gives back false if no mail could been sent
        */

        public static function sendVerificationEmail($user_id, $user_email, $user_activation_hash){

            //  Include the user's password in the email
            $body = Config::get('EMAIL_VERIFICATION_CONTENT') . '<a href="' . Config::get('URL') . Config::get('EMAIL_VERIFICATION_URL')
                    . '/' . urlencode($user_id) . '/' . urlencode($user_activation_hash).'">Activate</a>';

            $mail = new Mail;
            $mail_sent = $mail->sendMail($user_email, Config::get('EMAIL_VERIFICATION_FROM_EMAIL'),
                Config::get('EMAIL_VERIFICATION_FROM_NAME'), Config::get('EMAIL_VERIFICATION_SUBJECT'), $body
            );

            if ($mail_sent) {
                Session::add('feedback_positive', Text::get('FEEDBACK_VERIFICATION_MAIL_SENDING_SUCCESSFUL'));
                return true;
            } else {
                Session::add('feedback_negative', Text::get('FEEDBACK_VERIFICATION_MAIL_SENDING_ERROR') . $mail->getError() );
                return false;
            }
        }

        /**
        *   Checks the email/verification code combination and set the user's activation status to true in the database
        *
        *   @param int $user_id user id
        *   @param string $user_activation_verification_code verification token
        *
        *   @return bool success status
        */

        public static function verifyNewUser($user_id, $user_activation_verification_code){
            
            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "UPDATE users SET user_active = 1, user_activation_hash = NULL
                    WHERE user_id = :user_id AND user_activation_hash = :user_activation_hash LIMIT 1";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => $user_id, ':user_activation_hash' => $user_activation_verification_code));

            if ($query->rowCount() == 1) {
                Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_ACTIVATION_SUCCESSFUL'));
                return true;
            }

            Session::add('feedback_negative', Text::get('FEEDBACK_ACCOUNT_ACTIVATION_FAILED'));
            return false;
        }
        
    }
