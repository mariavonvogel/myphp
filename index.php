<?php

require_once 'core/registry.php';

// корректный автозагрузчик!
spl_autoload_register ( function ($class) {

    $sources = array(
        "$class.php",
        "controllers/$class.php",
        "core/$class.php",
        "models/$class.php",
        "views/$class.php",
    );

    foreach ($sources as $source) {
        if (is_file($source)) {
            include $source;
        }
    }
});

require_once 'bootstrap.php';