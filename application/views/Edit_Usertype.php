<body style="width: 2000px;">

<div class="ct-example tab-content tab-example-result" style="width: 2000px; margin: auto; margin-top: 62px;padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">
        <h1 class="card-header">แก้ไขข้อมูลผู้ใช้งาน</h1>
        <form method = "post" class="card-body"  style="width: 2000px;" action="EditController/insertUser">
			<table class = table id="table_server_id"  >
				<thead>
                <tr class="no-border">
						<td width="100">
								<input type="text"value="<?= isset($item->UserID) ? $item->UserID : '' ?>" name="UserID" readonly class="form-control" style= "height: 35px;">
						</td>
                        <td width="200">
								<input type="text" value="<?= isset($item->Email) ? $item->Email : '' ?>" name="Email"  required class="form-control" style= "height: 35px;">
								<?=form_error('Email', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td width="200">
								<input type="text" value="<?= isset($item->Password) ? $item->Password : '' ?>" name="Password"  required class="form-control" style= "height: 35px;">
								<?=form_error('Password', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td width="200">
								<input type="text" value="<?= isset($item->IdentityNumber) ? $item->IdentityNumber : '' ?>" name="IdentityNumber"  required class="form-control" style= "height: 35px;">
								<?=form_error('IdentityNumber', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td width="200">
								<input type="text" value="<?= isset($item->FirstName) ? $item->FirstName : '' ?>" name="FirstName"  required class="form-control" style= "height: 35px;">
								<?=form_error('FirstName', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td width="200">
								<input type="text" value="<?= isset($item->LastName) ? $item->LastName : '' ?>" name="LastName"  required class="form-control" style= "height: 35px;">
								<?=form_error('LastName', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td width="200">
								<input type="text" value="<?= isset($item->Address) ? $item->Address : '' ?>" name="Address"  required class="form-control" style= "height: 35px;">
								<?=form_error('Address', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td width="200">
								<input type="text" value="<?= isset($item->Telephone) ? $item->Telephone : '' ?>" name="Telephone"  required class="form-control"style= "height: 35px;">
								<?=form_error('Telephone', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td width="200">
								<input type="text" value="<?= isset($item->Expertise) ? $item->Expertise : '' ?>" name="Expertise"  required class="form-control"style= "height: 35px;">
								<?=form_error('Expertise', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td width="200">                     
                        <select name="department" id="department" onChange="change_department()" id="department" style= "height: 35px;">
                                    <option>โปรดเลือกหน่วยงาน</option>
                                    <?php                                 
                                        foreach($department->result() as $d)
                                        {
                                            ?>
                                           <option value="<?php echo $d->DepartmentID; ?>"><?php echo $d->DepartmentName; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                        </td>
						</td>
                        <td width="200">
                        <select name="usertype" id="usertype" onChange="change_usertype()" id="usertype" style= "height: 35px;">
                                      <option>โปรดเลือกประเภทผู้ใช้</option>
                                    <?php                                                                     
                                        foreach($usertype->result() as $d)
                                        {
                                            ?>
                                            <option value="<?php echo $d->TypeID; ?>"><?php echo $d->TypeName; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                        </td>
						</td>
						<td>
							<div class="row">
								<div class="col">
									<button type="submit" class="btn btn-success btn-lg" style="width: 100px;">
										บันทึก
									</a>
								</div>
								<div class="col">
									<td><a href="<?= base_url('index.php/EditController/index') ?>" class="btn btn-success btn-lg " style="width: 100px; background-color: #f44336; border-color: #f44336" >
										ยกเลิก
									</a></td>
								</div>
							</div>
						</td>
					</tr> 
					<tr class="no-border">
                        <th>ID</th>
                        <th>อีเมล</th>
                        <th>รหัสผ่าน</th>
                        <th>รหัสบัตรประชาชน</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ที่อยู่</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>ประสบการณ์</th>
                        <th>ชื่อหน่วยงาน</th>
                        <th>ประเภทผู้ใช้งาน</th>
                        <th>จัดการข้อมูล</th>
					</tr>
                </thead>
                <tbody>
                    <?php foreach($items as $row) : ?>
                    <tr>
                <td><?= $row->UserID ?></td>
                <td><?= $row->Email ?></td>
                <td><?= $row->Password ?></td>
                <td><?= $row->IdentityNumber ?></td>
                <td><?= $row->FirstName ?></td>
                <td><?= $row->LastName ?></td>
                <td><?= $row->Address ?></td>
                <td><?= $row->Telephone ?></td>
                <td><?= $row->Expertise ?></td>
                <td><?= $row->DepartmentName ?></td>
                <td><?= $row->TypeName ?></td>
        
                    <div class="row" style="width: 150px;">
                        <div class="col" >
                        <td style="width: 42px;"><a href="<?= base_url("index.php/EditController/index/{$row->UserID}") ?>" class="btn btn-success btn-lg" style="width: 100px;">
										แก้ไข
									</a></td>
                        </div>
                        <div class="col" > 
                        <td style="width: 42px;"><a onclick="return confirm('คุณต้องการจะลบข้อมูลนี้จริงหรือ?')" href="<?= base_url("index.php/EditController/delete_row/{$row->UserID}") ?>" class="btn btn-success btn-lg" style="width:100px; background-color: #f44336; border-color: #f44336">
                                ลบ
                            </a><td>
                        </div>
                    </div>
       
                            </tr>
                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="3" class="text">
                                    รายการข้อมูลทั้งหมดในระบบ <?= count($items)?> รายการ
                                </th>
                            </tr>
                            </tfoot>



            </table>
        </form>
 </div>    


                                            

