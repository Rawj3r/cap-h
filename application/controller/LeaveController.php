<?php


    class LeaveController extends Controller{

        /**
        *   Construct this object by extending the basic Controller class
        */
        public function __construct(){

            parent::__construct();

            //  VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
            //  need this line! Otherwise not-logged in users could do actions. If all of your pages should only
            //  be usable by logged-in users: Put this line into libs/Controller->__construct
            Auth::checkAuthentication();
        }

        public function index(){

            $this->View->render('leave/index', array(
                'leave_request' => LeaveModel::getAllLeaves()
            ));
        }

        public function create(){

            LeaveModel::createLeave(Request::post('leave_id'), Request::post('from_date'), Request::post('to_date'), Request::post('comments'));
            Redirect::to('leave');
        }

        public function edit($id){

            $this->View->render('leave/edit', array(
                'leave' => LeaveModel::getLeave($id)
            ));
        }

        public function editSave(){

            LeaveModel::updateLeave(Request::post('id'), Request::post('leave_type'));
            Redirect::to('leave');
        }

        public function delete($id){
            
            LeaveModel::deleteNote($id);
            Redirect::to('leave');
        }
    }
