<?php

function doctype($titre){

echo '<!DOCTYPE html>'; 
echo '<html>';
echo '<head>';
echo '<meta charset="UTF-8"/>';
echo '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">';
echo '<title>'.$titre.'</title>';
echo '</head>';
echo '<body>';
}

function fin(){
echo '</body>';
echo '</html>';
}

