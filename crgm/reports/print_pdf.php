<?php
function generateRow()
{
    $contents = '';
    include_once('../../database.php');
    $sql = "SELECT * FROM cashier_data";

    // use for MySQLi OOP
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $contents .= "
			<tr>
				<td>" . $row['date'] . "</td>
				<td>" . $row['ornumber'] . "</td>
				<td>" . $row['fullname'] . "</td>
				<td>" . $row['rice'] . "</td>
				<td>" . $row['poultry'] . "</td>
				<td>" . $row['large_ruminants'] . "</td>
				<td>" . $row['aqua_culture'] . "</td>
				<td>" . $row['id_fee'] . "</td>
				<td>" . $row['id_lace'] . "</td>
				<td>" . $row['hard_bound'] . "</td>
				<td>" . $row['cottage_dorm'] . "</td>
				<td>" . $row['sablay'] . "</td>
				<td>" . $row['cap_gown'] . "</td>
				<td>" . $row['deposit'] . "</td>
				<td>" . $row['disallowance'] . "</td>
				<td>" . $row['fin_assistance'] . "</td>
				<td>" . $row['internet_subsc'] . "</td>
				<td></td>
			</tr>
			";
    }

    return $contents;
}

require_once('../../tcpdf/tcpdf.php');
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); // 'L' for landscape
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Generated PDF using TCPDF");
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins('5', '10', '5');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();
$content = '';
$content .= '
      	<h2 align="center">Generated PDF using TCPDF</h2>
      	<h4>Members Table</h4>
      	<table border="1" cellspacing="0" cellpadding="3">
           <tr>
				<th rowspan="3">Date</th>
				<th rowspan="3">O.R No.</th>
				<th rowspan="3">Name</th>
				<th rowspan="2">A. Crop Enterprises</th>
				<th colspan="3">B. Animal Enterprises</th>
				<th colspan="3" rowspan="2">C. Merchandising Enterprises</th>
				<th colspan="4" rowspan="2">D. Rentals</th>
				<th colspan="3" rowspan="2">E. Others</th>
				<th rowspan="3">Total</th>
           </tr>

           <tr>
				<th>Poultry</th>
				<th>Large Ruminants</th>
				<th>Aqua Culture</th>
           </tr>

           <tr>
				<th>Rice</th>
				<th>Cattle</th>
				<th>Swine</th>
				<th>Tilapia</th>
				<th>ID Fee</th>
				<th>ID Lace</th>
				<th>Hard Bound</th>
				<th>Cottage/Dorm</th>
				<th>Sablay</th>
				<th>Cap & Gown</th>
				<th>Deposit</th>
				<th>Disallowance</th>
				<th>Financial Assistance</th>
				<th>Internet Subsc</th>
				<th></th>
           </tr>
      ';

$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('members.pdf', 'I');
?>
