<?php
    class Course extends CI_Model{
        function add_data($course){
            $query = "INSERT INTO courses (name, description, created_at, updated_at) VALUES (?, ?, ?, ?)";
            $values = array($course["name"], $course["description"], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
            return $this->db->query($query, $values);
        }

        function get_all_data(){
            return $this->db->query("SELECT id, name, description, DATE_FORMAT(created_at, '%b %D %Y %h:%i %p') AS created_at FROM courses")->result_array();
        }

        function get_data_by_id($course_id){
            return $this->db->query("SELECT * FROM courses WHERE id=?", array($course_id))->row_array();
        }

        function delete_data($course_id){
            return $this->db->query("DELETE FROM courses WHERE id=?", $course_id);
        }
    }
?>