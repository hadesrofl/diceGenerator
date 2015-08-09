<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="author" content="Rene">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Random Dice Generator</title>
</head>
<link rel="stylesheet" href="style.css"/>
<link rel="apple-touch-icon" sizes="32x32" href="img/favicon.png">
<link rel="icon" sizes="16x16" href="img/favicon.png"
">
<h1>Random Dice Generator</h1>

<body>
<p>This app rolls a given number of d6 dices</p>

<div id
"container">
<div id="content">
    <?php
    /**
     * Created by PhpStorm.
     * User: Rene
     * Date: 09.08.2015
     * Time: 14:40
     */

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
        $avg = $total / $numberOfDices;
        echo "<table>";
        echo "<tr><td>Number of Dices: </td><td>" . $numberOfDices . "</td></tr>";
        echo "<tr><td>Total sum: </td><td> " . $total . "</td></tr>";
        echo "<tr><td>Average: </td><td>" . $avg . "</td></tr>";
        echo "</table>";
        echo "<form action='dice.php' method='post'>";
        echo "<button type='submit' name='dices' value=$numberOfDices>reroll</button>";
        echo "<a href='index.html'><button type='button'>back</button></a></p>";
        echo "</form>";
    } else {
        echo "<p id='error'>Wrong Number of Dices to roll. Please enter a valid Number of dices to roll ( > 0)</p>";
        echo "<form action='dice.php' method='post'>";
        echo "<p>Number of dices: <input name='dices'/></p>";
        echo "<p><input type='submit''/>";
        echo "<input type='reset'/></p>";
        echo "</form>";
    }
    ?>
</div>
<div id="footer">
    <footer>&copy by Rene Kremer 2015</footer>
</div>
<div id="follow">
    <ul>
        <li>
            <a href="https://www.facebook.com/rene.hl90">
                <img src="img/Facebook.ico" width="64px" height="64px">
            </a>
        </li>
        <li>
            <a href="https://github.com/hadesrofl">
                <img src="img/Github.ico" width="64px" height="64px">
            </a>
        </li>
        <li>
            <a href="https://twitter.com/_Rene_Kremer">
                <img src="img/Twitter.ico" width="64px" height="64px">
            </a>
        </li>
        <li>
            <a href="https://www.xing.com/profile/Rene_Kremer3">
                <img src="img/Xing.ico" width="64px" height="64px">
            </a>
        </li>
    </ul>
</div>
</div>
</body>
</html>
