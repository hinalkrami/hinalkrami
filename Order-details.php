<?php
session_start();
$orderid=$_GET['oid'];
//============================================================+
// File name   : example_021.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 021 for TCPDF class
//               WriteHTML text flow
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * 
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML text flow.
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group html
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/TCPDF-main/examples/tcpdf_include.php');
include 'connection.php';


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setTitle('Greenheaven');
$pdf->setSubject('Order list');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//  $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// // set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
// $pdf->setFont('helvetica', '', 9);

// add a page
$pdf->AddPage();


// create some HTML content
	$femail=$_SESSION['uemail'];
      $q=mysqli_query($connection,"SELECT * FROM tbl_user WHERE user_email='{$femail}'");
	  $omq=mysqli_query($connection,"SELECT * FROM tbl_ordermaster WHERE order_id='{$orderid}'");
	  $omdata=mysqli_fetch_array($omq);
	  $sq=mysqli_query($connection,"SELECT * FROM tbl_shipping WHERE user_id='{$_SESSION['uid']}'");
	  $shippingdata=mysqli_fetch_array($sq);
      $count=mysqli_num_rows($q);
	  $head="						<h1>GreenHeaven</h1><br>					";
      if($count==1)
      {
		
		$od=mysqli_query($connection,"SELECT * FROM tbl_order_details where order_id='{$orderid}'");
		$dcount=mysqli_num_rows($od);
		$html="<h4>Thank you <u><b>{$_SESSION['uname']}</b></u> for choosing GreenHeaven !   Below are the details of your order.</h4><br><p>#Invoice : {$orderid}<br>Shipping Address: {$shippingdata['shipping_address']}<br></p>";

		$tbl = <<<EOD
			<table border="1" cellpadding="2" cellspacing="2" nobr="true">
			<tr>
			<th colspan="9" align="center">INVOICE</th>
			</tr>
			<tr>
			<th colspan="3" align="center">Product</th>
			<th colspan="3" align="center">Quantity</th>
			<th colspan="3" align="center">Unite Price</th>
			</tr>
			</table>
			EOD;
			while($oddata=mysqli_fetch_array($od))
			{
			 
			 $pd=mysqli_query($connection,"SELECT * FROM tbl_product WHERE pro_id='{$oddata['pro_id']}'");
			 $pddata=mysqli_fetch_array($pd);
			
			$ht= <<<EOD
			<table border="1" cellpadding="2" cellspacing="2" nobr="true">
			<tbody>
			<tr>
			<td colspan="3" align="center">{$pddata['pro_name']}</td>
			<td colspan="3" align="center">{$oddata['pro_qty']}</td>
			<td colspan="3" align="center">{$oddata['pro_price']}</td>
			</tr>
			</tbody>
			</table>
			EOD;
			$tbl .= $ht;
			}
			$end="Greenheaven stands ready to serve you at all times.!<br>";	
		
	}

// output the HTML content
$pdf->writeHTML($head, true, 0, true, 0);

$pdf->writeHTML($html, true, 0, true, 0);

$pdf->writeHTML($tbl, true, false, false, false,'');

$pdf->writeHTML($end, true, 0, true, 0);




// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Order-details.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
