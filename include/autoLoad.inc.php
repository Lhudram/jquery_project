<?php

function my_autoload($className)
{
    $paths = array(
        "classes/global/",
        "classes/managers/",
        "classes/metier/"
    );

    $extention = ".class.php";

    foreach ($paths as $path) {
        if (file_exists($path . $className . $extention)) {
            include($path . $className . $extention);
            break;
        }
    }
}

spl_autoload_register("my_autoload");
