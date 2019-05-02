<?php
class EvaluationModel extends CI_Model
{

    private $table = 'evaluation';

    public function _construct()
    {
        $this->load->database();
    }

    public function get_items()
    {
        $this->db->select("evaluation.EvaluationID,evaluation.EvaluationName,evaluation.Year,evaluation.StartDate,evaluation.FinalDate,training.TrainingName");
      $this->db->from('evaluation,training');
      $this->db->where('training.TrainingID = evaluation.TrainingID');
      $query = $this->db->get();

    if($query->num_rows() > 0)
    {
        return $query->result();
    }else
        {
        return false;
        }
  
    }
    public function get_item_by_id($EvaluationID)
    {
        return $this->db->get_where($this->table, ['EvaluationID' => $EvaluationID])->row();
        
    }
    public function create_item($value){
        $this->db->insert($this->table, $value);
    }

    public function delete_item($id){
        $this -> db -> where('EvaluationID', $id);
        $this -> db -> delete('evaluation');
      }
      public function updated_item($EvaluationID, $value)
    {
     
        $sql = "UPDATE evaluation SET EvaluationName='".$_POST['EvaluationName']."', Year ='".$_POST['Year']."',StartDate='".$_POST['StartDate']."'
        ,FinalDate='".$_POST['FinalDate']."',TrainingID='".$_POST['training']."' WHERE EvaluationID=$EvaluationID";
        $this->db->query($sql);
    }

    public function insertevaluation()
    {
        $this->db->query("insert into evaluation (EvaluationName,Year,StartDate,FinalDate,TrainingID) 
        VALUES ('".$_POST['EvaluationName']."','".$_POST['Year']."','".$_POST['StartDate']."','".$_POST['FinalDate']."','".$_POST['training']."')");
    }

    public function gettraining()
    {
        return $this->db->query("select * from training");
    }
}

?>
