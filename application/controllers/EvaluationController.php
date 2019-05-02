<?php
class EvaluationController extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('EvaluationModel');
    }
    public function index($EvaluationID = null)
    {
        $this->load->helper('url');
        $this->load->view('Header');
        $this->save_item();
        $this->load->view('EvaluationView',[
            'items' => $this->EvaluationModel->get_items(),
            'item' => $this->EvaluationModel->get_item_by_id($EvaluationID),
            'training' => $this->EvaluationModel->gettraining()
        ]);
        $this->load->view('Footer');
    }
    private function save_item()
    {
    $input = $this->input->post();
    if(!empty($input)){
        if(empty($input['EvaluationID']))
        {
            $this->EvaluationModel->insertevaluation($input);
        }
        else
        {
            $this->EvaluationModel->updated_item($input['EvaluationID'], $input);
        }
       

        redirect(base_url('index.php/EvaluationController/index'));
    }

    }

    public function delete_row($EvaluationID) {   
        $this->load->model("EvaluationModel");
        $this->EvaluationModel->delete_item($EvaluationID);
        redirect(base_url('index.php/EvaluationController'));
    
        }
    public function insertevaluation(){
            $this->EvaluationModel->insertevaluation();
            Redirect('http://localhost/SystemOfUniver/index.php/EvaluationController');
            
    }
    public function insertEva()
    {   

        $result = [];
        $total = 0;
        $average = 0;

        foreach ($this->input->post() as $key => $value) {
            
            //echo $key .' '.$value.'<br>';

            if(strpos($key, 'result_') !== false)
            {
                $total += $value;
                array_push($result, $value);
            }
        }

        $count = count($result); // จำนวนข้อ
        $average = $total/$count;


        $object = ['UserID' => $this->session->userdata('UserID'),
        'result' => json_encode($result),
        'EvaluationID' => $this->input->post('evaid'),
        'EvaluationFormID' => '1',
        'count' => $count,
        'average' => $average,
        'total' => $total,
        'DepartmentID' => $this->input->post('pick'),];
        $insert = $this->db->insert('assessment', $object);
  
        redirect('http://localhost/SystemOfUniver/index.php/IndexController');
        


        /*for($i = 0 ; $i < $this->input->post('count'); $i++){
            //เรียกค่าID
            echo "value=";
            echo  $this->input->post($i);
            echo "id =";
            echo  $this->input->post('eva'.$i); 
            echo "By User=";
            echo $this->session->userdata('UserID');
            echo "<br>";   
           
            $data = ['UserID' => $this->session->userdata('UserID'),
            'result' => $this->input->post($i),
            'EvaluationFormID' => $this->input->post('eva'.$i),];

            $this->db->insert('assessment', $data);
         
        }*/


        
    }

}

?>