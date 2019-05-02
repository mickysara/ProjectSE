<body>
<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px;padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">
        <h1 class="card-header">Edit UserType</h1>
        <form method = "post" class="card-body">
			<table class = table id="table_server_id" class="display" >
				<thead>
                <tr class="no-border">
						<td width="150">
								<input type="text"value="<?= isset($item->TypeID) ? $item->TypeID : '' ?>" name="TypeID" readonly class="form-control">
						</td>
						<td>
								<input type="text" value="<?= isset($item->TypeName) ? $item->TypeName : '' ?>" name="TypeName"  required class="form-control">
								<?=form_error('TypeName', '<small class="text-danger"> ','</small>')?>
						</td>
						<td>
							<div class="row">
								<div class="col">
									<button type="submit" class="btn btn-success btn-lg" style="width: 100px;">
										save
									</a>
								</div>
								<div class="col">
									<td><a href="<?= base_url('index.php/utype/index') ?>" class="btn btn-success btn-lg " style="width: 100px; background-color: #f44336; border-color: #f44336" >
										cancel
									</a></td>
								</div>
							</div>
						</td>
					</tr>
					<tr class="no-border">
                        <th>TypeID</th>
                        <th>TypeName</th>
                        <th>จัดการข้อมูล</th>
					</tr>
                </thead>
                <tbody>
                    <?php foreach($items as $row) : ?>
                    <tr>
                <td><?= $row->TypeID ?></td>
                <td><?= $row->TypeName ?></td>

									<td style="width: 42px;"><a href="<?= base_url("index.php/utype/index/{$row->TypeID}") ?>" class="btn btn-success btn-lg" style="width: 100px;">
										แก้ไข
									</a></td>
                                    <td><a onclick="return confirm('คุณต้องการจะลบข้อมูลนี้จริงหรือ?')" href="<?= base_url("index.php/utype/delete_row/{$row->TypeID}") ?>" 
                                    class="btn btn-success btn-lg"style="width: 100px; background-color: #f44336; border-color: #f44336">
										ลบ
									</a></td>

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

