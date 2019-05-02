<?php  
 class User_model extends CI_Model  
 {  
     
     public function __construct()
     {
         parent::__construct();


         
         
         if($this->session->has_userdata('UserID'))
         {
            $this->db->where('UserID', $this->session->userdata('UserID'));         
            $user = $this->db->get('users', 1);
            if($user->num_rows() > 0)
            {
                $u = $user->row_array();
                
                $this->session->set_userdata( $u );
                
            }
            else{
                
                $this->session->sess_destroy();
                
                redirect('','refresh');
                
            }
            }
         
     }
         

 }  