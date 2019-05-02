<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kidmaiook extends CI_Controller {

    public function amphur($province_id)
    {
        
        $this->db->where('PROVINCE_ID', $province_id);        
        $sql = $this->db->get('tb_addr_amphur');
        foreach ($sql->result() as $d) {
        ?>
            <option value="<?=$d->AMPHUR_ID?>"><?=trim($d->AMPHUR_NAME)?></option>
        <?php
        }
        

    }
    public function tumbon($amphur_id)
    {
        $this->db->where('AMPHUR_ID', $amphur_id);
        $sql = $this->db->get('tb_addr_district');
        foreach ($sql->result() as $d){
        ?>
            <option value="<?=$d->DISTRICT_ID?>"><?=trim($d->DISTRICT_NAME)?></option>
        <?php
        }
        
    }
    public function Department($Depart_id)
    {
        $this->db->distinct();
                                        $this->db->select('department.DepartmentName , department.DepartmentID');   
                                        $this->db->where('assessment.DepartmentID = department.DepartmentID');
                                        $this->db->where('assessment.EvaluationFormID', $id);
                                        $province = $this->db->get('department,assessment');  
                                        $count = 1;                                      
                                        foreach($province->result_array() as $d)
                                        {
                                            $sql = $this->db->query("SELECT AVG(total) FROM assessment WHERE DepartmentID = '".$d['DepartmentID']."'");
                                            $r = $sql->row_array();


                                            $english_format_number = number_format($r['AVG(total)'], 2,);
                                            ?>
                                            <tr>

                                            <td value="<?=$d['DepartmentID']?>"><?=trim($d['DepartmentName'])?></td>
                                            <td value="<?=$d['DepartmentID']?>"><?=trim($english_format_number = number_format($r['AVG(total)'], 2,))?></td>
                                            <?php ++$count; ?>
                                            </tr>
                                            <?php
        }
        
    }


}