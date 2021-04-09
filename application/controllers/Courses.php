<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller{
    public function index(){
        $this->load->model("Course");
        $courses = array("form_data" => $this->Course->get_all_data());
        $this->load->view("index", $courses);
    }

    public function add(){		
		$this->form_validation->set_rules("name", "name", "required|min_length[3]");
		$this->form_validation->set_rules("description", "Description", "");

		if($this->form_validation->run() == FALSE){
			$errors = array(
				"error_name" => form_error("name")
			);

			$this->session->set_userdata($errors);
            $this->session->set_userdata("description", set_value("description"));
			redirect("/");
		}
		else{
			$this->session->unset_userdata("error_name");

			$form_data = array(
				"name" => $this->input->post("name"),
				"description" => $this->input->post("description")
			);

			$this->load->model("Course");
            $add_course = $this->Course->add_data($form_data);
            if($add_course){
                redirect("/");
            }
		}
	}

	public function destroy($id){
		$this->load->model("Course");
		$get_data = array("get_data" => $this->Course->get_data_by_id($id));
		$this->load->view("destroy", $get_data);
	}

    public function delete($id){
        $this->load->model("Course");
		$this->Course->delete_data($id);
		redirect("/");
    }
}