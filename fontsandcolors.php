<?php
// disable error reporting for production code
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
// Start session
session_name("GalleryBuilder");
include("/home/bitnami/session2DB/Zebra.php");
//	session_start();
// -----------------------
	
$head1 = <<< EOT1
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Fonts Chooser</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<meta NAME="Last-Modified" content="
EOT1;
echo $head1;
echo date ("F d Y H:i:s.", getlastmod()).'">';
$head2 = <<< EOT2
	<meta name="description" content="Font Selector">
	<meta name="copyright" content="Copyright 2021 by IsoBlock.com">
	<meta name="author" content="Bob Wright">
	<meta name="keywords" content="web page">
	<meta name="rating" content="general">
	<meta name="robots" content="index, follow"> 
	<base href="./">
	<link href="./css/bootstrap.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="./css/mdb.min.css">
<link rel='stylesheet' href="./css/colorPalette.css">
<link rel='stylesheet' href="./css/textColorPalette.css">
<link rel='stylesheet' href="./css/LiteThemes.css">
	<link href="./css/SiteFonts.css" media="screen" rel="stylesheet" type="text/css"/>
	<link href="./css/GalleryCreator.css" rel="stylesheet">
	<link href="./css/GalleryBuilder.css" rel="stylesheet">
	<link rel="icon" href="./favicon.ico" type="image/ico">
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
</head>
<body>
<style>
.fcheckbox {
  color: #808080;
  height: 1.5vw;
  width: 1.5vw;
  padding: 1vw 1vw;
  cursor: pointer;
    outline: .2vw solid black;
}
EOT2;
echo $head2;
// list of fonts
$fontdir = './Fonts/';
$fontfiles = array();
$fontlabels = '';
if ($handle = opendir($fontdir)) {
    //echo "Directory handle: $handle\n";
    //echo "Entries:\n";
    /* loop over the directory. */
	while (false !== ($entry = readdir($handle))) {
		if(!(is_dir($fontdir.$entry))) {
			$filenameArray = explode('.', $entry);
			// check the filetype/extension for TTF files
			if (preg_match('/ttf/i', $filenameArray[1])) {
				$fontfiles[] = $filenameArray[0];}
		}
	}
	sort($fontfiles);
	closedir($handle);
}

for ($i = 0; $i <  count($fontfiles); $i++) {
	$fontIndex=key($fontfiles);
	$fontfile=$fontfiles[$fontIndex];
		echo
		'@font-face {'.
		'font-family: "'.$fontfile.'";'.
		'src: url("./Fonts/'.$fontfile.'.ttf") format("truetype");}'.
		'.'.$fontfile.' { font: 2vw '.$fontfile.';}';
		$fontlabels .= '<div style="margin-left: 2vw;"><label class="'.$fontfile.'"><input id="h'.$fontfile.'" class="fcheckbox" type="checkbox" name="Headings" /><span style="margin-left: 3vw;">'.$fontfile.'</span></label><label style="position: absolute;left: 45vw;" class="'.$fontfile.'"><input id="p'.$fontfile.'" class="fcheckbox" type="checkbox" name="Bodytext" /></label></div>';
	next($fontfiles);
}
	
$head2a = <<< EOT2a
</style>
<main class="pageWrapper" id="container">
<h1 style="color:blue; text-align:center;">Choose Caption Fonts</h1>
<!-- quick display of info -->
<h2 style="color:purple; text-align:center;">This page will let you select heading and body fonts for captions.<br>If no font is selected the default choices will be applied.</h2>
<div class="msgBox"><!-- headings font choice -->
<div style="opacity: 0;" class="card col-sm-12 #929fba mdb-color lighten-3 px-sm-0"><br></div>
<div class="card col-sm-11 d-flex flex-column align-items-center shadow-md #b0bec5 blue-grey lighten-3 px-sm-0">
<div class="card-body"><h2 style="color:red;">You may choose ONE optional Heading Font and ONE optional Paragraph Font:</h2></div></div>
<div style="opacity: 0;" class="card col-sm-12 #929fba mdb-color lighten-3 px-sm-0"><br></div>
<h3 style="color:red;">Heading<span style="position: absolute;left: 45vw;">Paragraph</span></h3>
EOT2a;
echo $head2a;
/* =============== */
	echo $fontlabels;

