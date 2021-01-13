<?php
$CFG = parse_ini_file('../../../config/config.ini.php', true);

// Datos de la conexión SQL
$sql_details = array(
  'user' => $CFG['bd']['login'],
  'pass' => $CFG['bd']['pass'],
  'db'   => $CFG['bd']['bd'],
  'host' => $CFG['bd']['host']
);
