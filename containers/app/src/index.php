<?php

	error_reporting(E_ALL);

	require_once('inc/config.php');
	require_once('inc/header.php');
	if ($bCacheImages) require_once('inc/cache_images.php');

	$sPageTitle = is_null($oCurrUser) ?
		$sDefaultPageTitle :
		$sDefaultPageTitle . ' : ' . $sCurrName . '\'s Rewards';

?><!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="apple-touch-icon" href="apple-touch-icon.png" />
		<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/index.css">
		<title><?php echo $sPageTitle; ?></title>
	</head>
	<body class="pt-5">

		<nav class="navbar navbar-expand-lg navbar-light fixed-top mb-4">
			<a class="navbar-brand" href="./">
				<img class="card-img-top" src="img/cstick_icon.png" alt="" />
				<?php echo $sDefaultPageTitle; ?>
			</a>
			<?php if (!is_null($oCurrUser)) { ?>
			<div class="mr-auto"></div>
			<a href="./" class="button close"><span>&times;</span></a>
			<?php } ?>
		</nav>

		<?php if (is_null($oCurrUser)) { ?>

		<h4 class="text-center mt-4 pb-2"><?php echo $sUserSelectTitle; ?></h4>

		<div class="d-flex justify-content-center">
			<div id="user-cards" class="card-deck mx-2">
			<?php foreach ($oUserData as $k => $v) { ?>
			<div class="card mx-2 mb-3">
				<a href="?u=<?php echo $k; ?>"><img class="card-img-top" src="<?php echo $v->image; ?>" alt="<?php echo $k; ?>" /></a>
				<div class="card-body">
					<h5 class="card-title text-center"><?php echo $k; ?></h5>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>		

		<?php } else { ?>

		<h4 class="text-center mt-4 pb-2"><?php echo $sCurrName; ?></h4>
		
		<div class="d-flex justify-content-center">
			<div id="reward-cards" class="card-deck mx-2">

		<?php

				$i = 0;
				foreach ($oCurrUser->rewards as $oReward) {

		?>

				<div class="card mx-2 mb-3">
					<img class="card-img-top" src="<?php echo $oReward->image; ?>" alt="" />
					<div class="card-body">
						<h5 class="card-title"><?php echo $oReward->title; ?></h5>
						<p class="text-muted"><?php echo $oReward->details; ?></p>
					</div>
					<div class="card-footer">
						<div class="progress">
							<div id="progress-bar-<?php echo $i; ?>" class="progress-bar progress-bar-striped bg-success" style="width: <?php echo $oReward->score / $oReward->target * 100; ?>%;"><?php echo $oReward->score . '/' . $oReward->target; ?></div>
						</div>
						<div class="reward-buttons">

		<?php

					foreach ($oReward->buttons as $oButton) {

						echo "\t\t\t\t\t\t\t" . '<button type="button" class="btn btn-lg btn-' . ($oButton->value > 0 ? 'success' : 'danger') . '" onclick="updateScore(\'' . $_GET['u'] . '\', ' . $i . ', ' . $oButton->value . ', ' . $oReward->target . ')">' . $oButton->label . '</button>' . "\n";

					}

		?>

						</div>
					</div>
				</div>

		
		<?php

					$i++;

				}

		?>

			</div>
		</div>

		<?php } ?>
		
		<script src="vendor/npm-asset/jquery/dist/jquery.min.js"></script>
		<script src="vendor/npm-asset/popper.js/dist/popper.min.js"></script>
		<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendor/npm-asset/howler/dist/howler.min.js"></script>
		<script src="js/bridge.js.php"></script>
		<script src="js/index.js"></script>
	</body>
</html>