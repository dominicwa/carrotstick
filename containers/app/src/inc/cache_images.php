<?php

	foreach ($oUserData as $k => $v) {

		if (stripos($v->image, 'http') !== false) {
			$sRemoteUImageFile = file_get_contents($v->image);
			$sLocalUImagePath = 'img/' . str_replace(' ', '', $k);
			file_put_contents($sLocalUImagePath, $sRemoteUImageFile);
			$oUserData->$k->image = $sLocalUImagePath;
		}

		$ri = 0;
		foreach ($v->rewards as $r) {
			$sRemoteRImageFile = file_get_contents($r->image);
			$sLocalRImagePath = 'img/' . str_replace(' ', '', $k) . $ri;
			file_put_contents($sLocalRImagePath, $sRemoteRImageFile);
			$oUserData->$k->rewards[$ri]->image = $sLocalRImagePath;
			$ri++;
		}

	}

	if (!file_put_contents($sDataPath, json_encode($oUserData, JSON_PRETTY_PRINT))) exit(__LINE__);

?>