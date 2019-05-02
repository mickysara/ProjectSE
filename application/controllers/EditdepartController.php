<?php
class EditdepartController extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
    }
    public function index($DepartmentID = null)
    {
       
        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->model('EditdepartModel');
        $this->save_item();
        $this->load->view('EditdepartView',[
            'items' => $this->EditdepartModel->get_items(),
			'item' => $this->EditdepartModel->get_item_by_id($DepartmentID)
        ]);
        $this->load->view('Footer');
    }
    private function save_item()
    {
    $input = $this->input->post();
    if(!empty($input)){
        if(empty($input['DepartmentID']))
        {
            $this->EditdepartModel->create_item($input);
        }
        else
        {
            $this->EditdepartModel->updated_item($input['DepartmentID'], $input);
        }
       

        redirect(base_url('index.php/EditdepartController/index'));
    }

    }

    public function delete_row($DepartmentID) {   
        $this->load->model("EditdepartModel");
        $this->EditdepartModel->delete_item($DepartmentID);
        redirect(base_url('index.php/EditdepartController'));
    
        }

}

?>