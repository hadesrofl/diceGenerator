<?php

/**
 * Created by PhpStorm.
 * User: renej
 * Date: 20.08.2015
 * Time: 13:27
 * Version: 1.0
 *
 * Description: This Class represents a dice of the following types: d4, d6, d8, d10, d12, d20, d100
 */
class Dice
{
    /**
     * @var int $numberOfDices is the number of dices to roll
     */
    private $numberOfDices = 0;
    /**
     * @var string $dice is the type of dice
     */
    private $dice = 0;
    /**
     * @var int $total is the total result rolled by the dices
     */
    private $total = 0;
    /**
     * @var int $row is the number of rows of the result table
     */
    private $rows = 0;
    /**
     * @var int $cells is the number of cells of the result table
     */
    private $cells = 0;
    /**
     * @var string $imgDir is the directory of the images
     */
    private $imgDir = "img/";
    /**
     * @var bool $wrongDice is a bool to determine if the entered dice is one of the accepted types
     */
    public $wrongDice = false;

    /**
     * Constructor of the dice object
     * @param string $dice is the type of dice
     * @param string $numberOfDices is the number of dices to roll
     * @access public
     */
    function __construct($dice = "d6", $numberOfDices = "1")
    {
        if (!is_numeric($numberOfDices)) {
            $numberOfDices = 1;
        }
            $this->numberOfDices = $numberOfDices;
            if ($dice == "d4" || $dice == "d6" || $dice == "d8" || $dice == "d10" || $dice == "d12" || $dice == "d20" || $dice == "d100") {
                $this->dice = substr($dice, 1);
            } else {
                echo file_get_contents("templates/errorWrongDice.tpl");
                $this->wrongDice = true;
            }
            for ($i = 0; $i < $this->rows; $i++) {
                echo "</tr>";
            }
            echo "</table>";
    }

    /**
     * Rolls the dices and returns the result as a table
     * @access public
     */
    function roll()
    {
        if (!$this->wrongDice) {
            if ($this->numberOfDices > 0 && $this->numberOfDices <= 20) {
                for ($i = 0; $i < $this->numberOfDices; $i++) {
                    $currentValue = rand(1, $this->dice);
                    $listOfValues[$i] = $currentValue;
                    $this->total += $currentValue;
                }
                if ($this->dice == 6) {
                    $this->showD6($listOfValues);
                } else {
                    $this->showResults($listOfValues);
                }
                $avg = round($this->total / $this->numberOfDices, 2);
                echo "<table>";
                echo "<tr><td>Dice: </td><td>" . $this->dice . "</td></tr>";
                echo "<tr><td>Number of Dices: </td><td>" . $this->numberOfDices . "</td></tr>";
                echo "<tr><td>Total sum: </td><td> " . $this->total . "</td></tr>";
                echo "<tr><td>Average: </td><td>" . $avg . "</td></tr>";
                echo "</table>";
                echo "<a href='rollDice.php?dice=d$this->dice&numberOfDices=$this->numberOfDices'><button type='button'>reroll</button></a>";
                echo "<a href='index.php'><button type='button'>back</button></a></p>";
                echo "</form>";
            } else {
                echo file_get_contents("templates/errorNumberOfDices.tpl");
            }
        }
    }

    /**
     * Shows the results as D6 images
     * @param $listOfValues is the list of values rolled for every single dice
     * @return bool determinates if the function worked correctly or had an error
     * @access public
     */
    function showD6($listOfValues)
    {
        echo "<table>";
        foreach ($listOfValues as $values) {
            $error = FALSE;
            if ($this->cells == 0 || $this->cells % 5 == 0) {
                echo "<tr>";
                $this->rows++;
            }
            switch ($values) {
                case "1":
                    echo "<td><img src=" . $this->imgDir . "one.png  width = '64px' height='64px'/></td>";
                    break;
                case "2":
                    echo "<td><img src=" . $this->imgDir . "two.png  width = '64px' height='64px'/></td>";
                    break;
                case "3":
                    echo "<td><img src=" . $this->imgDir . "three.png  width = '64px' height='64px'/></td>";
                    break;
                case "4":
                    echo "<td><img src=" . $this->imgDir . "four.png  width = '64px' height='64px'/></td>";
                    break;
                case "5":
                    echo "<td><img src=" . $this->imgDir . "five.png  width = '64px' height='64px'/></td>";
                    break;
                case "6":
                    echo "<td><img src=" . $this->imgDir . "six.png  width = '64px' height='64px'/></td>";
                    break;
                default:
                    $error = TRUE;
                    echo file_get_contents("templates/errorImage.tpl");
                    break;
            }
            if (!$error) {
                $this->cells++;
            } else {
                return false;
            }
        }
    }

    /**
     * Shows the results of every single roll in a table
     * @param $listOfValues is the list of values of every single roll
     */
    function showResults($listOfValues)
    {
        echo "<p>The Results are: </p>";
        echo "<table>";
        foreach ($listOfValues as $values) {
            if ($this->cells % 5 == 0) {
                echo "<tr>";
                $this->rows++;
            }
            echo "<td class='result'>" . $values . "</td>";
            $this->cells++;
        }
        for ($i = 0; $i < $this->rows; $i++) {
            echo "</tr>";
        }
        echo "</table>";
    }
}