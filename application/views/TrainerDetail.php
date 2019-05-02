<body>
<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form name="train" id="train_form" method="post">
            <?php
                $this->db->select('*');   
                $this->db->where('TrainingID',$id);
                $province = $this->db->get('training');                                        
                              foreach($province->result_array() as $d)
                                {
                                ?>  <h3 class="display-3">หัวข้อ:<?=trim($d['TrainingName'])?></h3> 
                                    <hr>
                                    
                                    <h5>วันที่เริ่มต้น : <?=trim($d['StartDate'])?> </h5>
                                    <h5>วันที่สิ้นสุด : <?=trim($d['FinalDate'])?> </h5>
                                    <h5>วิทยากร : <?=trim($d['Lecturer'])?> </h5>
                                    <h5>สถานที่ : <?=trim($d['Place'])?> </h5>
                                    <h5>จำนวน : <?=trim($d['Amount'])?> </h5>
                                    <h5>รายละเอียด : <?=trim($d['TrainingDetailID'])?> </h5>
                                    <h6><button type="button" class="btn btn-primary btn-lg" style="margin-top: 44px; " value="<?=trim($d['TrainingID'])?>" onclick="location.href='<?php echo base_url();?>index.php/evaluation/<?=$d['TrainingID']?>'">ทำแบบประเมิน</button></h6>
                                    
                                    <?php if($this->session->userdata('TypeID') == '2')
                                    {?>
                                        <h6><button type="button" class="btn btn-primary btn-lg" style="margin-top: 44px;" value="<?=trim($d['TrainingID'])?>" onclick="location.href='<?php echo base_url();?>index.php/resultcontroller/<?=$d['TrainingID']?>'">สรุปแบบประเมิน</button></h6>

                                    <?php
                                    }?>

                                    
                                    </div>      
                                <?php
                                }
                                ?>
            </form>
</div>
</body>