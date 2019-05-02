<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class  trainer extends CI_Controller {

    public function _construct()
    {
        parent::_construct();
    }
    public function index($id = 0)
    {
        

        $data['id'] = $id;

        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->view('TrainerDetail',$data);
        $this->load->view('Footer');
        

    }
    public function insert_user(){
        // array สามารถเขียนได้ 2 แบบ แบบ array() หรือ []
        // โดยข้างหน้าคือ key ข้างหลังคือ value
        // ในที่นี้เราจะ insert ข้อมูลลงไป ดังนั้น key = ชื่อ column(field)
        // UserID เป็น AI (AUTO_INCREMENT) อยู่แล้ว ดังนั้นเราไม่ต้องใส่ เวลามีข้อมูลใหม่ๆมันจะเพิ่มให้เอง
        // คั่นด้วย คอมม่า 
        $this->db->where('E-mail', $this->session->userdata('E-mail'));        
        $check = $this->db->get('users', 1);
        if($check->num_rows() > 0)
        {
            echo json_encode(['status' => 0, 'msg' => 'มี Email ได้ลงทะเบียนเข้าอบรมแล้ว']);
            die;
        }
        // ------------------------------------------------------------------------

        $data1 = ['UserID' => $this->session->userdata('UserID'),
                 'TrainingID' => $id];

        $this->load->model('Register_Model');
        $this->Register_Model->add_participant_($data);

        echo json_encode(['status' => 1, 'msg' => "ยินดีด้วยคุณสมัครเรียบร้อยแล้วสามารถเข้าใช้งานได้เลย"]);
            die;
        
        //redirect('http://localhost/SystemOfUniver/index.php/LoginController','refresh');
        
    }

    public function serach_user(){

        
        $data =  $this->input->post('mailtxt');


        $this->load->model('Register_Model');
        $this->Register_Model->check_user($data);
    }


}

/* End of file Trainer.php */
