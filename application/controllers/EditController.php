<?php
class EditController extends CI_Controller
{
    
    public function __construct(){
        parent::__construct(); 
        $this->load->model('EditUser_Model');
        
    }
    public function index($UserID = null)
    {
       
        $this->load->helper('url');
        $this->load->view('Header');
        $this->save_item();
        $this->load->view('Edit_Usertype',[
            'items' => $this->EditUser_Model->get_items(),
            'item' => $this->EditUser_Model->get_item_by_id($UserID),
            'department' => $this->EditUser_Model->getpartment(),
            'usertype' => $this->EditUser_Model->getusertype()
        ]);
        $this->load->view('Footer');

    }
        public function save_item(){
        $input = $this->input->post();
        if(!empty($input)){
            if(empty($input['UserID']))
            {
                $this->EditUser_Model->insertUser($input);
            }
            else
            {
                $this->EditUser_Model->updated_item($input['UserID'], $input);
            }
            redirect(base_url('index.php/EditController/index'));
                }
        }

        public function delete_row($UserID) {   
        $this->load->model("EditUser_Model");
        $this->EditUser_Model->delete_item($UserID);
        redirect(base_url('index.php/EditController'));
        }

    public function insertUser(){
        $this->EditUser_Model->insertUser();
        Redirect('http://localhost/SystemOfUniver/index.php/EditController');
        
     }
   
        
}

?>