$colrs = <<< EOT3
<div class="card col-sm-11 d-flex flex-column align-items-center shadow-md #b0bec5 blue-grey lighten-3 px-sm-0">
<div class="card-body"><h2>Choose a caption font and background color</h2></div></div>
<div style="opacity: 0;" class="card col-sm-12 #929fba mdb-color lighten-3 px-sm-0"><br></div>
<div class="row mx-1 d-flex col-sm-12">
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: AliceBlue;" id="#F0F8FF"><label style="margin-left: 1vw;"><p><br><input id="id#F0F8FF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;AliceBlue<br>#F0F8FF</p></label></div>
<div class="color-block z-depth-2" style="background-color: AntiqueWhite;" id="#FAEBD7"><label style="margin-left: 1vw;"><p><br><input id="id#FAEBD7" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;AntiqueWhite<br>#FAEBD7</p></label></div>
<div class="color-block z-depth-2" style="background-color: Aqua;" id="#00FFFF"><label style="margin-left: 1vw;"><p><br><input id="id#00FFFF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Aqua<br>#00FFFF</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Aquamarine;" id="#7FFFD4"><label style="margin-left: 1vw;"><p><br><input id="id#7FFFD4" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Aquamarine<br>#7FFFD4</p></label></div>
<div class="color-block z-depth-2" style="background-color: Azure;" id="#F0FFFF"><label style="margin-left: 1vw;"><p><br><input id="id#F0FFFF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Azure<br>#F0FFFF</p></label></div>
<div class="color-block z-depth-2" style="background-color: Beige;" id="#F5F5DC"><label style="margin-left: 1vw;"><p><br><input id="id#F5F5DC" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Beige<br>#F5F5DC</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Bisque;" id="#FFE4C4"><label style="margin-left: 1vw;"><p><br><input id="id#FFE4C4" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Bisque<br>#FFE4C4</p></label></div>
<div class="color-block z-depth-2" style="background-color: Black; color: white;" id="#000000">
<label style="margin-left: 1vw;"><p><br><input id="id#000000" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Black<br>#000000</p></label></div>
<div class="color-block z-depth-2" style="background-color: BlanchedAlmond;" id="#FFEBCD"><label style="margin-left: 1vw;"><p><br><input id="id#FFEBCD" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;BlanchedAlmond<br>#FFEBCD</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Blue; color: white;" id="#0000FF">
<label style="margin-left: 1vw;"><p><br><input id="id#0000FF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Blue<br>#0000FF</p></label></div>
<div class="color-block z-depth-2" style="background-color: BlueViolet; color: white;" id="#8A2BE2"><label style="margin-left: 1vw;"><p><br><input id="id#8A2BE2" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;BlueViolet<br>#8A2BE2</p></label></div>
<div class="color-block z-depth-2" style="background-color: Brown; color: white;" id="#A52A2A"><label style="margin-left: 1vw;"><p><br><input id="id#A52A2A" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Brown<br>#A52A2A</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: BurlyWood;" id="#DEB887"><label style="margin-left: 1vw;"><p><br><input id="id#DEB887" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;BurlyWood<br>#DEB887</p></label></div>
<div class="color-block z-depth-2" style="background-color: CadetBlue;" id="#5F9EA0"><label style="margin-left: 1vw;"><p><br><input id="id#5F9EA0" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;CadetBlue<br>#5F9EA0</p></label></div>
<div class="color-block z-depth-2" style="background-color: Chartreuse;" id="#7FFF00"><label style="margin-left: 1vw;"><p><br><input id="id#7FFF00" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Chartreuse<br>#7FFF00</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Chocolate;" id="#D2691E"><label style="margin-left: 1vw;"><p><br><input id="id#D2691E" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Chocolate<br>#D2691E</p></label></div>
<div class="color-block z-depth-2" style="background-color: Coral;" id="#FF7F50"><label style="margin-left: 1vw;"><p><br><input id="id#FF7F50" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Coral<br>#FF7F50</p></label></div>
<div class="color-block z-depth-2" style="background-color: CornflowerBlue;" id="#6495ED"><label style="margin-left: 1vw;"><p><br><input id="id#6495ED" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;CornflowerBlue<br>#6495ED</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Cornsilk;" id="#FFF8DC"><label style="margin-left: 1vw;"><p><br><input id="id#FFF8DC" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Cornsilk<br>#FFF8DC</p></label></div>
<div class="color-block z-depth-2" style="background-color: Crimson; color: white;" id="#DC143C"><label style="margin-left: 1vw;"><p><br><input id="id#DC143C" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Crimson<br>#DC143C</p></label></div>
<div class="color-block z-depth-2" style="background-color: Cyan;" id="#00FFFF"><label style="margin-left: 1vw;"><p><br><input id="id#00FFFF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Cyan<br>#00FFFF</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: DarkBlue; color: white;" id="#00008B"><label style="margin-left: 1vw;"><p><br><input id="id#00008B" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkBlue<br>#00008B</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkCyan; color: white;" id="#008B8B"><label style="margin-left: 1vw;"><p><br><input id="id#008B8B" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkCyan<br>#008B8B</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkGoldenRod;" id="#B8860B"><label style="margin-left: 1vw;"><p><br><input id="id#B8860B" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkGoldenRod<br>#B8860B</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: DarkGray;" id="#A9A9A9"><label style="margin-left: 1vw;"><p><br><input id="id#A9A9A9" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkGray<br>#A9A9A9</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkGreen; color: white;" id="#006400"><label style="margin-left: 1vw;"><p><br><input id="id#006400" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkGreen<br>#006400</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkKhaki;" id="#BDB76B"><label style="margin-left: 1vw;"><p><br><input id="id#BDB76B" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkKhaki<br>#BDB76B</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: DarkMagenta; color: white;" id="#8B008B"><label style="margin-left: 1vw;"><p><br><input id="id#8B008B" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkMagenta<br>#8B008B</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkOliveGreen; color: white;" id="#556B2F"><label style="margin-left: 1vw;"><p><br><input id="id#556B2F" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkOliveGreen<br>#556B2F</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkOrange;" id="#FF8C00"><label style="margin-left: 1vw;"><p><br><input id="id#FF8C00" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkOrange<br>#FF8C00</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: DarkOrchid; color: white;" id="#9932CC"><label style="margin-left: 1vw;"><p><br><input id="id#9932CC" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkOrchid<br>#9932CC</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkRed; color: white;" id="#8B0000"><label style="margin-left: 1vw;"><p><br><input id="id#8B0000" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkRed<br>#8B0000</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkSalmon;" id="#E9967A"><label style="margin-left: 1vw;"><p><br><input id="id#E9967A" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkSalmon<br>#E9967A</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: DarkSeaGreen;" id="#8FBC8F"><label style="margin-left: 1vw;"><p><br><input id="id#8FBC8F" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkSeaGreen<br>#8FBC8F</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkSlateBlue; color: white;" id="#483D8B"><label style="margin-left: 1vw;"><p><br><input id="id#483D8B" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkSlateBlue<br>#483D8B</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkSlateGray; color: white;" id="#2F4F4F"><label style="margin-left: 1vw;"><p><br><input id="id#2F4F4F" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkSlateGray<br>#2F4F4F</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: DarkTurquoise;" id="#00CED1"><label style="margin-left: 1vw;"><p><br><input id="id#00CED1" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkTurquoise<br>#00CED1</p></label></div>
<div class="color-block z-depth-2" style="background-color: DarkViolet; color: white;" id="#9400D3"><label style="margin-left: 1vw;"><p><br><input id="id#9400D3" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DarkViolet<br>#9400D3</p></label></div>
<div class="color-block z-depth-2" style="background-color: DeepPink;" id="#FF1493"><label style="margin-left: 1vw;"><p><br><input id="id#FF1493" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DeepPink<br>#FF1493</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: DeepSkyBlue;" id="#00BFFF"><label style="margin-left: 1vw;"><p><br><input id="id#00BFFF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DeepSkyBlue<br>#00BFFF</p></label></div>
<div class="color-block z-depth-2" style="background-color: DimGray; color: white;" id="#696969"><label style="margin-left: 1vw;"><p><br><input id="id#696969" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DimGray<br>#696969</p></label></div>
<div class="color-block z-depth-2" style="background-color: DodgerBlue; color: white;" id="#1E90FF"><label style="margin-left: 1vw;"><p><br><input id="id#1E90FF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;DodgerBlue<br>#1E90FF</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: FireBrick; color: white;" id="#B22222"><label style="margin-left: 1vw;"><p><br><input id="id#B22222" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;FireBrick<br>#B22222</p></label></div>
<div class="color-block z-depth-2" style="background-color: FloralWhite;" id="#FFFAF0"><label style="margin-left: 1vw;"><p><br><input id="id#FFFAF0" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;FloralWhite<br>#FFFAF0</p></label></div>
<div class="color-block z-depth-2" style="background-color: ForestGreen; color: white;" id="#228B22"><label style="margin-left: 1vw;"><p><br><input id="id#228B22" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;ForestGreen<br>#228B22</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Fuchsia;" id="#FF00FF"><label style="margin-left: 1vw;"><p><br><input id="id#FF00FF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Fuchsia<br>#FF00FF</p></label></div>
<div class="color-block z-depth-2" style="background-color: Gainsboro;" id="#DCDCDC"><label style="margin-left: 1vw;"><p><br><input id="id#DCDCDC" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Gainsboro<br>#DCDCDC</p></label></div>
<div class="color-block z-depth-2" style="background-color: GhostWhite;" id="#F8F8FF"><label style="margin-left: 1vw;"><p><br><input id="id#F8F8FF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;GhostWhite<br>#F8F8FF</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Gold;" id="#FFD700"><label style="margin-left: 1vw;"><p><br><input id="id#FFD700" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Gold<br>#FFD700</p></label></div>
<div class="color-block z-depth-2" style="background-color: GoldenRod;" id="#DAA520"><label style="margin-left: 1vw;"><p><br><input id="id#DAA520" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;GoldenRod<br>#DAA520</p></label></div>
<div class="color-block z-depth-2" style="background-color: Gray; color: white;" id="#808080"><label style="margin-left: 1vw;"><p><br><input id="id#808080" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Gray<br>#808080</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Green; color: white;" id="#008000><label style="margin-left: 1vw;"><p><br><input id="id#008000" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Green<br>#008000</p></label></div>
<div class="color-block z-depth-2" style="background-color: GreenYellow;" id="#ADFF2F"><label style="margin-left: 1vw;"><p><br><input id="id#ADFF2F" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;GreenYellow<br>#ADFF2F</p></label></div>
<div class="color-block z-depth-2" style="background-color: HoneyDew;" id="#F0FFF0"><label style="margin-left: 1vw;"><p><br><input id="id#F0FFF0" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;HoneyDew<br>#F0FFF0</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: HotPink;" id="#FF69B4"><label style="margin-left: 1vw;"><p><br><input id="id#FF69B4" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;HotPink<br>#FF69B4</p></label></div>
<div class="color-block z-depth-2" style="background-color: IndianRed; color: white;" id="#CD5C5C"><label style="margin-left: 1vw;"><p><br><input id="id#CD5C5C" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;IndianRed<br>#CD5C5C</p></label></div>
<div class="color-block z-depth-2" style="background-color: Indigo; color: white;" id="#4B0082"><label style="margin-left: 1vw;"><p><br><input id="id#4B0082" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Indigo<br>#4B0082</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Ivory;" id="#FFFFF0"><label style="margin-left: 1vw;"><p><br><input id="id#FFFFF0" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Ivory<br>#FFFFF0</p></label></div>
<div class="color-block z-depth-2" style="background-color: Khaki;" id="#F0E68C"><label style="margin-left: 1vw;"><p><br><input id="id#F0E68C" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Khaki<br>#F0E68C</p></label></div>
<div class="color-block z-depth-2" style="background-color: Lavender;" id="#E6E6FA"><label style="margin-left: 1vw;"><p><br><input id="id#E6E6FA" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Lavender<br>#E6E6FA</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: LavenderBlush;" id="#FFF0F5"><label style="margin-left: 1vw;"><p><br><input id="id#FFF0F5" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LavenderBlush<br>#FFF0F5</p></label></div>
<div class="color-block z-depth-2" style="background-color: LawnGreen;" id="#7CFC00"><label style="margin-left: 1vw;"><p><br><input id="id#7CFC00" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LawnGreen<br>#7CFC00</p></label></div>
<div class="color-block z-depth-2" style="background-color: LemonChiffon;" id="#7CFC00"><label style="margin-left: 1vw;"><p><br><input id="id#FFFACD" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LemonChiffon<br>#FFFACD</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: LightBlue;" id="#ADD8E6"><label style="margin-left: 1vw;"><p><br><input id="id#ADD8E6" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightBlue<br>#ADD8E6</p></label></div>
<div class="color-block z-depth-2" style="background-color: LightCoral;" id="#F08080"><label style="margin-left: 1vw;"><p><br><input id="id#F08080" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightCoral<br>#F08080</p></label></div>
<div class="color-block z-depth-2" style="background-color: LightCyan;" id="#E0FFFF"><label style="margin-left: 1vw;"><p><br><input id="id#E0FFFF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightCyan<br>#E0FFFF</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: LightGoldenRodYellow;" id="#FAFAD2"><label style="margin-left: 1vw;"><p><br><input id="id#FAFAD2" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightGoldenRodYellow<br>#FAFAD2</p></label></div>
<div class="color-block z-depth-2" style="background-color: LightGray;" id="#D3D3D3"><label style="margin-left: 1vw;"><p><br><input id="id#D3D3D3" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightGray<br>#D3D3D3</p></label></div>
<div class="color-block z-depth-2" style="background-color: LightGreen;" id="#90EE90"><label style="margin-left: 1vw;"><p><br><input id="id#90EE90" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightGreen<br>#90EE90</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: LightPink;" id="#FFB6C1"><label style="margin-left: 1vw;"><p><br><input id="id#FFB6C1" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightPink<br>#FFB6C1</p></label></div>
<div class="color-block z-depth-2" style="background-color: LightSalmon;" id="#FFA07A"><label style="margin-left: 1vw;"><p><br><input id="id#FFA07A" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightSalmon<br>#FFA07A</p></label></div>
<div class="color-block z-depth-2" style="background-color: LightSeaGreen; color: white;" id="#20B2AA"><label style="margin-left: 1vw;"><p><br><input id="id#20B2AA" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightSeaGreen<br>#20B2AA</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: LightSkyBlue;" id="#87CEFA"><label style="margin-left: 1vw;"><p><br><input id="id#87CEFA" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightSkyBlue<br>#87CEFA</p></label></div>
<div class="color-block z-depth-2" style="background-color: LightSlateGrey; color: white;" id="#778899"><label style="margin-left: 1vw;"><p><br><input id="id#778899" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightSlateGrey<br>#778899</p></label></div>
<div class="color-block z-depth-2" style="background-color: LightSteelBlue;" id="#B0C4DE"><label style="margin-left: 1vw;"><p><br><input id="id#B0C4DE" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightSteelBlue<br>#B0C4DE</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: LightYellow;" id="#FFFFE0"><label style="margin-left: 1vw;"><p><br><input id="id#FFFFE0" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LightYellow<br>#FFFFE0</p></label></div>
<div class="color-block z-depth-2" style="background-color: Lime;" id="#00FF00"><label style="margin-left: 1vw;"><p><br><input id="id#00FF00" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Lime<br>#00FF00</p></label></div>
<div class="color-block z-depth-2" style="background-color: LimeGreen;" id="#32CD32"><label style="margin-left: 1vw;"><p><br><input id="id#32CD32" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;LimeGreen<br>#32CD32</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Linen;" id="#FAF0E6"><label style="margin-left: 1vw;"><p><br><input id="id#FAF0E6" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Linen<br>#FAF0E6</p></label></div>
<div class="color-block z-depth-2" style="background-color: Magenta;" id="#FF00FF"><label style="margin-left: 1vw;"><p><br><input id="id#FF00FF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Magenta<br>#FF00FF</p></label></div>
<div class="color-block z-depth-2" style="background-color: Maroon; color: white;" id="#800000"><label style="margin-left: 1vw;"><p><br><input id="id#800000" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Maroon<br>#800000</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: MediumAquaMarine;" id="#66CDAA"><label style="margin-left: 1vw;"><p><br><input id="id#66CDAA" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumAquaMarine<br>#66CDAA</p></label></div>
<div class="color-block z-depth-2" style="background-color: MediumBlue; color: white;" id="#0000CD"><label style="margin-left: 1vw;"><p><br><input id="id#0000CD" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumBlue<br>#0000CD</p></label></div>
<div class="color-block z-depth-2" style="background-color: MediumOrchid; color: white;" id="#BA55D3"><label style="margin-left: 1vw;"><p><br><input id="id#BA55D3" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumOrchid<br>#BA55D3</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: MediumPurple; color: white;" id="#9370DB"><label style="margin-left: 1vw;"><p><br><input id="id#9370DB" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumPurple<br>#9370DB</p></label></div>
<div class="color-block z-depth-2" style="background-color: MediumSeaGreen; color: white;" id="#3CB371"><label style="margin-left: 1vw;"><p><br><input id="id#3CB371" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumSeaGreen<br>#3CB371</p></label></div>
<div class="color-block z-depth-2" style="background-color: MediumSlateBlue; color: white;" id="#7B68EE"><label style="margin-left: 1vw;"><p><br><input id="id#7B68EE" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumSlateBlue<br>#7B68EE</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: MediumSpringGreen;" id="#00FA9A"><label style="margin-left: 1vw;"><p><br><input id="id#00FA9A" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumSpringGreen<br>#00FA9A</p></label></div>
<div class="color-block z-depth-2" style="background-color: MediumTurquoise; color: white;" id="#48D1CC"><label style="margin-left: 1vw;"><p><br><input id="id#48D1CC" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumTurquoise<br>#48D1CC</p></label></div>
<div class="color-block z-depth-2" style="background-color: MediumVioletRed; color: white;" id="#C71585"><label style="margin-left: 1vw;"><p><br><input id="id#C71585" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MediumVioletRed<br>#C71585</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: MidnightBlue; color: white;" id="#191970"><label style="margin-left: 1vw;"><p><br><input id="id#191970" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MidnightBlue<br>#191970</p></label></div>
<div class="color-block z-depth-2" style="background-color: MintCream;" id="#F5FFFA"><label style="margin-left: 1vw;"><p><br><input id="id#F5FFFA" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MintCream<br>#F5FFFA</p></label></div>
<div class="color-block z-depth-2" style="background-color: MistyRose;" id="#FFE4E1"><label style="margin-left: 1vw;"><p><br><input id="id#FFE4E1" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;MistyRose<br>#FFE4E1</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Moccasin;" id="#FFE4B5"><label style="margin-left: 1vw;"><p><br><input id="id#FFE4B5" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Moccasin<br>#FFE4B5</p></label></div>
<div class="color-block z-depth-2" style="background-color: NavajoWhite;" id="#FFDEAD"><label style="margin-left: 1vw;"><p><br><input id="id#FFDEAD" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;NavajoWhite<br>#FFDEAD</p></label></div>
<div class="color-block z-depth-2" style="background-color: Navy; color: white;" id="#000080"><label style="margin-left: 1vw;"><p><br><input id="id#000080" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Navy<br>#000080</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: OldLace;" id="#FDF5E6"><label style="margin-left: 1vw;"><p><br><input id="id#FDF5E6" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;OldLace<br>#FDF5E6</p></label></div>
<div class="color-block z-depth-2" style="background-color: Olive; color: white;" id="#808000"><label style="margin-left: 1vw;"><p><br><input id="id#808000" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Olive<br>#808000</p></label></div>
<div class="color-block z-depth-2" style="background-color: OliveDrab; color: white;" id="#6B8E23"><label style="margin-left: 1vw;"><p><br><input id="id#6B8E23" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;OliveDrab<br>#6B8E23</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Orange;" id="#FFA500"><label style="margin-left: 1vw;"><p><br><input id="id#FFA500" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Orange<br>#FFA500</p></label></div>
<div class="color-block z-depth-2" style="background-color: OrangeRed; color: white;" id="#FF4500"><label style="margin-left: 1vw;"><p><br><input id="id#FF4500" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;OrangeRed<br>#FF4500</p></label></div>
<div class="color-block z-depth-2" style="background-color: Orchid;" id="#DA70D6"><label style="margin-left: 1vw;"><p><br><input id="id#DA70D6" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Orchid<br>#DA70D6</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: PaleGoldenRod;" id="#EEE8AA"><label style="margin-left: 1vw;"><p><br><input id="id#EEE8AA" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;PaleGoldenRod<br>#EEE8AA</p></label></div>
<div class="color-block z-depth-2" style="background-color: PaleGreen;" id="#98FB98"><label style="margin-left: 1vw;"><p><br><input id="id#98FB98" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;PaleGreen<br>#98FB98</p></label></div>
<div class="color-block z-depth-2" style="background-color: PaleTurquoise;" id="#AFEEEE"><label style="margin-left: 1vw;"><p><br><input id="id#AFEEEE" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;PaleTurquoise<br>#AFEEEE</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: PaleVioletRed;" id="#DB7093"><label style="margin-left: 1vw;"><p><br><input id="id#DB7093" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;PaleVioletRed<br>#DB7093</p></label></div>
<div class="color-block z-depth-2" style="background-color: PapayaWhip;" id="#FFEFD5"><label style="margin-left: 1vw;"><p><br><input id="id#FFEFD5" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;PapayaWhip<br>#FFEFD5</p></label></div>
<div class="color-block z-depth-2" style="background-color: PeachPuff;" id="#FFDAB9"><label style="margin-left: 1vw;"><p><br><input id="id#FFDAB9" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;PeachPuff<br>#FFDAB9</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Peru;" id="#CD853F"><label style="margin-left: 1vw;"><p><br><input id="id#CD853F" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Peru<br>#CD853F</p></label></div>
<div class="color-block z-depth-2" style="background-color: Pink;" id="#FFC0CB"><label style="margin-left: 1vw;"><p><br><input id="id#FFC0CB" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Pink<br>#FFC0CB</p></label></div>
<div class="color-block z-depth-2" style="background-color: Plum;" id="#DDA0DD"><label style="margin-left: 1vw;"><p><br><input id="id#DDA0DD" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Plum<br>#DDA0DD</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: PowderBlue;" id="#B0E0E6"><label style="margin-left: 1vw;"><p><br><input id="id#B0E0E6" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;PowderBlue<br>#B0E0E6</p></label></div>
<div class="color-block z-depth-2" style="background-color: Purple; color: white;" id="#800080"><label style="margin-left: 1vw;"><p><br><input id="id#800080" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Purple<br>#800080</p></label></div>
<div class="color-block z-depth-2" style="background-color: RebeccaPurple; color: white;" id="#663399"><label style="margin-left: 1vw;"><p><br><input id="id#663399" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;RebeccaPurple<br>#663399</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Red; color: white;" id="#FF0000"><label style="margin-left: 1vw;"><p><br><input id="id#FF0000" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Red<br>#FF0000</p></label></div>
<div class="color-block z-depth-2" style="background-color: RosyBrown; color: white;" id="#BC8F8F"><label style="margin-left: 1vw;"><p><br><input id="id#BC8F8F" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;RosyBrown<br>#BC8F8F</p></label></div>
<div class="color-block z-depth-2" style="background-color: RoyalBlue; color: white;" id="#4169E1"><label style="margin-left: 1vw;"><p><br><input id="id#4169E1" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;RoyalBlue<br>#4169E1v</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: SaddleBrown; color: white;" id="#8B4513"><label style="margin-left: 1vw;"><p><br><input id="id#8B4513" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SaddleBrown<br>#8B4513</p></label></div>
<div class="color-block z-depth-2" style="background-color: Salmon;" id="#FA8072"><label style="margin-left: 1vw;"><p><br><input id="id#FA8072" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Salmon<br>#FA8072</p></label></div>
<div class="color-block z-depth-2" style="background-color: SandyBrown;" id="#F4A460"><label style="margin-left: 1vw;"><p><br><input id="id#F4A460" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SandyBrown<br>#F4A460</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: SeaGreen; color: white;" id="#2E8B57"><label style="margin-left: 1vw;"><p><br><input id="id#2E8B57" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SeaGreen<br>#2E8B57</p></label></div>
<div class="color-block z-depth-2" style="background-color: SeaShell;" id="#FFF5EE"><label style="margin-left: 1vw;"><p><br><input id="id#FFF5EE" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SeaShell<br>#FFF5EE</p></label></div>
<div class="color-block z-depth-2" style="background-color: Sienna; color: white;" id="#A0522D"><label style="margin-left: 1vw;"><p><br><input id="id#A0522D" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Sienna<br>#A0522D</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Silver;" id="#C0C0C0"><label style="margin-left: 1vw;"><p><br><input id="id#C0C0C0" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Silver<br>#C0C0C0v</p></label></div>
<div class="color-block z-depth-2" style="background-color: SkyBlue;" id="#87CEEB"><label style="margin-left: 1vw;"><p><br><input id="id#87CEEB" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SkyBlue<br>#87CEEB</p></label></div>
<div class="color-block z-depth-2" style="background-color: SlateBlue; color: white;" id="#6A5ACD"><label style="margin-left: 1vw;"><p><br><input id="id#6A5ACD" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SlateBlue<br>#6A5ACD</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: SlateGray; color: white;" id="#708090"><label style="margin-left: 1vw;"><p><br><input id="id#708090" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SlateGray<br>#708090</p></label></div>
<div class="color-block z-depth-2" style="background-color: Snow;" id="#FFFAFA"><label style="margin-left: 1vw;"><p><br><input id="id#FFFAFA" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Snow<br>#FFFAFA</p></label></div>
<div class="color-block z-depth-2" style="background-color: SpringGreen;" id="#00FF7F"><label style="margin-left: 1vw;"><p><br><input id="id#00FF7F" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SpringGreen<br>#00FF7F</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: SteelBlue; color: white;" id="#4682B4"><label style="margin-left: 1vw;"><p><br><input id="id#4682B4" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;SteelBlue<br>#4682B4</p></label></div>
<div class="color-block z-depth-2" style="background-color: Tan;" id="#D2B48C"><label style="margin-left: 1vw;"><p><br><input id="id#D2B48C" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Tan<br>#D2B48C</p></label></div>
<div class="color-block z-depth-2" style="background-color: Teal; color: white;" id="#008080"><label style="margin-left: 1vw;"><p><br><input id="id#008080" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Teal<br>#008080</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Thistle;" id="#D8BFD8"><label style="margin-left: 1vw;"><p><br><input id="id#D8BFD8" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Thistle<br>#D8BFD8</p></label></div>
<div class="color-block z-depth-2" style="background-color: Tomato;" id="#FF6347"><label style="margin-left: 1vw;"><p><br><input id="id#FF6347" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Tomato<br>#FF6347</p></label></div>
<div class="color-block z-depth-2" style="background-color: Turquoise;" id="#40E0D0"><label style="margin-left: 1vw;"><p><br><input id="id#40E0D0" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Turquoise<br>#40E0D0</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: Violet;" id="#EE82EE"><label style="margin-left: 1vw;"><p><br><input id="id#EE82EE" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Violet<br>#EE82EE</p></label></div>
<div class="color-block z-depth-2" style="background-color: Wheat;" id="#F5DEB3"><label style="margin-left: 1vw;"><p><br><input id="id#F5DEB3" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Wheat<br>#F5DEB3</p></label></div>
<div class="color-block z-depth-2" style="background-color: White;" id="#FFFFFF"><label style="margin-left: 1vw;"><p><br><input id="id#FFFFFF" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;White<br>#FFFFFF</p></label></div>
</div>
<div class="col-md-4 mb-4">
<div class="color-block z-depth-2" style="background-color: WhiteSmoke;" id="#F5F5F5"><label style="margin-left: 1vw;"><p><br><input id="id#F5F5F5" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;WhiteSmoke<br>#F5F5F5</p></label></div>
<div class="color-block z-depth-2" style="background-color: Yellow;" id="#FFFF00"><label style="margin-left: 1vw;"><p><br><input id="id#FFFF00" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;Yellow<br>#FFFF00</p></label></div>
<div class="color-block z-depth-2" style="background-color: YellowGreen;" id="#9ACD32"><label style="margin-left: 1vw;"><p><br><input id="id#9ACD32" class="fcheckbox" type="checkbox" name="Capcolor" />&ensp;YellowGreen<br>#9ACD32</p></label></div>
    </div>
