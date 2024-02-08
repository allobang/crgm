<button onclick="machineriesHarvester()" class="btn btn-success "><span
							class="glyphicon glyphicon-plus"></span> New</button>

    

<!-- Add New -->
<div id="machineriesHarvester" style="display: none;"   id="addnew" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="width: 98vw;">

			<div class="modal-header">
				<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
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
								<label class="control-label modal-label">Poultry:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="poultry" >
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Large Ruminants:</label>
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

						<div class="row form-group">
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
						</div>

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
								<label class="control-label modal-label">Cottage / Dorm:</label>
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
				<!-- <button type="button" class="btn btn-default" data-dismiss="modal"><span
						class="glyphicon glyphicon-remove"></span> Cancel
				</button> -->

                <button type="button" id="cancel" name="cancel" class="btn btn-default" value="1">Cancel</button>

				<button type="submit" name="add" class="btn btn-primary">
					<span class="glyphicon glyphicon-floppy-disk"></span> Save</a>

					</form>
			</div>

		</div>
	</div>
</div>

    <script>
        function machineriesHarvester() {
            var table = document.getElementById("machineriesHarvester");
            if (table.style.display === "none") {
                table.style.display = "table";
            } else {
                table.style.display = "none";
            }
        }
        
       
    </script>




<!-- <button onclick="machineriesHarvester()" class="btn btn-success "><span
							class="glyphicon glyphicon-plus"></span> New</button>

    
    <table id="machineriesHarvester" style="display: none;" class="table table-bordered table-striped table-hover">
        <thead class="table ">
            
            <tr>
                <th>Date</th>
                <th>O.R No.</th>
                <th>Name</th>
                <th>Rice</th>
                <th>Poultry</th>
                <th>Large Ruminants</th>
                <th>Aqua Culture</th>
                <th>Cattle</th>
                <th>Swine</th>
                <th>Tilapia</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <br>
            <br>
            <form action="add.php" method="POST">
                <tr>
                    <td><input type="text" class="form-control" id="fullname" name="fullname"
                            placeholder="Enter Full Name"></td>
                    <td><input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Enter Product Name"></td>
                    <td>
                        <div class="form-input">
                            <select id="mySelect" class="form-select form-control form-control-lg"
                                name="business_enterprise" required>
                                <option selected>Please select</option>
                                <option value="Rice Production">Rice Production</option>
                                <option value="Farm Machineries- Harvester">Farm Machineries - Harvester</option>
                                <option value="Farm Machineries- Rotovator">Farm Machineries - Rotovator</option>
                                <option value="Turmeric Egg">Turmeric Egg</option>
                                <option value="Fishpond Production">Fishpond Production</option>
                                <option value="Hatchery">Hatchery</option>
                                <option value="Swine Production">Swine Production</option>
                                <option value="Poultry Production-small ruminants">Poultry Production-small ruminants
                                </option>
                                <option value="Mango Production">Mango Production</option>
                                <option value="Vegetable Production">Vegetable Production</option>

                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="1" />
                    </td>
                    <td><input type="text" class="form-control" id="exampleFormControlInput1" name="amount"
                            placeholder="Enter Amount"></td>
                    <td>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="cash" name="payment_type" value="cash"
                                checked>
                            <label class="form-check-label" for="payment_type">
                                Cash
                            </label>

                            <input class="form-check-input" type="radio" id="Credit" name="payment_type" value="credit">
                            <label class="form-check-label" for="payment_type">
                                Credit
                            </label>
                        </div>

                    </td>
                    <td><button type="submit" name="confirm_data" value="" class="btn btn-success ">Confirm</button>
                    </td>
                    
                </tr>
            </form>

    </table>

    <script>
        function machineriesHarvester() {
            var table = document.getElementById("machineriesHarvester");
            if (table.style.display === "none") {
                table.style.display = "table";
            } else {
                table.style.display = "none";
            }
        }
        
       
    </script> -->