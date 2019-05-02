<body>
<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <table class = table id="Result" class="display" >
            <thead>
                    <tr class="no-border">
                                <th>ชื่อหน่วยงาน</th>
                                <th>คะแนนโดยเฉลี่ย</th>
                    </tr>
            </thead>
                    <tbody>
                        <?php           $this->db->distinct();
                                        $this->db->select('department.DepartmentName , department.DepartmentID');   
                                        $this->db->where('assessment.DepartmentID = department.DepartmentID');
                                        $this->db->where('evaluation.EvaluationID = assessment.EvaluationID');
                                        $this->db->where('assessment.EvaluationID', $id);
                                        $province = $this->db->get('department,assessment,evaluation');  
                                        $count = 1;                                      
                                        foreach($province->result_array() as $d)
                                        {
                                            $sql = $this->db->query("SELECT AVG(total) FROM department,assessment,evaluation WHERE evaluation.EvaluationID = assessment.EvaluationID AND department.DepartmentID = assessment.DepartmentID AND assessment.EvaluationID = '".$id."'  AND department.DepartmentID = '".$d['DepartmentID']."'");
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
                        ?>
                    </tbody>
            </table>
     
            </div>
            </div>
            
</div>
