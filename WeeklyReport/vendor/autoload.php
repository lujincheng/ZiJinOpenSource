<?php

// User-defined autoload
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../';
	error_log($class);
	if (substr($class, -10) === 'Controller' && $class != 'Core\Controller') {
		error_log("is controller");
		$class = 'App/Controllers/'.str_replace($prefix, '', $class);
		$file = $baseDir . str_replace('\\', '/', $class) . '.php';
		error_log($file);
		if (file_exists($file)) {
			require_once $file;
		}
	} else {
		error_log("not controller");
		$class = str_replace($prefix, '', $class);
		$file = $baseDir . str_replace('\\', '/', $class) . '.php';
		error_log($file);
		if (file_exists($file)) {
			require_once $file;
		}
	}

});

?>