<?php

$xmlDox = new DOMDocument();
$xmlDox->load("http://www.bartarinha.ir/fa/rss/allnews");
if ($items = $xmlDox->getElementsByTagName("item")) {
    foreach ($items as $item) {
        $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
        $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
        if($desc = $item->getElementsByTagName('description')->item(0)){// it may doesn't exist in main xml doc
            $desc = $desc->nodeValue;
            echo "<p dir='rtl'><a  href=$link>$title</a></p>";
            echo "<p dir='rtl'>$desc</p>";
            echo "<br/>";
        }else{
            echo "<p dir='rtl'><a  href=$link>$title</a></p>";
//            echo "<p dir='rtl'>$desc</p>";
            echo "<br/>";
        };
    }
}

