<?php
echo "<h1>GLOBALS Superglobal data</h1>";
echo var_dump($GLOBALS);
echo "</br></br><h1>SERVER Superglobal data</h1>";
echo var_dump($_SERVER);
echo "</br></br><h1>REQUEST Superglobal data</h1>";
echo var_dump($_REQUEST);
echo "</br></br><h1>GET Superglobal data</h1>";
echo var_dump($_GET);
echo "</br></br><h1>POST Superglobal data</h1>";
echo var_dump($_POST);
echo "</br></br><h1>FILES Superglobal data</h1>";
echo var_dump($_FILES);
echo "</br></br><h1>ENV Superglobal data</h1>";
echo var_dump($_ENV);
echo "</br></br><h1>COOKIE Superglobal data</h1>";
echo var_dump($_COOKIE);
echo "</br></br><h1>SESSION Superglobal data</h1>";
echo var_dump($_SESSION);
?>