<?php
class LoginController extends CI_Controller
{

    public function _construct()
    {
        parent::_construct();
    }
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->view('Login');
        $this->load->view('Footer');
    }

    public function login()
    {

        
        $mailtxt =  $this->input->post('mailtxt');
        $password = $this->input->post('password');

        /*$this->load->model('User_model');
        $result = $this->User_model->Test(
            $this->input->post('mailtxt'),
            $this->input->post('password')
        );*/
        //print_r ($result);

        $this->db->where('Email', $mailtxt);
        $this->db->where('Password', $password);        
        $user = $this->db->get('users', 1);
        
        
        if($user->num_rows() > 0)
        {
            $r = $user->row_array();

            $sess = ['UserID' => $r['UserID']];
            
            $this->session->set_userdata( $sess );

            /*echo '<br>';
            print_r($_SESSION);*/
            //$test = json_decode([$sess]);
            echo json_encode(['status' => 1, 'msg' => '555']);
            /*echo $test->UserID;
            console.log($test->UserID);
            redirect('/IndexController','refresh');*/
            
        }
        else{
            echo json_encode(['status' => 0, 'msg' => 'no']);
        }
        exit;
    }
    public function Logout()
    {
        
        session_destroy();
        
        redirect('/LoginController','refresh');
        
        
    }
}