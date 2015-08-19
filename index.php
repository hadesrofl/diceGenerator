<?php
/**
 * Author: Rene Kremer
 * Date: 19.08.15
 * Time: 15:52
 */
include 'template.class.php';
$template = new Template();
$template->header();
$template->head();
$template->content('<p>This app rolls a given number of d6 dices</p>

        <form action="dice.php" method="post">
            <p>Number of dices: <input name="dices"/></p>

            <p><input type="submit"/>
                <input type="reset"/></p>
        </form>');
$template->follow();
$template->footer();

?>