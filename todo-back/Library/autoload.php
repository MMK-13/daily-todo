<?php
	function autoload($class) {
		$files = str_replace('\\','/',$class.'.class.php');
		//echo '<b>'.$files.'</b><br/>';
		if (file_exists($files)) {
			require $files;
		} else {
			throw new RuntimeException("Class $files was not found!");
		}
	}
	spl_autoload_register('autoload');