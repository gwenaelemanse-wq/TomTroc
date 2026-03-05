<?php

spl_autoload_register(function (string $className): void {
    $baseDir = __DIR__ . '/../'; // => app/

    $folders = [
        'models/',
        'controllers/',
        'views/',
        'services/',
        'config/',
    ];

    foreach ($folders as $folder) {
        $file = $baseDir . $folder . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
