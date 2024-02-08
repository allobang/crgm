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
					<form method="POST" action="edit_ar.php">
						<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Fullname:</label>
							</div>
							<div class="col-sm-10">
								<!-- <label class="form-select form-control form-control-lg"
									value="<?php echo $row['fullname']; ?>">
									<?php echo $row['fullname']; ?>
								</label> -->
								<input type="text" class="form-control" name="fullname"
									value="<?php echo $row['fullname']; ?>" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Date:</label>
							</div>
							<div class="col-sm-10">
								<!-- <label class="form-control">Enter Date</label> -->

								<input type="date" class="form-control" name="created_at"
									value="<?php echo $row['created_at']; ?>" placeholder="Enter date">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Product Name:</label>
							</div>

							<div class="col-sm-10">
								<!-- <label class="form-select form-control form-control-lg">
									<?php echo $row['product_name']; ?>
								</label> -->
								<input type="text" class="form-control" name="product_name"
									value="<?php echo $row['product_name']; ?>" >
							</div>
						</div>




						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Business Enterprise:</label>
							</div>
							<div class="col-sm-10">
								<select id="mySelect" class="form-select form-control form-control-lg"
									name="business_enterprise" value="<?php echo $row['business_enterprise']; ?>"
									required>
									<option  selected value="<?php echo $row['business_enterprise']; ?>"><?php echo $row['business_enterprise']; ?></option>
									<option value="Rice Production">Rice Production</option>
									<option value="Farm Machineries- Harvester">Farm Machineries - Harvester</option>
									<option value="Farm Machineries- Rotovator">Farm Machineries - Rotovator</option>
									<option value="Turmeric Egg">Turmeric Egg</option>
									<option value="Fishpond Production">Fishpond Production</option>
									<option value="Hatchery">Hatchery</option>
									<option value="Swine Production">Swine Production</option>
									<option value="Poultry Production-small ruminants">Poultry Production-small
										ruminants
									</option>
									<option value="Mango Production">Mango Production</option>
									<option value="Vegetable Production">Vegetable Production</option>

								</select>
								
									<!-- <input type="text" class="form-control" name="business_enterprise"
										value="<?php echo $row['business_enterprise']; ?>" > -->
								</div>

								<!-- <label class="form-select form-control form-control-lg">
									<?php echo $row['business_enterprise']; ?>
								</label> -->

								


								<!-- <select id="mySelect" class="form-select form-control form-control-lg"
									name="business_enterprise" value="<?php echo $row['business_enterprise']; ?>"
									required>
									<option selected>Please select</option>
									<option value="Rice Production">Rice Production</option>
									<option value="Farm Machineries- Harvester">Farm Machineries - Harvester</option>
									<option value="Farm Machineries- Rotovator">Farm Machineries - Rotovator</option>
									<option value="Turmeric Egg">Turmeric Egg</option>
									<option value="Fishpond Production">Fishpond Production</option>
									<option value="Hatchery">Hatchery</option>
									<option value="Swine Production">Swine Production</option>
									<option value="Poultry Production-small ruminants">Poultry Production-small
										ruminants
									</option>
									<option value="Mango Production">Mango Production</option>
									<option value="Vegetable Production">Vegetable Production</option>

								</select> -->

							</div>
						</div>

						<!-- <div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Code:</label>
							</div>

							<div class="col-sm-10">
								
								<input type="text" class="form-control" name="product_name"
									value="<?php echo $row['product_name']; ?>" >
							</div>
						</div> -->

						<!-- <div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Code:</label>
							</div>

							<div class="col-sm-10">
							<label class="form-control"><?php echo $row['code']; ?></label>
								
								
							</div>
						</div> -->



						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Quantity:</label>
							</div>
							<div class="col-sm-10">
								<!-- <label class="form-select form-control form-control-lg">
									<?php echo $row['quantity']; ?>
								</label> -->

								<input type="number" class="form-control" name="quantity"
									value="<?php echo $row['quantity']; ?>" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Unit Price:</label>
							</div>
							<div class="col-sm-10">
								<!-- <label class="form-select form-control form-control-lg">
									<?php echo $row['amount']; ?>
								</label> -->

								<input type="number" class="form-control" name="amount"
									value="<?php echo $row['amount']; ?>" >
							</div>
						</div>

						

						<!-- <div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Ibabayad</label>
							</div>

							<div class="col-sm-10">
								
								<input type="number" class="form-control" name="toPay">
							</div>
						</div> -->


						<!-- <div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">OR Number:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="ornumber">
							</div>
						</div> -->

						

						


						



				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span
						class="glyphicon glyphicon-remove"></span> Cancel</button>
				<button type="submit" name="edit" class="btn btn-success"><span
						class="glyphicon glyphicon-check"></span> Confirm</a>
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

						<a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger"><span
						class="glyphicon glyphicon-trash"></span> yes</a>
						
						<!-- <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span
						class="glyphicon glyphicon-trash"></span> Yes</a> -->
			</div>

		</div>
	</div>
</div>