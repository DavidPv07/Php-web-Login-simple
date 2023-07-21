<?php

function clean($str)
{
    $var = strip_tags(addslashes(htmlspecialchars($str)));
    return $var;
}

?>
