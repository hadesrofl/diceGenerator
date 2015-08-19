<?php

/**
 * Author: Rene Kremer
 * Date: 19.08.15
 * Time: 15:20
 */
class Template
{
    private $head = '<html><head>
        <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="author" content="Rene">
    <meta name="viewport" content="width=device-width" initial-scale="1.0">
    <title>Random Dice Generator</title>
    <link rel="apple-touch-icon" sizes="32x32" href="img/favicon.png">
<link rel="icon" sizes="16x16" href="img/favicon.png">
<link rel="stylesheet" href="style.css"/>
</head>';
    private $header = '<h1>Random Dice Generator</h1>';
    private $footer = '<footer>&copy by Rene Kremer 2015</footer></body></html>';
    private $follow = '<div id="follow">
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
</div>';

    function head (){
        echo $this->head;
    }
    function header(){
        echo $this->header;
    }
    function footer(){
        echo $this->footer;
    }
    function follow(){
        echo $this->follow;
    }
    function content($content){
        echo '<div id="content">' . $content . '</div>';
    }
}
?>