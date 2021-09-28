<?php

	$sDataPath = 'data/users.json';

	if (!is_file($sDataPath)) exit('Users data file missing.');
	$oUserData = json_decode(file_get_contents($sDataPath));

	$sCurrName = @$_GET['u'];
	$oCurrUser = null;

	if (isset($oUserData->$sCurrName)) $oCurrUser = $oUserData->$sCurrName;

?>