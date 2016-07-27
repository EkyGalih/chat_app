<?php
	include("../connect.php");
	require_once("dompdf_config.inc.php");
	
	$html = "<html>";
	$html .= "<head>";
	$html .= '<link rel="stylesheet" type="text/css" href="assets/css/print.css">';
	$html .= "</head>";
	$html .= "<body>";
	
	$sql = "SELECT * FROM absensi";
	$recordset = mysqli_query($mysqli, $sql);
	
	$html .= '<caption>LIST MEMBER</caption>';
	$html .= '<table border=1 align=center cellpadding=1 cellspacing=1">';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>NO</th>';
	$html .= '<th>FULL NAME</th>';
	$html .= '<th>NICKNAME</th>';
	$html .= '<th>PHONE NUMBER</th>';
	$html .= '<th>EMAIL</th>';
	$html .= '<th>STATUS</th>';
	// $html .= '<th></th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$no=1;
	$html .= '<tbody>';
	while ($row = mysqli_fetch_array($recordset)){
		$html .= '<tr>';
		$html .= '<td style="text-align:center;">'.$no.'.</td>';
		$html .= '<td>'.$row['nama_lengkap'].'</td>';
		$html .= '<td>'.$row['nicname'].'</td>';
		$html .= '<td>'.$row['phone_number'].'</td>';		
		$html .= '<td>'.$row['email'].'</td>';		
		$html .= '<td>'.$row['status'].'</td>';		
		// $html .= '<td>'.$row[''].'</td>';		
		$html .= '</tr>';
		$no++;
	}
	$html .= '</tbody>';
	$html .='</table>';
	$html .= "</body>";
	$html .= "</html>";

/*$html = "<html>
		<body>
		<h1> ini contoh isian file PDF</h1>
		</body>
		</html>";*/

	// membuat instance objek dari class DOMPDF
	
	$dompdf = new DOMPDF();	
	
	$dompdf->set_paper('A4','portrait');
	$dompdf->load_html($html);
	$dompdf->render();	
	$dompdf->stream('list_member.pdf', array("Attachment"=>0));
?>