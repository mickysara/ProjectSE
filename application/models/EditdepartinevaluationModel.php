<?php
class EditdepartinevaluationModel extends CI_Model
{

    private $table = 'departinevaluation';

    public function _construct()
    {
        $this->load->database();
    }

    public function get_items()
    {
      $this->db->select("departinevaluation.ID_DE,department.DepartmentName,evaluation.EvaluationName");
      $this->db->from('departinevaluation,evaluation,department');
      $this->db->where('department.DepartmentID = departinevaluation.DepartmentID');
      $this->db->where('evaluation.EvaluationID = departinevaluation.EvaluationID');
      $query = $this->db->get();

    if($query->num_rows() > 0)
    {
        return $query->result();
    }else
        {
        return false;
        }
  
    }
    public function get_item_by_id($ID_DE)
    {
        return $this->db->get_where($this->table, ['ID_DE' => $ID_DE])->row();
        
    }
    public function create_item($value){
        $this->db->insert($this->table, $value);
    }

    public function delete_item($id){
        $this -> db -> where('ID_DE', $id);
        $this -> db -> delete('departinevaluation');
      }
      public function updated_item($ID_DE, $value)
    {
        $sql = "UPDATE departinevaluation SET DepartmentID='".$_POST['department']."', EvaluationID='".$_POST['evaluation']."' WHERE ID_DE=$ID_DE";
        $this->db->query($sql);
        // $this->db->query("update evaluationform SET ")
    }
    public function getdepartment()
    {
        return $this->db->query("select * from department");
    }
    public function getevaluation()
    {
        return $this->db->query("select * from evaluation");
    }

    public function insertdepartinevaluation()
        {
            $this->db->query("insert into departinevaluation (DepartmentID,EvaluationID) 
            VALUES ('".$_POST['department']."','".$_POST['evaluation']."')");
        }
}

?>
