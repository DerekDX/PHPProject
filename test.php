<?php

$siema='siema';

$dir_exists = is_dir('logs');
if($dir_exists = FALSE){
    echo 'folder nie istnieje';
}  else {
    echo 'folder istnieje';
}

?>
