<?php
class RegisterController extends CI_Controller
{

    public function _construct()
    {
        parent::_construct();
       
    }
    public function index()
    {
 
        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->view('Register');
        $this->load->view('Footer');
        //$this->load->model('Register_Model');
        //$this->Register_Model->province($return);
    }

    public function get_province_list()
    {
        $list = array();

        //$geo_id = $this->input->post('geo_id', TRUE);
        //if($geo_id !=''){
        $list = $this->Register_Model->get_province_list();
        //}
        $data['province_list'] = $list;

        $this->parser->parse_repeat('address/address_list/province_option_list_view', $data);
    }

    public function insert_user(){
        // array สามารถเขียนได้ 2 แบบ แบบ array() หรือ []
        // โดยข้างหน้าคือ key ข้างหลังคือ value
        // ในที่นี้เราจะ insert ข้อมูลลงไป ดังนั้น key = ชื่อ column(field)
        // UserID เป็น AI (AUTO_INCREMENT) อยู่แล้ว ดังนั้นเราไม่ต้องใส่ เวลามีข้อมูลใหม่ๆมันจะเพิ่มให้เอง
        // คั่นด้วย คอมม่า 

        $this->db->where('Email', $this->input->post('mailtxt'));        
        $check = $this->db->get('users', 1);
        if($check->num_rows() > 0)
        {
            echo json_encode(['status' => 0, 'msg' => 'มี Email นี้ในระบบแล้วครับ']);
            die;
        }
        // ------------------------------------------------------------------------

        $data = ['Email' => $this->input->post('mailtxt'),
                 'Password' => $this->input->post('password'),
                 'IdentityNumber' => $this->input->post('CardId'),
                 'FirstName' => $this->input->post('FirstName'),
                 'LastName' => $this->input->post('LastName'),
                 'Address' => $this->input->post('Subdistrict'),
                 'Telephone' => $this->input->post('tel'),
                 'TypeID' => ('1'),
                 'DepartmentID' => $this->input->post('department'),
                 'Expertise' => $this->input->post('Expertise'),];

        $this->load->model('Register_Model');
        $this->Register_Model->add_register_($data);

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