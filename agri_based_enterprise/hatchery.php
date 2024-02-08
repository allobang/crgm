<button onclick="hatchery()" class="btn btn-success ">Mango Production</button>

<table id="hatchery" style="display: none;" class="table table-bordered table-striped table-hover">
    <thead class="table ">
        <tr>

            <th>Name</th>
            <th>Date</th>
            <th>Product Name</th>
            <th>Business Enterprise</th>
            <th>Code</th>
            <th>Quantity</th>
            <th>Amount</th>

        </tr>
    </thead>
    <tbody>
        <?php
        // Example SQL to fetch data for a particular month and year from cash orders
// SELECT * FROM cash_order WHERE MONTH(created_at) = 11 AND YEAR(created_at) = 2023;
        
        $query = "SELECT * FROM cash_order WHERE business_enterprise='Hatchery'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $data) {

                ?>
                <tr>

                    <td>
                        <?= $data['fullname']; ?>
                    </td>
                    <td>
                        <?= $data['created_at']; ?>
                    </td>
                    <td>
                        <?= $data['product_name']; ?>
                    </td>
                    <td>
                        <?= $data['business_enterprise']; ?>
                    </td>
                    <td>
                        <?= $data['code']; ?>
                    </td>
                    <td>
                        <?= $data['quantity']; ?>
                    </td>
                    <td>
                        <?= $data['amount']; ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            // echo "<h5> No Record Found </h5>";
        }
        ?>

    </tbody>
</table>

<script>
    function hatchery() {
        var table = document.getElementById("hatchery");
        if (table.style.display === "none") {
            table.style.display = "table";
        } else {
            table.style.display = "none";
        }
    }


</script>