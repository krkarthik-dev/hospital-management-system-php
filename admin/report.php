<?php
include "../inc/connect.php";
$sql = "SELECT * FROM `access_tab` ORDER BY `time` desc";
$result = mysqli_query($conn,$sql);
$count=1;

//include library
include "../library/tcpdf.php";
//make TCPDF object
$pdf = new TCPDF('P','mm','A4');

//remove default header and footer
//$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//add page
$pdf->AddPage();
//add content (student list)
//title
$pdf->Ln(2);
$pdf->SetFont('Helvetica','',14);
$pdf->Cell(190,10,"Punarjani Multi Speciality Hospitals",0,1,'C');
$pdf->Ln(2);
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(190,10,"Access Log",0,1,'C');
$pdf->Ln(5);

//make the table
$html = "
	<table>
		<tr>
			<th>Sl No:</th>
			<th>Username</th>
			<th>User type</th>
			<th>Date and Time</th>
		</tr>
		";

//loop the data
while($rows = mysqli_fetch_assoc($result))
{
	$html .= "
			<tr>
				<td>".  $count ."</td>
				<td>". $rows['username'] ."</td>
				<td>". $rows['user_type'] ."</td>
				<td>". $rows['time'] ."</td>
			</tr>
			";
	$count++;
}		
$html .= "
	</table>
	<style>
	img{
		justify-content:center;
	}
	table {
		border-collapse:collapse;
		padding: 10px;
	}
	th,td {
		border:1px solid #888;
		text-align:center;
	}
	table tr th {
		background-color: blueviolet;
		color:white;
		font-weight:bold;

	}
	</style>
";

//WriteHTMLCell
$pdf->WriteHTMLCell(192,0,9,'',$html,0);	


//output
$pdf->Output();









