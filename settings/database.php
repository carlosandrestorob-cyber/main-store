<?php

$local_conn = pg_connect("
host=localhost
port=5432
dbname=mainstore
user=postgres
password=postgres
");

if(!$local_conn){
    die("Error de conexión");
}

?>