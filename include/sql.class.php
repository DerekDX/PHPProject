<?php

include_once 'include/functions.php';

class DataBase {

    public $result = array();
    public $queries = 0;
    public $querytime = 0;
    private $db_connection;
    private $time_start;
    private $time_stop;

    function __construct() {
        $set_db_connetion = new mysqli('localhost', 'root', 'kqvx6');
        $this->db_connection = $set_db_connetion;
        if (!$set_db_connetion) {
            die('Brak polaczenia z serwerem Bazy danych');
            set_log('Brak polaczenia z serwerem Bazy danych');
        }

        $select_table = $set_db_connetion->select_db("test");
        if (!$select_table) {
            die('Nie znaleziono podanej tabelii');
            set_log('Nie znaleziono podanej tabeli');
        } else {
            echo 'połączono poprawnie';
        }
    }

    function query($query) {
        $this->time_start = microtime(TRUE);
        $this->result = mysqli_query($this->db_connection, $query);
        $this->time_stop = microtime(TRUE);
        $this->queries++;
        if ($this->result)
            return $this->result;
        else // 4
            echo '<b>MYSQL ERROR:<br />' . mysql_errno() . "</b>: " .
            mysql_error() . '<br /><br />' . "n";
    }

    function insert($table, $values) {
        $keys = implode("`, `", array_keys($values));
        $values = implode("', '", array_values($values));
        $this->query("INSERT INTO `$table` (`$keys`) VALUES ('$values')");
    }

    function fetch_array() {
        return mysqli_fetch_array($this->result);
    }

    function num_rows() {
        return mysqli_num_rows($this->result);
    }

    function queries() {
        return $this->queries;
    }

    function query_time() {
//        $querytime = $this->time_stop - $this->time_start;
//        return $this->querytime = $querytime;
        $querytime = $this->time_stop - $this->time_start;
        return $this->querytime = round($querytime, 0);
    }

    function __destruct() {
        mysqli_close($this->db_connection);
    }

}

?>
