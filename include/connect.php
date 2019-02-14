<?php
function connect(){
  $idc = pg_connect('host=10.11.159.20 user=postgres password=postgres dbname=bd_projet_course');
  return($idc);
}
?>
