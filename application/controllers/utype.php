<?php
class utype extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
    }
    public function index($TypeID = null)
    {
       
        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->model('EditType');
        $this->save_item();
        $this->load->view('Editusertype',[
            'items' => $this->EditType->get_items(),
			'item' => $this->EditType->get_item_by_id($TypeID)
        ]);
        $this->load->view('Footer');
    }
    private function save_item()
    {
    $input = $this->input->post();
    if(!empty($input)){
        if(empty($input['TypeID']))
        {
            $this->EditType->create_item($input);
        }
        else
        {
            $this->EditType->updated_item($input['TypeID'], $input);
        }
       

        redirect(base_url('index.php/utype/index'));
    }

    }

    public function delete_row($TypeID) {   
        $this->load->model("EditType");
        $this->EditType->delete_item($TypeID);
        redirect(base_url('index.php/utype'));
    
        }

}

?>