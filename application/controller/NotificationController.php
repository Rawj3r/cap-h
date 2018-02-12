<?php

    /**
    *   This controller shows an area that's only visible for logged in users (because of Auth::checkAuthentication(); in line 16)
    */
    class NotificationController extends Controller{

        /**
        *   Construct this object by extending the basic Controller class
        */

        public function __construct(){

            parent::__construct();

            //  This entire controller should only be visible/usable by logged in users, so we put authentication-check here
            Auth::checkAuthentication();
        }

        /**
        *   This method controls what happens when you move to /dashboard/index in your app.
        */
        public function index(){

            $this->View->render('notification/index', array(
                'leave_request' => LeaveModel::userLeaveInformation()
            ));
        }

        public function decline($request_id){

            LeaveModel::decline($request_id);
            Redirect::to('notification/declined');
        }

        public function approve($request_id){

            LeaveModel::approve($request_id);
            Redirect::to('notification/approved');
        }

        public function declined(){

            $this->View->render('notification/declined', array(
                'leave_information' => LeaveModel::allDeclined()));
        }

        public function approved(){
            
            $this->View->render('notification/approved', array(
                'leave_information' => LeaveModel::allApproved()));
        }
    }
