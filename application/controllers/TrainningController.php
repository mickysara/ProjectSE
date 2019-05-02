<?php
class TrainningController extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
    }
    public function index($TrainingID = null)
    {
       
        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->model('TrainningModel');
        $this->save_item();
        $this->load->view('TrainningView',[
            'items' => $this->TrainningModel->get_items(),
			'item' => $this->TrainningModel->get_item_by_id($TrainingID)
        ]);
        $this->load->view('Footer');
    }
    private function save_item()
    {
    $input = $this->input->post();
    if(!empty($input)){
        if(empty($input['TrainingID']))
        {
            $this->TrainningModel->create_item($input);
        }
        else
        {
            $this->TrainningModel->updated_item($input['TrainingID'], $input);
        }
       

        redirect(base_url('index.php/TrainningController/index'));
    }

    }

    public function delete_row($TrainingID) {   
        $this->load->model("TrainningModel");
        $this->TrainningModel->delete_item($TrainingID);
        redirect(base_url('index.php/TrainningController'));
    
        }

}

?>