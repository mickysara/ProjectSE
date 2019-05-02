<?php
    class EditUser_Model extends CI_Model
    {

        private $table = 'users';

        public function _construct()
        {
            $this->load->database();
        }

        public function get_item_by_id($UserID)
        {
            return $this->db->get_where($this->table, ['UserID' => $UserID])->row();
            
        }

        public function get_items()
        {
        //$this->db->order_by('updated','desc'); 
        //$query = $this->db->get($this->table1);   
        // $query = $this->db->get($this->table);
        //return  $query->result();
        $this->db->select("users.UserID,users.Email,users.Password,users.IdentityNumber,users.FirstName,users.LastName
        ,users.Address,users.Telephone,users.Expertise,department.DepartmentName,usertype.TypeName");
        $this->db->from('users,usertype,department');
        $this->db->where('usertype.TypeID = users.TypeID');
        $this->db->where('department.DepartmentID = users.DepartmentID');
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }

        }
        public function delete_item($id){
            $this -> db -> where('UserID', $id);
            $this -> db -> delete('users');
        }
        
        public function updated_item($UserID, $value)
        {
          
           $sql = "UPDATE users SET Email='".$_POST['Email']."', Password='".$_POST['Password']."' , IdentityNumber='".$_POST['IdentityNumber']."', FirstName='".$_POST['FirstName']."'
           , LastName='".$_POST['LastName']."', Address='".$_POST['Address']."', Telephone='".$_POST['Telephone']."', Expertise='".$_POST['Expertise']."' 
           , DepartmentID='".$_POST['department']."', TypeID='".$_POST['usertype']."' WHERE UserID=$UserID";
            $this->db->query($sql);

            // $this->db->query("update users (Email,Password,IdentityNumber,FirstName,LastName,Address,Telephone,Expertise,DepartmentID,TypeID) 
            // SET ('".$_POST['Email']."','".$_POST['Password']."','".$_POST['IdentityNumber']."','".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['Address']."'
            // ,'".$_POST['Telephone']."','".$_POST['Expertise']."',".$_POST['department'].",".$_POST['usertype'].") WHERE UserID = ".$_POST['UserID']." ");
            
        }  
        public function insertUser()
        {
            $this->db->query("insert into users (Email,Password,IdentityNumber,FirstName,LastName,Address,Telephone,Expertise,DepartmentID,TypeID) 
            VALUES ('".$_POST['Email']."','".$_POST['Password']."','".$_POST['IdentityNumber']."','".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['Address']."'
            ,'".$_POST['Telephone']."','".$_POST['Expertise']."',".$_POST['department'].",".$_POST['usertype'].")");
        }

        public function getpartment()
        {
            return $this->db->query("select * from department");
        }

        public function getusertype()
        {
            return $this->db->query("select * from usertype");
        }
    }
?>
