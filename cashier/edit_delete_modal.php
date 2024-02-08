<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Edit Data</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="edit.php">
						<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Date:</label>
							</div>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="date" value="<?php echo $row['date']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">O.R Number:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="ornumber"
									value="<?php echo $row['ornumber']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Fullname:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="fullname"
									value="<?php echo $row['fullname']; ?>">
							</div>
						</div>

						<div class="modal-header">
							<center>
								<h4 class="modal-title" id="myModalLabel">A. Crop Enterprises</h4>
							</center>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Rice:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="rice"
									value="<?php echo $row['rice']; ?>">
							</div>
						</div>

						<div class="modal-header">
							<center>
								<h4 class="modal-title" id="myModalLabel">B. Animal Enterprises</h4>
							</center>
						</div>
						<br>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Poultry:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="poultry"
									value="<?php echo $row['poultry']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Large Ruminants:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="large_ruminants"
									value="<?php echo $row['large_ruminants']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Aqua Culture:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="aqua_culture"
									value="<?php echo $row['aqua_culture']; ?>">
							</div>
						</div>

						<div class="modal-header">
							<center>
								<h4 class="modal-title" id="myModalLabel">C. Merchandising Enterprises</h4>
							</center>
						</div>
						<br>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Id Fee:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="id_fee"
									value="<?php echo $row['id_fee']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Id Lace:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="id_lace"
									value="<?php echo $row['id_lace']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Hard Bound:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="hard_bound"
									value="<?php echo $row['hard_bound']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Cottage Dorm:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="cottage_dorm"
									value="<?php echo $row['cottage_dorm']; ?>">
							</div>
						</div>

						<div class="modal-header">
							<center>
								<h4 class="modal-title" id="myModalLabel">D. Rentals</h4>
							</center>
						</div>
						<br>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Sablay:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="sablay"
									value="<?php echo $row['sablay']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Cap Gown:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="cap_gown"
									value="<?php echo $row['cap_gown']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Deposit:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="deposit"
									value="<?php echo $row['deposit']; ?>">
							</div>
						</div>

						<div class="modal-header">
							<center>
								<h4 class="modal-title" id="myModalLabel">F. Others</h4>
							</center>
						</div>
						<br>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Disallowance:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="disallowance"
									value="<?php echo $row['disallowance']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Fin Assistance:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="fin_assistance"
									value="<?php echo $row['fin_assistance']; ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Internet Subsc:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="internet_subsc"
									value="<?php echo $row['internet_subsc']; ?>">
							</div>
						</div>

				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span
						class="glyphicon glyphicon-remove"></span> Cancel</button>
				<button type="submit" name="edit" class="btn btn-success"><span
						class="glyphicon glyphicon-check"></span> Update</a>
					</form>
			</div>

		</div>
	</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Delete Data</h4>
				</center>
			</div>
			<div class="modal-body">
				<p class="text-center">Are you sure you want to Delete</p>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span
						class="glyphicon glyphicon-remove"></span> Cancel</button>
				<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span
						class="glyphicon glyphicon-trash"></span> Yes</a>
			</div>

		</div>
	</div>
</div>