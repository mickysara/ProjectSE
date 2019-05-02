<?php
class EditdepartinevaluationController extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('EditdepartinevaluationModel');
    }
    public function index($ID_DE = null)
    {
       
        $this->load->helper('url');
        $this->load->view('Header');
        $this->save_item();
        $this->load->view('EditdepartinevaluationView',[
            'items' => $this->EditdepartinevaluationModel->get_items(),
            'item' => $this->EditdepartinevaluationModel->get_item_by_id($ID_DE),
            'department' => $this->EditdepartinevaluationModel->getdepartment(),
            'evaluation' => $this->EditdepartinevaluationModel->getevaluation()
        ]);
        $this->load->view('Footer');
    }
    private function save_item()
    {
    $input = $this->input->post();
    if(!empty($input)){
        if(empty($input['ID_DE']))
        {
            $this->EditdepartinevaluationModel->insertdepartinevaluation($input);
        }
        else
        {
            $this->EditdepartinevaluationModel->updated_item($input['ID_DE'], $input);
        }
       

        redirect(base_url('index.php/EditdepartinevaluationController/index'));
    }

    }

    public function delete_row($ID_DE) {   
        $this->load->model("EditdepartinevaluationModel");
        $this->EditdepartinevaluationModel->delete_item($ID_DE);
        redirect(base_url('index.php/EditdepartinevaluationController'));
    
        }
        public function insertdepartinevaluation(){
            $this->EditdepartinevaluationModel->insertdepartinevaluation();
            Redirect('http://localhost/SystemOfUniver/index.php/EditdepartinevaluationController');
            
         }
}

?>