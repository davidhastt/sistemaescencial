<?php 
//phpinfo();

$dbconn = pg_connect("host=localhost port=5432 dbname=santander user=postgres password=davitzoL");

$result = pg_query($dbconn, "select *  from entidades");
var_dump(pg_fetch_all($result));



?>