</div>
EOT3;
echo $colrs;
?>
<form class="d-flex col-sm-11 flex-column align-items-center shadow-md<br>#b0bec5 blue-grey lighten-3 px-sm-0 infoBox" name="hfontinfo" action="saveFonts.php" method="post" enctype="text">
<label>Heading Font CSS:<br><textarea id="hfontval" name="hfontinfo" rows="4" cols="64"></textarea></label>
<label>Paragraph Font CSS:<br><textarea id="pfontval" name="pfontinfo" rows="4" cols="64"></textarea></label>
<label>Caption Background:<br><textarea  id="cbval" name="cbinfo" rows="1" cols="64"></textarea></label>
<br>

<style id="xmplcbox"></style>
<style id="xmplhdgs"></style>
<style id="xmplbody"></style>
<div class="xmplc d-flex col-sm-11 flex-column align-items-center shadow-md px-sm-0 msgBox">
<h1 class="xmplh">THIS IS AN Example TOP LEVEL Heading</h1>
<h2 class="xmplh">This is an EXAMPLE second level HEADING</h2>
<h3 class="xmplh">This is an example THIRD LEVEL HEADING</h3>
<br>
<p class="xmplp mx-3">This is an example of the paragraph text font being used in paragraph text. It's a short and saucy paragraph that has no existential meaning. Or does it?<br><br>This is an <b><i>example</i></b> of the paragraph text font being used with <b>Boldface</b> and <i>italics</i> in paragraph text. It's a short and saucy paragraph that has existential meaning because of the <i>text embellishments</i>. Or does it?</p></div>
<br><label>Save the selected Fonts and Colors:<br><input type="submit" value="Apply"></label>
</form><br>
</div>
	<footer class="d-flex col-sm-12 flex-column align-items-center shadow-md<br>#b0bec5 blue-grey lighten-3 px-sm-0 infoBox" style="margin-left:0;" id="GalleryFooter">
	<nav id="navFooter"><p><a id="prevpagebutton" href="./fontsandcolors.php" title="return to the get captions page">❮ Previous</a>&nbsp;&copy; 2021 by&nbsp;<span><svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 40.000000 40.000000" preserveAspectRatio="xMidYMid meet">
	<g transform="translate(0.000000,40.000000) scale(0.100000,-0.100000)"
	fill="#000000" stroke="none">
	<path d="M97 323 l-97 -78 0 -122 0 -123 200 0 201 0 -3 127 -3 127 -93 73
	c-52 40 -97 73 -101 73 -4 0 -51 -35 -104 -77z m184 -9 c43 -30 79 -59 79 -63
	0 -6 -63 -41 -75 -41 -3 0 -5 14 -5 30 l0 30 -85 0 -85 0 0 -30 c0 -16 -4 -30
	-10 -30 -16 0 -60 23 -60 31 0 9 142 128 153 129 5 0 45 -25 88 -56z m97 -177
	c1 -48 -1 -87 -5 -87 -10 0 -163 94 -163 100 0 9 144 79 155 76 6 -1 11 -42
	13 -89z m-273 51 c36 -18 65 -35 65 -38 0 -6 -125 -101 -143 -108 -4 -2 -7 37
	-7 87 0 53 4 91 10 91 5 0 39 -14 75 -32z m174 -99 c45 -29 81 -56 81 -60 0
	-5 -73 -9 -161 -9 -149 0 -160 1 -148 17 17 19 130 103 140 103 4 0 44 -23 88
	-51z"/>
	</g>
	</svg></span>&nbsp;<a href="mailto:bob_wright@isoblock.com">Bob Wright.</a>&nbsp;Last modified&ensp;<?php echo date ("F d Y H:i:s.", getlastmod()) ?>&ensp;<a id="nextpagebutton" href="./fontsandcolors.php" title="go to the Logo Image chooser">Next ❯</a></p></nav>
	</footer>
  <script type="text/javascript" src="./js/jquery.min.js"></script>
  <script type="text/javascript" src="./js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/mdb.min.js"></script>
