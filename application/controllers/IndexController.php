<?php
class IndexController extends CI_Controller
{

    public function _construct()
    {
        parent::_construct();
    }
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->view('Index');
        $this->load->view('Footer');
    }

}