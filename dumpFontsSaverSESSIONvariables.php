<?php
/*
 * filename: dumFontsSaverSESSIONvariables.php
 * this code saves font and background color for captions
*/

// disable error reporting for production code
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
// Start session
session_name("Storybook");
include("/home/bitnami/session2DB/Zebra.php");
//	session_start();
	if(isset($_SESSION["hfontinfo"])){
		$hfontinfo = $_SESSION["hfontinfo"];
	} else {
		$hfontinfo = "The hfontinfo variable is not set"; }
	if(isset($_SESSION["pfontinfo"])){
		$pfontinfo = $_SESSION["pfontinfo"];
	} else {
		$pfontinfo = "The pfontinfo variable is not set"; }
	if(isset($_SESSION["cbinfo"])){
		$cbinfo = $_SESSION["cbinfo"];
	} else {
		$cbinfo = "The cbinfo variable is not set"; }
	header("Refresh: 6; URL=./FontsChooser.php");
	echo "Saved the font and background color choices<br>
	as SESSION variables.<br>Returning to Chooser in 6 seconds.<br>";
		echo '<br>'.$hfontinfo.'<br>';
		echo '<br>'.$pfontinfo.'<br>';
		echo '<br>'.$cbinfo.'<br>';
?>