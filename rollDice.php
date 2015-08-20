<?php
/**
 * Author: Rene Kremer
 * Date: 19.08.15
 * Time: 15:52
 */
include 'templates/template.class.php';
include "dice.class.php";
$template = new Template("templates", "img");
$template->header();
$template->head();
// check if first time or reroll
if(isset($_GET["dice"]) || isset($_GET["numberOfDices"])){
    $dice = new Dice($_GET["dice"], $_GET["numberOfDices"]);
    $value = $_GET["dice"];
}else if(isset($_POST["dice"]) && isset($_POST["dice"])){
    $dice = new Dice($_POST["dice"], $_POST{"numberOfDices"});
    $value = $_POST["dice"];
}else{
    echo file_get_contents("templates/errorWrongDice.tpl");
    return false;
}
if($template->showDice($value)){
    $dice->roll();
}

$template->follow();
$template->footer();
?>