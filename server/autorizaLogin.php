<?php

session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
      echo "não autorizado";
}else {
      echo "autorizado";
}

?>