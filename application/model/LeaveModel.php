<?php

    class LeaveModel{

        public static function getAllLeaves(){

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "SELECT user_id, id, leave_type, start_date, end_date, status, comments, date_created, leave_balance FROM leave_request WHERE user_id = :user_id";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => Session::get('user_id')));

            //  fetchAll() is the PDO method that gets all result rows
            return $query->fetchAll();
        }

        public static function userLeaveInformation(){

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "SELECT * FROM leave_information JOIN leave_request USING(leave_id) JOIN person_information USING(user_id) WHERE user_id = :user_id AND status = 'pending'";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => Session::get('user_id')));

            //  fetchAll() is the PDO method that gets all result rows
            return $query->fetchAll();

        }

        public static function allPending(){

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "SELECT user_id, id, leave_type, start_date, end_date, number_of_days, status, comments, date_created, leave_balance FROM leave_request WHERE status = 'Pending'";
            $query = $database->prepare($sql);
            $query->execute();

            //  fetchAll() is the PDO method that gets all result rows
            return $query->fetchAll();
        }

        public static function allApproved(){

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "SELECT * FROM leave_information JOIN leave_request USING(leave_id) JOIN person_information USING(user_id) WHERE user_id = :user_id AND status = 'approved'";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => Session::get('user_id')));

            //  fetchAll() is the PDO method that gets all result rows
            return $query->fetchAll();
        }

        public static function allDeclined(){

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "SELECT * FROM leave_information JOIN leave_request USING(leave_id) JOIN person_information USING(user_id) WHERE user_id = :user_id AND status = 'declined'";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => Session::get('user_id')));

            //  fetchAll() is the PDO method that gets all result rows
            return $query->fetchAll();
        }
        
        public static function allCancelled(){

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "SELECT user_id, id, leave_type, start_date, end_date, status, comments, date_created FROM leave_request WHERE status = 'Cancelled'";
            $query = $database->prepare($sql);
            $query->execute();

            //  fetchAll() is the PDO method that gets all result rows
            return $query->fetchAll();
        }

        public static function getLeave($id){

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "SELECT user_id, id, leave_type FROM leave_request WHERE user_id = :user_id AND id = :id LIMIT 1";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => Session::get('user_id'), ':id' => $id));

            //  fetch() is the PDO method that gets a single result
            return $query->fetch();
        }
        
        public static function createLeave($leave_id, $from_date, $to_date, $comments){

            if (!$leave_id || strlen($leave_id) == 0) {
                Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
                return false;
            }

            $date1 = date_create($from_date);
            $date2 = date_create($to_date);

            $diff = date_diff($date1, $date2);

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "INSERT INTO leave_request (user_id, leave_id, from_date, to_date, comments) VALUES (:user_id, :leave_id, :from_date, :to_date, :comments)";
            $query = $database->prepare($sql);
            $query->execute(array(':user_id' => Session::get('user_id'),
                ':leave_id' => $leave_id,
                ':from_date' => $from_date,
                ':to_date' => $to_date,
                /*':number_of_days' => $diff->format("%R%a"),*/
                'comments' => $comments
                ));

            if ($query->rowCount() == 1) {
                return true;
            }

            //  Default return
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        public static function updateLeave($id, $leave_type){

            if (!$id || !$leave_type) {
                return false;
            }

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "UPDATE leave_request SET leave_type = :leave_type WHERE id = :id AND user_id = :user_id LIMIT 1";
            $query = $database->prepare($sql);
            $query->execute(array(':id' => $id, ':leave_type' => $leave_type, ':user_id' => Session::get('user_id')));

            if ($query->rowCount() == 1) {
                return true;
            }

            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
            return false;
        }

        public static function decline($request_id){

            if (!$request_id) {
                return false;
            }

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "UPDATE leave_request SET status = :status WHERE request_id = :request_id LIMIT 1";
            $query = $database->prepare($sql);
            $query->execute(array(':request_id' => $request_id, ':status' => 'declined'));

            if ($query->rowCount() == 1) {
                return true;
            }

            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
            return false;
        }

        public static function approve($request_id){

            if (!$request_id) {
                return false;
            }

            $database = DatabaseFactory::getFactory()->getConnection();

            $sql = "UPDATE leave_request SET status = :status WHERE request_id = :request_id LIMIT 1";
            $query = $database->prepare($sql);
            $query->execute(array(':request_id' => $request_id, ':status' => 'approved'));

            if ($query->rowCount() == 1) {

                //Session::add('feedback_positive', Text::get('FEEDBACK_LEAVE_APPROVAL_SUCCESSFUL'));
                return true;
                
            }

            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
            return false;
        }

    }