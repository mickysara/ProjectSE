<body>
<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            
            <?php
                $this->db->select('*');   
                $this->db->where('TrainingID',$id);
                $province = $this->db->get('evaluation');  
                if($province->num_rows() <= 0)    
                {
                    // ควรเป็น error แล้วไม่ทำงานต่อ
                }         
                $this->db->select('*');
                $this->db->where('assessment.UserID = users.UserID'); 
                $this->db->where('assessment.UserID', $this->session->userdata('UserID'));               
                $check = $this->db->get('assessment,users', 1);
                if($check->num_rows() <= 0)
                {
                
                              foreach($province->result_array() as $d)
                                {
                                ?>
                                <form name="raidio" id="raidio" method="post" action="<?php echo base_url();?>index.php/EvaluationController/insertEva/">
                                <h3 class="display-3">หัวข้อ:<?=trim($d['EvaluationName'])?></h3> 
                                <hr>
                                
                                <h5>วันที่เริ่มต้น : <?=trim($d['StartDate'])?> </h5>
                                <h5>วันที่สิ้นสุด : <?=trim($d['FinalDate'])?> </h5>
                                <h5>ปี พ.ศ. : <?=trim($d['Year'])?> </h5>
                                <h5>กรุณาเลือกหน่วยงานที่ต้องการประเมิน </h5>
                                <select name="pick" id="pick">
                                <?php
                                        $this->db->select('department.DepartmentName,department.DepartmentID');    
                                        $this->db->where('departinevaluation.DepartmentID = department.DepartmentID');
                                        $this->db->where('departinevaluation.EvaluationID = evaluation.EvaluationID');
                                        $this->db->where('evaluation.EvaluationID', $id);                                   
                                        $province = $this->db->get('department,evaluation,departinevaluation');                                        
                                        foreach($province->result_array() as $d)
                                        {
                                            ?>
                                            <option value="<?=$d['DepartmentID']?>"><?=trim($d['DepartmentName'])?></option>
                                            <?php
                                        }
                                        
                                ?>
                                </select>
                                <hr>
                                <?php
                                        $this->db->select('evaluationform.EvaluationFormID,evaluationform.EvaluationformName, evaluation.EvaluationID');    
                                        $this->db->where('evaluationform.EvaluationID = evaluation.EvaluationID');
                                        $this->db->where('evaluation.EvaluationID', $id);                                   
                                        $province = $this->db->get('evaluation,evaluationform');     
                                        $i = 1;                                 
                                        foreach($province->result_array() as $d)
                                        {
                                            ?>
                                            <h5 value="<?=$d['EvaluationFormID']?>"><?=$i?> : <?=trim($d['EvaluationformName'])?></h5>
                                            <input type="radio" name="result_<?=$i?>" value="4">ดีมาก
                                            <input type="radio" name="result_<?=$i?>" value="3" style="margin-left: 23px;">ดี
                                            <input type="radio" name="result_<?=$i?>" value="2" style="margin-left: 23px;">พอใช้
                                            <input type="radio" name="result_<?=$i?>" value="1" style="margin-left: 23px;">ปรับปรุง
                                            <!-- <input type="hidden" id="idForm<?=$i?>" name="idForm<?=$i?>" value="<?=$i?>"> -->
                                            
                                            <?php
                                            $i++;
                                        }
                                        
                                ?>
                                
                                   
                                    <input type="hidden" id="evaid" name="evaid" value="<?=trim($id)?>">
                                    <br>
                                    <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; " >ยืนยันการประเมิน</button>
                                    
                                    </div>      
                                <?php
                                }
                                ?>
            </form>
            <?php
                }
                else
                {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>คำเตือน :</strong> คุณเคยทำแบบประเมินนี้ไปแล้วจึงไม่สามารถทำแบบประเมินนี้ได้อีก
                    </div>
                    <?php
                }
                ?>
</div>
</body>