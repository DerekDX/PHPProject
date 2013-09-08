<?php

function set_log($error_level, $message) {
    $dir_exists = is_dir('logs');
    if ($dir_exists === FALSE) {
        mkdir('logs', 0777);
    }
    $log_directory = 'logs/log.txt';
    switch ($error_level) {
        case n:
            $error_level = 'notice';
            break;
        case w:
            $error_level = 'warrning';
            break;
        case c:
            $error_level = 'critical';
            break;
        default:
            echo 'Błedne wywolanie funkcji';
            break;
    }
    $file_open = fopen($log_directory, 'a');
    if (!$file_open) {
        die('Nie można uzyskać dostępu do pliku.');
    }
    $message = '[' . \date('j M Y G:i:s') . ']' . "\t" . '[' . $error_level . ']' . "\t" . $message . "\n";
    $write_log_message = fwrite($file_open, $message);
    if (!$write_log_message) {
        die('Nie można zapisać pliku');
    }
}

?>
