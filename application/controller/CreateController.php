<?php

    /**
    *   RegisterController
    *   Register new user
    */

    class CreateController extends Controller{

        /**
        *   Construct this object by extending the basic Controller class. The parent::__construct thing is necessary to
        *   put checkAuthentication in here to make an entire controller only usable for logged-in users (for sure not
        *   needed in the RegisterController).
        */

        public function __construct(){

            parent::__construct();

            Auth::checkAuthentication();
        }

        /**
        *   Register page
        *   Show the register form, but redirect to main-page if user is already logged-in
        */

        public function index(){

            $this->View->render('create/index');
        }

        /**
        *   Register page
        *   Show the register form, but redirect to main-page if user is already logged-in
        */
        public function new(){

            $this->View->render('create/new');
        }

        /**
        *   Register page action
        *   POST-request after form submit
        */

        public function register_action(){

            $create_success = CreateModel::registerPerson(Request::post('first_name'), Request::post('second_name'), Request::post('date_of_birth'), Request::post('gender'), Request::post('race'), Request::post('sa_passport'), Request::post('phone'), Request::post('address'), Request::post('city'), Request::post('province'), Request::post('person_number'), Request::post('tax_number'), Request::post('role'), Request::post('date_hired'));

            if($create_success){

                /*$registration_successful = CreateModel::registerNewUser();

                if ($registration_successful) {
                    Redirect::to('login/index');
                } else {
                    Redirect::to('create/index');
                } */

                $this->View->render('user/index');
            }else{
                Redirect::to('user/');
            }
            
        }

        /**
        *   Verify user after activation mail link opened
        *   @param int $user_id user's id
        *   @param string $user_activation_verification_code user's verification token
        */

        public function verify($user_id, $user_activation_verification_code){
            
            if (isset($user_id) && isset($user_activation_verification_code)) {
                RegistrationModel::verifyNewUser($user_id, $user_activation_verification_code);
                $this->View->render('create/verify');
            } else {
                Redirect::to('login/index');
            }
        }
    }
