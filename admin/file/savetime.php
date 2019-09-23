<?php
	session_start();
	$fw = fopen('../../data/time.txt', 'w');
	fwrite($fw, $_POST['time']);
	fclose($fw);