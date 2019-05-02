<style>
    select{
        width: 428px;
    height: 46px;
    border-top-width: 1px;
    border-bottom-width: 1px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-right: 12px;
    padding-left: 12px;
    }
</style>
<body>
<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form name="Register" id="register_form" method="post" action="<?php echo site_url('RegisterController/insert_user');?>">
                <h1 class="display-2">สมัครสมาชิก</h1>
                <hr>
                <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <div>E-mail</div>
                            <input type="email" class="form-control form-control-alternative" id="email" name="mailtxt" placeholder="name@example.com" required>
                        </div>
                    </div>
                    
                <div class="col-md-12">
                    <div class="form-group">
                        <div>Password</div>
                            <input type="password" class="form-control form-control-alternative" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                    <div class="form-group">
                        <div>ยืนยัน Password</div>
                            <input type="password" class="form-control form-control-alternative" id="CfPassword" name="CfPassword" placeholder="ยืนยัน Password" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="col" style="padding-left: 0px;">
                            <div class="form-group" >
                                <div>ชื่อ</div>
                                    <input type="text" class="form-control form-control-alternative" id="FirstName" name="FirstName" placeholder="ชื่อ" required>
                                </div>
                            </div>
                        </div>
                    <div class="col">
                        <div class="col" style="padding-left: 0px;">
                            <div class="form-group" >
                                <div>นามสกุล</div>
                                    <input type="text" class="form-control form-control-alternative" id="LastName" name="LastName" placeholder="นามสกุล" required>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col">
                        <div class="col" style="padding-left: 0px;">
                            <div class="form-group" >
                                <div>รหัสบัตรประชาชน</div>
                                    <input type="text" maxlength="13" pattern="^(-?[1-9][0-9]*)$" title="กรุณากรอกแต่ตัวเลข" class="form-control form-control-alternative" id="CardId" name="CardId" placeholder="รหัสบัตรประชาชน13หลัก" required>
                                </div>
                            </div>
                        </div>
                    <div class="col">
                        <div class="col" style="padding-left: 0px;">
                            <div class="form-group" >
                                <div>เบอร์ติดต่อ</div>
                                    <input type="text" maxlength="10" pattern="^(-?[0][0-9]*)$" title="กรุณากรอกแต่ตัวเลข และ ต้องขึ้นต้นด้วย 0" class="form-control form-control-alternative" id="tel" name="tel" placeholder="เบอร์ติดต่อ" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-4" style="margin-top: 16px;">ที่อยู่</h1>
                    <hr>

                <div class="row">
                    <div class="col">
                        <div class="col" style="padding-left: 0px;">
                            <div class="form-group" >
                                <div>จังหวัด</div>
                                    <select name="Proviance" id="Proviance" onChange="change_province()" id="Proviance">
                                    <?php
                                        $this->db->select('PROVINCE_NAME, PROVINCE_ID');                                        
                                        $province = $this->db->get('tb_addr_province');                                        
                                        foreach($province->result_array() as $d)
                                        {
                                            ?>
                                            <option value="<?=$d['PROVINCE_ID']?>"><?=trim($d['PROVINCE_NAME'])?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="col">
                        <div class="col" style="padding-left: 0px;">
                            <div class="form-group" >
                                <div>อำเภอ</div>
                                    <select name="District" onChange="change_district()" id="District" required>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col">
                        <div class="col" style="padding-left: 0px;">
                            <div class="form-group" >
                                <div>ตำบล</div>
                                    <select name="Subdistrict" id="Subdistrict" required>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col">
                        <div class="col" style="padding-left: 0px;">
                            <div class="form-group" >
                                <div>เลือกหน่วยงาน</div>
                                    <select name="department" id="department" required> 
                                    <?php
                                        $this->db->select('DepartmentName, DepartmentID');                                        
                                        $province = $this->db->get('department');                                        
                                        foreach($province->result_array() as $d)
                                        {
                                            ?>
                                            <option value="<?=$d['DepartmentID']?>"><?=trim($d['DepartmentName'])?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div>ความชำนาญ</div>
                            <input type="text" class="form-control form-control-alternative" id="Expertise" name="Expertise" placeholder="ความชำนาญ" required>
                        </div>
                    </div>
                
                


                

                <!-- href="<?php echo site_url('/RegisterController/insert_user');?> -->


                
                
                <button type="submit" class="btn btn-success btn-lg"  style="margin-top: 44px; width:120px;">ยืนยัน</button>
            </form>
            </div>
            </div>
            
</div>
