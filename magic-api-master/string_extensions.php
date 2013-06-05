<?php
function str_in_str($needle, $haystack) {
  return (strpos($haystack, $needle) !== false);
}



function strip_quotes($s){
	str_replace('"', "", $s);
	str_replace("'", "", $s);
	return $s;
	}

/*
function strip_quotes($s){
	$s = trim($s, ["'", "\""]);
	return $s;
	}
*/	

/*  ~~original
function strip_quotes($s){
	$s = trim($s);
	return str_replace(["\'","\""],"",$s);
}
*/
?>