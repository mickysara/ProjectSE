<body >
<div class="ct-example tab-content tab-example-result" style="width: 1500px; margin: auto; margin-top: 62px;padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">
        <h1 class="card-header">Edit Evaluation</h1>
        <form method = "post" class="card-body" action="EvaluationController/insertevaluation">
			<table class = table id="table_server_id"  >
				<thead>
                <tr class="no-border">
						<td width="150">
								<input type="text"value="<?= isset($item->EvaluationID) ? $item->EvaluationID : '' ?>" name="EvaluationID" readonly class="form-control">
						</td>
						<td>
								<input type="text" value="<?= isset($item->EvaluationName) ? $item->EvaluationName : '' ?>" name="EvaluationName"  required class="form-control">
								<?=form_error('EvaluationName', '<small class="text-danger"> ','</small>')?>
						</td>
						<td>
								<input type="text" value="<?= isset($item->Year) ? $item->Year : '' ?>" name="Year"  required class="form-control">
								<?=form_error('Year', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td>
								<input type="text" value="<?= isset($item->StartDate) ? $item->StartDate : '' ?>" name="StartDate"  required class="form-control">
								<?=form_error('StartDate', '<small class="text-danger"> ','</small>')?>
						</td>
                        <td>
								<input type="text" value="<?= isset($item->FinalDate) ? $item->FinalDate : '' ?>" name="FinalDate"  required class="form-control">
								<?=form_error('FinalDate', '<small class="text-danger"> ','</small>')?>
						</td>
						<td width="200">
                        <select name="training" id="training" onChange="change_training()" id="training" style= "height: 35px;">
                                      <option>โปรดเลือกประเภท</option>
                                    <?php                                                                     
                                        foreach($training ->result() as $d)
                                        {
                                            ?>
                                            <option value="<?php echo $d->TrainingID; ?>"><?php echo $d->TrainingName; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                        </td>
						<td>
							<div class="row">
								<div class="col">
									<button type="submit" class="btn btn-success btn-lg" style="width: 100px;" >
										save
									</a>
								</div>
								<div class="col">
									<td><a href="<?= base_url('index.php/EvaluationController/index') ?>" class="btn btn-success btn-lg " style="width: 100px; background-color: #f44336; border-color: #f44336" >
										cancel
									</a></td>
								</div>
							</div>
						</td>
					</tr>
					<tr class="no-border">
                        <th>EvaluationID</th>
                        <th>EvaluationName</th>
						<th>Year</th>
                        <th>StartDate</th>
                        <th>FinalDate</th>
                        <th>TrainingName</th>
                        <th>จัดการข้อมูล</th>
					</tr>
                </thead>
                <tbody>
                    <?php foreach($items as $row) : ?>
                    <tr>
                <td><?= $row->EvaluationID ?></td>
                <td><?= $row->EvaluationName ?></td>
				<td><?= $row->Year ?></td>
                <td><?= $row->StartDate ?></td>
                <td><?= $row->FinalDate ?></td>
                <td><?= $row->TrainingName ?></td>

									<td style="width: 42px;"><a href="<?= base_url("index.php/EvaluationController/index/{$row->EvaluationID}") ?>" class="btn btn-success btn-lg" style="width: 100px;">
										แก้ไข
									</a></td>
                                    <td><a onclick="return confirm('คุณต้องการจะลบข้อมูลนี้จริงหรือ?')" href="<?= base_url("index.php/EvaluationController/delete_row/{$row->EvaluationID}") ?>" 
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

