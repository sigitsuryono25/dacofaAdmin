<?php


class Privacy extends CI_Controller{
    function index(){
        $data['privacy'] = $this->db->query("SELECT * FROM tb_app_settings")->row();
        $this->load->view("static", $data);
    }
}