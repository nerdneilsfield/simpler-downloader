<?php
// $text = preg_replace(
//     '#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i',
//     "'<a href=\"$1\" target=\"_blank\">$3</a>$4'",
//     $_POST["link"]
// );
include '../config.php';

$text = preg_replace(
    '#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i',
    "$4",
    $_POST["link"]
);

if ($text == null) {
    $link = $_POST["link"];
    $dir = $root . $_POST["dir"];
    exec("wget -nd -p --convert-links --no-check-certificate -P $dir $link", $output);
    echo "finished";
    echo implode('<br />', $output);
} else {
    echo "Wrong url";
}
