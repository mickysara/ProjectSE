<?php
class EvaluationFormController extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('EvaluationformModel');
    }
    public function index($EvaluationFormID = null)
    {
       
        $this->load->helper('url');
        $this->load->view('Header');
        $this->save_item();
        $this->load->view('EvaluationformView',[
            'items' => $this->EvaluationformModel->get_items(),
            'item' => $this->EvaluationformModel->get_item_by_id($EvaluationFormID),
            'evaluation' => $this->EvaluationformModel->getevaluation()
        ]);
        $this->load->view('Footer');
    }
    private function save_item()
    {
    $input = $this->input->post();
    if(!empty($input)){
        if(empty($input['EvaluationFormID']))
        {
            $this->EvaluationformModel->insertevaluation($input);
        }
        else
        {
            $this->EvaluationformModel->updated_item($input['EvaluationFormID'], $input);
        }
       

        redirect(base_url('index.php/EvaluationFormController/index'));
    }

    }

    public function delete_row($EvaluationFormID) {   
        $this->load->model("EvaluationformModel");
        $this->EvaluationformModel->delete_item($EvaluationFormID);
        redirect(base_url('index.php/EvaluationFormController'));
    
        }
        public function insertevaluation(){
            $this->EvaluationformModel->insertevaluation();
            Redirect('http://localhost/SystemOfUniver/index.php/EvaluationFormController');
            
         }
}

?>