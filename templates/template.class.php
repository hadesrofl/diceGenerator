<?php

/**
 * Author: Rene Kremer
 * Date: 19.08.15
 * Time: 15:20
 * Description: A Template for the whole App
 */
class Template
{
    /**
     * @var string $head is the template file for the head part
     */
    private $head = "";
    /**
     * @var string $header is the template file for the header
     */
    private $header = "";
    /**
     * @var string $footer is the template file for the footer
     */
    private $footer = "";
    /**
     * @var string $follow is the template file for the follow bar
     */
    private $follow = "";
    /**
     * @var string $errorImage is the template file for the error message due to loading an image
     */
    private $errorImage = "errorImage.tpl";
    /**
     * @var string $tplDir is the directory of the templates
     */
    private $tplDir = "";
    /**
     * @var string $imgDir is the directory of the images
     */
    private $imgDir = "";

    /**
     * Constructor of the template file
     * @param string $templateDir is the dir containing the templates
     * @param string $imgDir is the dir containing the image files
     * @access public
     */
    function __construct($templateDir = "", $imageDir = ""){
        if(!empty($templateDir)){
            $this->tplDir = $templateDir . "/";
        }
        if(!empty($imageDir)){
            $this->imgDir = $imageDir . "/";
        }
    }

    /**
     * Sets and displays the head part of the page
     * @param string $headTpl is the template file for the head party
     * @return bool true if everything is correct or false if not
     * @access public
     */
    function head ($headTpl = "head.tpl"){
    if(!empty($headTpl)){
        $this->head = file_get_contents($this->tplDir .  $headTpl);
        echo $this->head;
        return true;
    }else return false;
    }

    /**
     * Sets and displays the header
     * @param string $headerTpl is the template file of the header
     * @return bool true if everything is correct or false if not
     * @access public
     */
    function header($headerTpl = "header.tpl"){
        if(!empty($headerTpl)){
            $this->header = file_get_contents($this->tplDir . $headerTpl);
            echo $this->header;
            return true;
        }
        else return false;
    }

    /**
     * Sets and displays the footer
     * @param string $footerTpl is the template file of the footer
     * @return bool true if everything is correct or false if not
     */
    function footer($footerTpl = "footer.tpl"){
        if(!empty($footerTpl)){
            $this->footer = file_get_contents($this->tplDir . $footerTpl);
            echo $this->footer;
            return true;
        }else return false;
    }

    /**
     * Sets and display the follow bar
     * @param string $followTpl is the template file for the follow bar
     * @return bool true if everything is correct or false if not
     */
    function follow($followTpl = "follow.tpl"){
       if(!empty($followTpl)){
           $this->follow = file_get_contents($this->tplDir . $followTpl);
           echo $this->follow;
           return true;
       } else return false;
    }

    /**
     * Opens a content div tag
     */
    function openContent(){
        echo '<div id="content">';
    }

    /**
     * Closes a content div tag
     */
    function closeContent(){
        echo '</div>';
    }

    /**
     * Sets the content, use @function openContent() and @function closeContent() before and after setting the content
     * @param $content is the content to set
     */
    function setContent($content){
        echo $content;
    }

    /**
     * Shows the image of the dice type
     * @param $dice is the current type of dice
     * @return bool $bool is true if everything is correct or false if not
     */
    function showDice($dice){
        $img = "";
        $bool = "";
        // d6 got separate images after oll
        if($dice != "d6"){
            switch ($dice){
                case "d4":
                    $img = "d4.png";
                    break;
                case "d8":
                    $img = "d8.png";
                    break;
                case "d10":
                    $img = "d10.png";
                    break;
                case "d12":
                    $img = "d12.png";
                    break;
                case "d20":
                    $img = "d20.png";
                    break;
                case "d100":
                    $img = "d100.png";
                    break;
                default:
                    $img = "";
                    break;
            }
            if(!empty($img)){
                echo "<img src=$this->imgDir$img  alt=$img >";
                $bool = true;
            }else{
                echo file_get_contents($this->tplDir . $this->errorImage);
                $bool = false;
            }
        }else{
            $bool = true;
        }
        return $bool;


    }
}
?>