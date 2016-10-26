<?php

include('../classes/pdflayer.class.php');

$html = '
		<table>
			<thead>
			<tr>
				<th> Batata </th>
			</tr>
			<thead>
			<tbody>
				<tr>
				<td> frita </td>
				</tr>
				<tr>
				<td> cozida </td>
				</tr>
				<tr>
				<td> assada </td>
				</tr>
			</tbody>
		</table>

';
//Instantiate the class
$html2pdf = new pdflayer();

//set the URL to convert
$html2pdf->set_param('document_html','$html');

$html2pdf->set_param('header_text','Page [2] of [3]');
//start the conversion
$html2pdf->convert();

//display the PDF file
$html2pdf->download_pdf();

?>