<?php

	require_once('inc/config.php');
	require_once('inc/header.php');
	
	if (is_null($oCurrUser)) exit(__LINE__);

	$oUserData->$sCurrName->rewards[intval($_GET['i'])]->score += intval($_GET['v']);

	if (!file_put_contents($sDataPath, json_encode($oUserData, JSON_PRETTY_PRINT))) exit(__LINE__);

	echo $oUserData->$sCurrName->rewards[intval($_GET['i'])]->score;

?>