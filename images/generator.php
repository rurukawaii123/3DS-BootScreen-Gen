<?php
header('Content-Type: image/png');

	$OS = isset($_GET['os']) ? strtolower($_GET['os']) : "luma611";
	$MODEL = isset($_GET['model']) ? strtolower($_GET['model']) : "3ds";
	$REGION = isset($_GET['region']) ? strtolower($_GET['region']) : "usa";
	$SD = isset($_GET['sd']) ? strtolower($_GET['sd']) : "2g";

	$im = imagecreatetruecolor(400, 240);

	$blanco = imagecolorallocate($GLOBALS["im"], 255, 255, 255);
	$gris = imagecolorallocate($GLOBALS["im"], 128, 128, 128);
	$negro = imagecolorallocate($GLOBALS["im"], 0, 0, 0);

	$fuente = '../fonts/PxPlus_IBM_VGA8.ttf';

function setOS(){

	switch ($GLOBALS["OS"]) {
		case 'luma611': $os = 'Luma3DS v6.1.1'; $subos2 = '2016, AuroraWright';	break;
		case 'luma601': $os = 'Luma3DS v6.0.1';	$subos2 = '2016, AuroraWright';	break;
		case 'luma6': 	$os = 'Luma3DS v6.0';	$subos2 = '2016, AuroraWright';	break;
		case 'mhx31': 	$os = 'Menuhax v3.1';	$subos2 = '2016, yellows8';	break;
		case 'mhx30':	$os = 'Menuhax v3.0';	$subos2 = '2016, yellows8';	break;
		case 'mhx22':	$os = 'Menuhax v2.2';	$subos2 = '2016, yellows8';	break;
		case 'mhx21':	$os = 'Menuhax v2.1';	$subos2 = '2015, yellows8';	break;
		default:	$os = '*hax 2.7 gamma';	$subos2 = '2016, yellows8'; 	break;
	}

	$subos = 'Copyright (C)';

	imagettftext($GLOBALS["im"], 12, 0, 25, 30, $GLOBALS["gris"], $GLOBALS["fuente"], $os);
	imagettftext($GLOBALS["im"], 12, 0, 25, 45, $GLOBALS["gris"], $GLOBALS["fuente"], $subos);
	imagettftext($GLOBALS["im"], 12, 0, 135, 45, $GLOBALS["gris"], $GLOBALS["fuente"], $subos2);

}

function setRegion(){

	switch ($GLOBALS["REGION"]){
		case 'eur':	return 'EUR'; 	break;
		case 'usa':	return 'USA'; 	break;
		case 'jpn':	return 'JPN';	break;
		default:	break;
	}
}

function setModel(){

	$region = setRegion();

	switch ($GLOBALS["MODEL"]){
		case '3ds':	$model = 'Nintendo 3DS CTR-001(' . $region . ')';	break;
		case '3dsxl':	$model = 'Nintendo 3DS XL SPR-001(' . $region . ')';	break;
		case '2ds':	$model = 'Nintendo 2DS FTR-001(' . $region . ')';	break;
		case 'n3ds':	$model = 'New Nintendo 3DS KTR-001(' . $region . ')';	$isnew = true;	break;
		case 'n3dsxl':	$model = 'New Nintendo 3DS XL RED-001(' . $region . ')';	$isnew = true;	break;
		default: break;
	}

	if($isnew){	$cpu = ': Quad-core ARM11 MPCore';	$mem = ': 262144K OK';	}
	else{	$cpu = ': Dual-core ARM11 MPCore';	$mem = ': 131072K OK';	}



	imagettftext($GLOBALS["im"], 12, 0, 0, 93, $GLOBALS["gris"], $GLOBALS["fuente"], $model);
	imagettftext($GLOBALS["im"], 12, 0, 0, 125, $GLOBALS["gris"], $GLOBALS["fuente"], 'Main Processor');
	imagettftext($GLOBALS["im"], 12, 0, 160, 125, $GLOBALS["gris"], $GLOBALS["fuente"], $cpu);
	imagettftext($GLOBALS["im"], 12, 0, 0, 140, $GLOBALS["gris"], $GLOBALS["fuente"], 'Memory Testing');
	imagettftext($GLOBALS["im"], 12, 0, 160, 140, $GLOBALS["gris"], $GLOBALS["fuente"], $mem);
}

function setSD(){

	$sd = strtoupper($GLOBALS["SD"]);
	return $sd;

}

function setNAND(){

	switch ($GLOBALS["MODEL"]){
		case 'n3ds':	return '1933312K NAND';	break;
		case 'n3dsxl':	return '1933312K NAND';	break;
		default:	return '965632K NAND';	break;
	}
}

function setSpace(){

	$nand = setNAND();
	$sd = setSD();

	imagettftext($GLOBALS["im"], 12, 0, 0, 155, $GLOBALS["gris"], $GLOBALS["fuente"], 'Detecting Primary Master ... ' .  $nand);
	imagettftext($GLOBALS["im"], 12, 0, 0, 170, $GLOBALS["gris"], $GLOBALS["fuente"], 'Detecting Primary Slave ... ' .  $sd);


}


function render(){

	setOS();
	setModel();
	setSpace();


	imagepng($GLOBALS["im"]);
}

render();

?>
