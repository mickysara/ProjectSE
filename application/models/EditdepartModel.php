<?php
class EditdepartModel extends CI_Model
{

    private $table = 'department';

    public function _construct()
    {
        $this->load->database();
    }

        public function get_items()
        {
            return $this->db->get($this->table)->result();
    
        }
    public function get_item_by_id($DepartmentID)
    {
        return $this->db->get_where($this->table, ['DepartmentID' => $DepartmentID])->row();
        
    }
    public function create_item($value){
        $this->db->insert($this->table, $value);
    }

    public function delete_item($id){
        $this -> db -> where('DepartmentID', $id);
        $this -> db -> delete('department');
      }
      public function updated_item($DepartmentID, $value)
    {
     
        $this->db->update($this->table, $value, ['DepartmentID' => $DepartmentID]);
    }
}

?>
