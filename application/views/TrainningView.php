<body style="width: 2000px;">
<div class="ct-example tab-content tab-example-result" style="width: 2000px; margin: auto; margin-top: 62px;padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">
        <h1 class="card-header">Edit Training</h1>
        <form method = "post" class="card-body">
			<table class = table id="table_server_id"  >
				<thead>
                <tr class="no-border">
						<td width="150">
								<input type="text"value="<?= isset($item->TrainingID) ? $item->TrainingID : '' ?>" name="TrainingID" readonly class="form-control">
						</td>
						<td>
								<input type="text" value="<?= isset($item->TrainingName) ? $item->TrainingName : '' ?>" name="TrainingName"  required class="form-control">
								<?=form_error('TrainingName', '<small class="text-danger"> ','</small>')?>
						</td>
						<td>
								<input type="text" value="<?= isset($item->TrainingDetailID) ? $item->TrainingDetailID : '' ?>" name="TrainingDetailID"  required class="form-control">
								<?=form_error('TrainingDetailID', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td>
								<input type="text" value="<?= isset($item->StartDate) ? $item->StartDate : '' ?>" name="StartDate"  required class="form-control">
								<?=form_error('StartDate', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td>
								<input type="text" value="<?= isset($item->FinalDate) ? $item->FinalDate : '' ?>" name="FinalDate"  required class="form-control">
								<?=form_error('FinalDate', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td>
								<input type="text" value="<?= isset($item->Lecturer) ? $item->Lecturer : '' ?>" name="Lecturer"  required class="form-control">
								<?=form_error('Lecturer', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td>
								<input type="text" value="<?= isset($item->Expenditure) ? $item->Expenditure : '' ?>" name="Expenditure"  required class="form-control">
								<?=form_error('Expenditure', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td>
								<input type="text" value="<?= isset($item->Place) ? $item->Place : '' ?>" name="Place"  required class="form-control">
								<?=form_error('Place', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td>
								<input type="text" value="<?= isset($item->Amount) ? $item->Amount : '' ?>" name="Amount"  required class="form-control">
								<?=form_error('Amount', '<small class="text-danger"> ','</small>')?>
						</td>

						<td>
							<div class="row">
								<div class="col">
									<button onclick="return confirm('คุณต้องการบันทึกข้อมูลจริงหรือ?')" type="submit" class="btn btn-success btn-lg" style="width: 100px;" >
										save
									</a>
								</div>
								<div class="col">
									<td><a href="<?= base_url('index.php/TrainningController/index') ?>" class="btn btn-success btn-lg " style="width: 100px; background-color: #f44336; border-color: #f44336" >
										cancel
									</a></td>
									
								</div>
							</div>
						</td>
					</tr>
					<tr class="no-border">
                        <th>TrainingID</th>
                        <th>TrainingName</th>
						<th>TrainingDetailID</th>
                        <th>StartDate</th>
                        <th>FinalDate</th>
                        <th>Lecturer</th>
                        <th>Expenditure</th>
                        <th>Place</th>
                        <th>Amount</th>
                        <th>จัดการข้อมูล</th>
					</tr>
                </thead>
                <tbody>
                    <?php foreach($items as $row) : ?>
                    <tr>
                <td><?= $row->TrainingID ?></td>
                <td><?= $row->TrainingName ?></td>
				<td><?= $row->TrainingDetailID ?></td>
                <td><?= $row->StartDate ?></td>
                <td><?= $row->FinalDate ?></td>
                <td><?= $row->Lecturer ?></td>
                <td><?= $row->Expenditure ?></td>
                <td><?= $row->Place ?></td>
                <td><?= $row->Amount ?></td>

									<td style="width: 42px;"><a href="<?= base_url("index.php/TrainningController/index/{$row->TrainingID}") ?>" class="btn btn-success btn-lg" style="width: 100px;">
										แก้ไข
									</a></td>
                                    <td><a onclick="return confirm('คุณต้องการจะลบข้อมูลนี้จริงหรือ?')" href="<?= base_url("index.php/TrainningController/delete_row/{$row->TrainingID}") ?>" 
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

