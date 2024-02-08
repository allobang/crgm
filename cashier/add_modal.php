<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Add New</h4>
				</center>
			</div>

			<div class="modal-body">
				<div class="container-fluid">

					<form method="POST" action="add.php">

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Date:</label>
							</div>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="date" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">O.R No.</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="ornumber" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Name:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="fullname" >
							</div>
						</div>

						<div class="modal-header">
							<center>
								<h4 class="modal-title" id="myModalLabel">A. Crop Enterprises</h4>
							</center>
						</div>
						<br>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Rice:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="rice" >
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
								<label class="control-label modal-label">Poultry - Cattle:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="poultry" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Large Ruminants: </label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="large_ruminants" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Aqua Culture:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="aqua_culture" >
							</div>
						</div>

						<!-- <div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Cattle:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="cattle" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Swine</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="swine" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Tilapia</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="tilapia" >
							</div>
						</div> -->

						<div class="modal-header">
							<center>
								<h4 class="modal-title" id="myModalLabel">C. Merchandising Enterprises</h4>
							</center>
						</div>
						<br>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">ID Fee:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="id_fee" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">ID Lace:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="id_lace" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Hard Bound:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="hard_bound" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Cottage/ Dorm:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="cottage_dorm" >
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
								<input type="text" class="form-control" name="sablay" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Cap & Gown:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="cap_gown" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Deposit:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="deposit" >
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
								<input type="text" class="form-control" name="disallowance" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Fin. Assistance:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="fin_assistance" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Internet Subsc:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="internet_subsc" >
							</div>
						</div>

					
						

				</div> <!-- //container-fluid -->
			</div> <!-- // Body -->

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span
						class="glyphicon glyphicon-remove"></span> Cancel
				</button>

				<button type="submit" name="add" class="btn btn-primary">
					<span class="glyphicon glyphicon-floppy-disk"></span> Save</a>

					</form>
			</div>

		</div>
	</div>
</div>