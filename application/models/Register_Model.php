<?php  
 class Register_Model extends CI_Model  
 {  
     public function province_list ()
     {
        $this->set_table_name('tb_addr_province');
        $this->set_select_field("PROVINCE_ID, PROVINCE_NAME");
        return $this->list_record();
     }
     public function province ($return){
        $this->db->select('PROVINCE_ID','PROVINCE_NAME');
        $this->db->from('tb_addr_province');
        $result = $this->db->get();
        $return = array();

        if($result->num_rows() > 0)
        {
            foreach($result->result_array() as $row)
             {
                $return[$row['PROVINCE_ID']] = $row['PROVINCE_NAME'];
            }
        }
        
        return $return;
        
     }

     public function add_register_($data=[]){

        //print_r($data);exit;


         $this->db->insert('users', $data);
         
     }
     public function check_user($data){

        $this->db->where('Email', $data);
        $user = $this->db->get('users', 1);
        if($user->num_rows() > 0)
        {
            $r = $user->row_array();

            $sess = ['UserID' => $r['UserID']];
            
            $this->session->set_userdata( $sess );

            /*echo '<br>';
            print_r($_SESSION);*/
            //$test = json_decode([$sess]);
            echo json_encode(['status' => 0, 'msg' => 'no']);
            /*echo $test->UserID;
            console.log($test->UserID);
            redirect('/IndexController','refresh');*/
            
        }
        else{
            echo json_encode(['status' => 1, 'msg' => 'yes']);
        }
        exit;
        
     }
     public function add_participant_($data=[]){

        //print_r($data);exit;

        
         $this->db->insert('participant', $data);
         
     }
 }  