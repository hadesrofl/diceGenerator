<?php
/**
 * Author: Rene Kremer
 * Date: 20.08.15
 * Time: 13:27
 * Version: 1.0
 */
include 'templates/template.class.php';
$template = new Template("templates", "img");
$template->header("header.tpl");
$template->head("head.tpl");
$template->openContent();
$template->setContent('<p>This app rolls a given number of dices</p>

        <form action="rollDice.php" method="post">
        <table>
            <tr>
                <td>Number of Dices:</td>
                <td><input name="numberOfDices" placeholder="Default is 1"/></td>
            </tr>
            </table>
            <table>
            <tr>
            <td><label><input type="radio" name="dice" value="d4"/><img src="img/d4.png" alt="d4"/></label></td>
            <td><label><input type="radio" name="dice" value="d6"/><img src="img/d6.png" alt="d6"/></label></td>
            <td><label><input type="radio" name="dice" value="d8"/><img src="img/d8.png" alt="d8"/></label></td>
            </tr>
            <tr>
            <td/>
            <td><label><input type="radio" name="dice" value="d10"/><img src="img/d10.png" alt="d10"/></label></td>
            <td/>
            </tr>
            <tr>
            <td><label><input type="radio" name="dice" value="d12"/><img src="img/d12.png" alt="d12"/></label></td>
            <td><label><input type="radio" name="dice" value="d20"/><img src="img/d20.png" alt="d20"/></label></td>
            <td><label><input type="radio" name="dice" value="d100"/><img src="img/d100.png" alt="d100"/></label></td>
</tr>
        </table>
            <p><input type="submit" value="roll"/>
                <input type="reset" value="reset"/></p>
        </form>');
$template->closeContent();
$template->follow("follow.tpl");
$template->footer("footer.tpl");

?>