<script>
var $defhfont = 'Roboto-Bold';
var $defpfont = 'Merriweather-Regular';
var $defccolr = 'blue-grey<br>#b0bec5';
$("#hfontval").html('@font-face {font-family: "'+$defhfont+'"; src: url("./Fonts/'+$defhfont+'.ttf") format("truetype");} h1 { font: 2vw '+$defhfont+';} h2 { font: 1.75vw '+$defhfont+';} h3 { font: 1.5vw '+$defhfont+';}');
$("#pfontval").html('@font-face {font-family: "'+$defpfont+'"; src: url("./Fonts/'+$defpfont+'.ttf") format("truetype");} .card-body, p { font: 1.5vw '+$defpfont+';} ');
var $str = $defccolr.substr(-7, 7);
$("#cbval").html('.xmplc {background: '+ $str +';}');
$("#xmplhdgs").html('@font-face {font-family: "'+$defhfont+'"; src: url("./Fonts/'+$defhfont+'.ttf") format("truetype");} h1.xmplh { font: 2vw '+$defhfont+';} h2.xmplh { font: 1.75vw '+$defhfont+';} h3.xmplh { font: 1.5vw '+$defhfont+';}');
$("#xmplbody").html('@font-face {font-family: "'+$defpfont+'"; src: url("./Fonts/'+$defpfont+'.ttf") format("truetype");} p.xmplp { font: 1.5vw '+$defpfont+';}');
$("#xmplcbox").html('.xmplc {background: '+ $str +';}');
$('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
	console.info(this.checked +" "+ this.id +" "+ this.name);
var $id = this.id;
	if(this.name == "Headings") {
	var $id = $id.substring(1);
	if(this.checked == true) {
		$("#hfontval").html('@font-face {font-family: "'+$id+'"; src: url("./Fonts/'+$id+'.ttf") format("truetype");} h1 { font: 2vw '+$id+';} h2 { font: 1.75vw '+$id+';} h3 { font: 1.5vw '+$id+';}');
		$("#xmplhdgs").html('@font-face {font-family: "'+$id+'"; src: url("./Fonts/'+$id+'.ttf") format("truetype");} h1.xmplh { font: 2vw '+$id+';} h2.xmplh { font: 1.75vw '+$id+';} h3.xmplh { font: 1.5vw '+$id+';}');
	} else {
		//$("#hfontval").html('');
		$("#hfontval").html('@font-face {font-family: "'+$defhfont+'"; src: url("./Fonts/'+$defhfont+'.ttf") format("truetype");} h1 { font: 2vw '+$defhfont+';} h2 { font: 1.75vw '+$defhfont+';} h3 { font: 1.5vw '+$defhfont+';}');
		$("#xmplhdgs").html('@font-face {font-family: "'+$defhfont+'"; src: url("./Fonts/'+$defhfont+'.ttf") format("truetype");} h1.xmplh { font: 2vw '+$defhfont+';} h2.xmplh { font: 1.75vw '+$defhfont+';} h3.xmplh { font: 1.5vw '+$defhfont+';}');
	}}
	if(this.name == "Bodytext") {
	var $id = $id.substring(1);
	if(this.checked == true) {
		$("#pfontval").html('@font-face {font-family: "'+$id+'"; src: url("./Fonts/'+$id+'.ttf") format("truetype");} p { font: 2vw '+$id+';} ');
		$("#xmplbody").html('@font-face {font-family: "'+$id+'"; src: url("./Fonts/'+$id+'.ttf") format("truetype");} p.xmplp { font: 1.5vw '+$id+';}');
		} else {
		$("#pfontval").html('@font-face {font-family: "'+$defpfont+'"; src: url("./Fonts/'+$defpfont+'.ttf") format("truetype");} p { font: 1.5vw '+$defpfont+';} ');
		$("#xmplbody").html('@font-face {font-family: "'+$defpfont+'"; src: url("./Fonts/'+$defpfont+'.ttf") format("truetype");} p.xmplp { font: 1.5vw '+$defpfont+';}');
	}}

if(this.name == "Capcolor") {
	if(this.checked == true) {
		var $str = $id.substr(-7, 7);
		var div1 = document.getElementById($str);
		var ccolors = div1.getAttribute('style');
		$("#xmplcbox").html('.xmplc {'+ccolors+'}');
		$("#cbval").html('.xmplc {'+ccolors+'}');
	} else {
		var $str = $defccolr.substr(-7, 7);
		$("#xmplcbox").html('.xmplc {background: '+ $str +';}');
		$("#cbval").html('.xmplc {background: '+ $str +';}');
	}}
});
</script>
</main>
</body>
</html>
