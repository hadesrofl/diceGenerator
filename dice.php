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
    $currentValue = 0;
    $numberOfDices = $_POST["dices"];
    $total = 0;
    $rows = 0;
    $cells = 0;
    $error = FALSE;
    if ($numberOfDices > 0) {


        for ($i = 0; $i < $numberOfDices; $i++) {
            $currentValue = rand(1, 6);
            $listOfValues[$i] = $currentValue;
        }
        echo "<table>";
        foreach ($listOfValues as $values) {
            $error = FALSE;
            if ($cells == 0 || $cells % 6 == 0) {
                echo "<tr>";
                $rows++;
            }
            switch ($values) {
                case "1":
                    echo "<td><img src='img/one.png'  width = '64px' height='64px'/></td>";
                    break;
                case "2":
                    echo "<td><img src='img/two.png'  width = '64px' height='64px'/></td>";
                    break;
                case "3":
                    echo "<td><img src='img/three.png'  width = '64px' height='64px'/></td>";
                    break;
                case "4":
                    echo "<td><img src='img/four.png'  width = '64px' height='64px'/></td>";
                    break;
                case "5":
                    echo "<td><img src='img/five.png'  width = '64px' height='64px'/></td>";
                    break;
                case "6":
                    echo "<td><img src='img/six.png'  width = '64px' height='64px'/></td>";
                    break;
                default:
                    $error = TRUE;
                    echo "Something went wrong... :-(";
                    break;
            }
            if (!$error) {
                $cells++;
            }
            $total += $values;
        }
        for ($i = 0; $i < $rows; $i++) {
            echo "</tr>";
        }
        echo "</table>";
        $avg = round($total / $numberOfDices,2);
        echo "<table>";
        echo "<tr><td>Number of Dices: </td><td>" . $numberOfDices . "</td></tr>";
        echo "<tr><td>Total sum: </td><td> " . $total . "</td></tr>";
        echo "<tr><td>Average: </td><td>" . $avg . "</td></tr>";
        echo "</table>";
        echo "<form action='dice.php' method='post'>";
        echo "<button type='submit' name='dices' value=$numberOfDices>reroll</button>";
        echo "<a href='index.php'><button type='button'>back</button></a></p>";
        echo "</form>";
    } else {
        echo "<p id='error'>Wrong Number of Dices to roll. Please enter a valid Number of dices to roll ( > 0)</p>";
        echo "<form action='dice.php' method='post'>";
        echo "<p>Number of dices: <input name='dices'/></p>";
        echo "<p><input type='submit''/>";
        echo "<input type='reset'/></p>";
        echo "</form>";
    }
$template->follow();
$template->footer();
?>