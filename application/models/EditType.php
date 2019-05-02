<?php
class EditType extends CI_Model
{

    private $table = 'usertype';

    public function _construct()
    {
        $this->load->database();
    }

        public function get_items()
        {
            return $this->db->get($this->table)->result();
    
        }
    public function get_item_by_id($TypeID)
    {
        return $this->db->get_where($this->table, ['TypeID' => $TypeID])->row();
        
    }
    public function create_item($value){
        $this->db->insert($this->table, $value);
    }

    public function delete_item($id){
        $this -> db -> where('TypeID', $id);
        $this -> db -> delete('usertype');
      }
      public function updated_item($TypeID, $value)
    {
     
        $this->db->update($this->table, $value, ['TypeID' => $TypeID]);
    }
}

?>
