<?php
   include_once 'include/sql.class.php';
   include_once 'include/functions.php';
   $db = new DataBase();
   $result = $db->query('select * from users');
   
for ($i=0; $i<$result->num_rows;$i++) {
    $row = $result->fetch_array();
    echo $row['login'];
    echo $row['user_id'];
}
   
   echo '<br>Ilosc rekordów: ';
   echo $db->queries();
   echo $db->query_time();
   
   $values=  array(login => zbyszek);
   $db->insert('users', $values)
   
?>
