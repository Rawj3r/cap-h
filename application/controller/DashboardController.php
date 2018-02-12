<?php

    /**
    *   This controller shows an area that's only visible for logged in users (because of Auth::checkAuthentication(); in line 16)
    */

    class DashboardController extends Controller{

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

            $this->View->render('dashboard/index', array(
                'leave_request' => LeaveModel::allpending()
            ));
        }

        public function decline($id){

            LeaveModel::decline($id);
            Redirect::to('notification/declined');
        }

        public function approve($id){

            LeaveModel::approve($id);
            Redirect::to('notification/approved');
        }

        public function declined(){

            $this->View->render('dashboard/declined', array(
                'leave_request' => LeaveModel::allDeclined()));
        }

        public function approved(){
            
            $this->View->render('dashboard/approved', array(
                'leave_request' => LeaveModel::allApproved()));
        }
    }
