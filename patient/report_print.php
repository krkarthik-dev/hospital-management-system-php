<?php
session_start();
$username = $_SESSION['user'];
include "../inc/connect.php";
$rid=$_REQUEST['rid'];
$sql = "SELECT * FROM `report_tab` AS a,`user_tab` AS b,`patient` AS d WHERE a.username = d.p_username AND a.d_username=b.username AND a.username = '$username' AND a.r_id='$rid'";
$result = mysqli_query($conn,$sql);
//include library
include "../library/tcpdf.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->SetCreator("Wael Salah");
// $pdf->SetAuthor('Wael Salah');
$pdf->SetTitle('Report Print');

// $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 6, 255), array(0, 64, 128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(25, PDF_MARGIN_TOP, 25);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set default font subsetting mode

$pdf->setFont('dejavusans', '', 14, '', true);

$pdf->AddPage();
$pdf->Ln();

$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 255)));
while($row=mysqli_fetch_array($result)){
$html = <<<EOD

<h1 style="text-align:center;"><img style="width:280vh;" src="/HMS/img/logo.jpg"><br><br>Punarjani Multi Speciality Hospitals</h1><br>
<h2 style="text-align:center;text-decoration:underline;">Patient Report on $row[r_date]</h2><br>
<table style="width:70%;">
<br>
<tr>
<td>First Name</td>
<td>:   $row[p_fname]</td>
</tr><br>
<tr>
<td>Last Name</td>
<td>:   $row[p_lname]</td>
</tr><br>
<tr>
<td>Patient Username</td>
<td>:   $row[p_username]</td>
</tr><br>
<tr>
<td>Address</td>
<td>:   $row[p_address]</td>
</tr><br>
<tr>
<td>Doctor Name</td>
<td>:   $row[fname] $row[lname]</td>
</tr><br>
<tr>
<td>Remarks</td>
<td>:   $row[remark]</td>
</tr><br>
<tr>
<td>Medicines</td>
<td>:   $row[med_id]</td>
</tr><br>
</table>
EOD;
}
$pdf->writeHTML($html);

$pdf->Output('test.pdf', 'I');






