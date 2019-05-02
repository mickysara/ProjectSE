<?php
class EvaluationformModel extends CI_Model
{

    private $table = 'evaluationform';

    public function _construct()
    {
        $this->load->database();
    }

    public function get_items()
    {
      $this->db->select("evaluationform.EvaluationFormID,evaluationform.EvaluationformName,evaluation.EvaluationName");
      $this->db->from('evaluationform,evaluation');
      $this->db->where('evaluation.EvaluationID = evaluationform.EvaluationID');
      $query = $this->db->get();

    if($query->num_rows() > 0)
    {
        return $query->result();
    }else
        {
        return false;
        }
  
    }
    public function get_item_by_id($EvaluationFormID)
    {
        return $this->db->get_where($this->table, ['EvaluationFormID' => $EvaluationFormID])->row();
        
    }
    public function create_item($value){
        $this->db->insert($this->table, $value);
    }

    public function delete_item($id){
        $this -> db -> where('EvaluationFormID', $id);
        $this -> db -> delete('evaluationform');
      }
      public function updated_item($EvaluationformID, $value)
    {
        $sql = "UPDATE evaluationform SET EvaluationformName='".$_POST['EvaluationformName']."', EvaluationID='".$_POST['evaluation']."' WHERE EvaluationformID=$EvaluationformID";
        $this->db->query($sql);
        // $this->db->query("update evaluationform SET ")
    }
    public function getevaluation()
    {
        return $this->db->query("select * from evaluation");
    }

    public function insertevaluation()
        {
            $this->db->query("insert into evaluationform (EvaluationformName,EvaluationID) 
            VALUES ('".$_POST['EvaluationformName']."','".$_POST['evaluation']."')");
        }
}

?>
