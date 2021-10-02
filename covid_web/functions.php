<?php
require_once('config/connection.php');
date_default_timezone_set("Asia/Jakarta"); 
session_start();  
    class functions {  

        private $db;
            
        function __construct() {  
              
            // connecting to database  
            $this->db = new connection();
               
        }

        public function getStatistic()
        {
            $rows = mysqli_query($this->db->conn ,"SELECT * FROM users");
            
            return $rows;
        }

        public function countStatistic()
        {
            $result = mysqli_query($this->db->conn , "SELECT(
                SELECT COUNT(*)) AS total_covid, 
                (SELECT COUNT(*) FROM users WHERE is_recover=1) AS total_sembuh,
                (SELECT COUNT(*) FROM users WHERE inpatient=1) AS total_rawat
                FROM users");

            $data = mysqli_fetch_assoc($result);
            
            return $data;
        }

        public function addEditPatient($data)
        {
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $name = $data['name'];
            $gender = $data['gender'];
            $birth = $data['birth'];
            $address = $data['address'];
            $isRecover = $data['is_recover'];
            $inpatient = $data['inpatient'];
            $indication = $data['indication'];

            if (isset($_GET['id'])) {
                $query = "UPDATE users SET
                    name = '$name',
                    gender = '$gender',
                    address = '$address',
                    birth = '$birth',
                    is_recover = '$isRecover',
                    inpatient = '$inpatient',
                    indication = '$indication'
                    WHERE id='$id'
                        ";
            } else {
                $query = "INSERT INTO users(name, gender, birth, address, is_recover, inpatient, indication)
                    VALUES('$name','$gender','$birth', '$address', '$isRecover', '$inpatient', '$indication')";
            }

            $data = mysqli_query($this->db->conn, $query) or die(mysqli_error($this->db->conn));

            return $data;

        }

        public function detailPatient($id)
        {
            $data = mysqli_query($this->db->conn, "SELECT * FROM users WHERE id='$id'");

            return $data;
        }

        public function deletePatient($id)
        {
            $data = mysqli_query($this->db->conn, "DELETE FROM users WHERE id='$id'");

            return $data;
        }
    }

?>