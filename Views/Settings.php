<?php
	require_once 'Layout/Header.php';
?>

<h2 class="h2_token">Su token de seguridad <i class="lni lni-protection"></i> es: <?= $_SESSION['token']; ?> </h2>

<?php
	require_once 'Layout/Footer.php';
?>