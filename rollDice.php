<?php
/**
 * Author: Rene Kremer
 * Date: 20.08.15
 * Time: 13:27
 * Version 1.0
 *
 * Description: Main App to roll the dices
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
if(!$dice->wrongDice && $template->showDice($value)){
    $dice->roll();
}

$template->follow();
$template->footer();
?>