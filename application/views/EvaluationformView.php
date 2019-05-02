<body >
<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px;padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">
        <h1 class="card-header">Edit Evaluationform</h1>
        <form method = "post" class="card-body" action="EvaluationFormController/insertevaluation">
			<table class = table id="table_server_id"  >
				<thead>
                <tr class="no-border">
						<td width="150">
								<input type="text"value="<?= isset($item->EvaluationFormID) ? $item->EvaluationFormID : '' ?>" name="EvaluationFormID" readonly class="form-control">
						</td>
						<td>
								<input type="text" value="<?= isset($item->EvaluationformName) ? $item->EvaluationformName : '' ?>" name="EvaluationformName"  required class="form-control">
								<?=form_error('EvaluationformName', '<small class="text-danger"> ','</small>')?>
						</td>
						<td width="200">
                        <select name="evaluation" id="evaluation" onChange="change_evaluation()" id="evaluation" style= "height: 35px;">
                                      <option>โปรดเลือกประเภท</option>
                                    <?php                                                                     
                                        foreach($evaluation ->result() as $d)
                                        {
                                            ?>
                                            <option value="<?php echo $d->EvaluationID; ?>"><?php echo $d->EvaluationName; ?></option>
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
									<td><a href="<?= base_url('index.php/EvaluationFormController/index') ?>" class="btn btn-success btn-lg " style="width: 100px; background-color: #f44336; border-color: #f44336" >
										cancel
									</a></td>
								</div>
							</div>
						</td>
					</tr>
					<tr class="no-border">
                        <th>EvaluationFormID</th>
                        <th>EvaluationFormName</th>
						<th>EvaluationName</th>
                        <th>จัดการข้อมูล</th>
					</tr>
                </thead>
                <tbody>
                    <?php foreach($items as $row) : ?>
                    <tr>
                <td><?= $row->EvaluationFormID ?></td>
                <td><?= $row->EvaluationformName ?></td>
				<td><?= $row->EvaluationName ?></td>

									<td style="width: 42px;"><a href="<?= base_url("index.php/EvaluationFormController/index/{$row->EvaluationFormID}") ?>" class="btn btn-success btn-lg" style="width: 100px;">
										แก้ไข
									</a></td>
                                    <td><a onclick="return confirm('คุณต้องการจะลบข้อมูลนี้จริงหรือ?')" href="<?= base_url("index.php/EvaluationFormController/delete_row/{$row->EvaluationFormID}") ?>" 
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

