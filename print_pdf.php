<?php
function generateRow()
{
	$contents = '';
	include_once('database.php');
	$sql = "SELECT * FROM cashier_data";

	//use for MySQLi OOP
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

				
			</tr>
			";
	}


	return $contents;
}

require_once('tcpdf/tcpdf.php');
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Generated PDF using TCPDF");
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
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
				<th width="70px">Date</th>
				<th width="50px">OR#</th>
				<th width="70px">Name</th>
				<th width="20%">Rice</th>
				<th width="20%">Cattle</th>
				<th width="55%">Swine</th>
				<th width="20%">Tilapia</th>
				<th width="20%">ID Fee</th>
				<th width="55%">ID Lace</th>
				<th width="20%">Hard Bound</th>
				<th width="20%">Cottage/Dorm</th>
				<th width="55%">Sablay</th>
				<th width="20%">Cap & Gown</th>
				<th width="20%">Deposit</th>
				<th width="55%">Disallowance</th>
				<th width="55%">Financial Assistance</th>
				<th width="55%">Internet Subscription</th>
				<th width="55%">Total</th>
           </tr>
      ';

$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('members.pdf', 'I');


?>