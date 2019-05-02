<?php
class TrainningModel extends CI_Model
{

    private $table = 'training';

    public function _construct()
    {
        $this->load->database();
    }

        public function get_items()
        {
            return $this->db->get($this->table)->result();
    
        }
    public function get_item_by_id($TrainingID)
    {
        return $this->db->get_where($this->table, ['TrainingID' => $TrainingID])->row();
        
    }
    public function create_item($value){
        $this->db->insert($this->table, $value);
    }

    public function delete_item($id){
        $this -> db -> where('TrainingID', $id);
        $this -> db -> delete('training');
      }
      public function updated_item($TrainingID, $value)
    {
     
        $this->db->update($this->table, $value, ['TrainingID' => $TrainingID]);
    }
}

?>
