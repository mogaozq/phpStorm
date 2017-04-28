<script src="https://gist.github.com/mogaozq/5e0c0d7244a717517f06dc35ac0b427b.js"></script>
<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-03-21
 * Time: 7:57 PM
 */
echo time();
echo "<br/>";
echo date('Y/m/d  H:i:s-----');
echo date('Y/m/d  H:i:s',1212122);
//echo "<br/>";
//echo mktime(2,5,30,4,4,2017);//make timestamp
//echo "<br/>";
//echo checkdate(12,23,2017)? "true":"false";
//echo "<br/>";
//$time = getdate();
//echo $time['mday']."------";
//echo  $time['seconds'];
//echo "<br/>";
//echo  date('Y/m/d  H:i:s',fileatime('time.php'));
//echo "<br/>";
echo  date('Y/m/d  H:i:s',filemtime('time.php'));
//date_default_timezone_set('iran');
//$da=date_create();
//echo date_format($da,"Y/m/d H:i:s");
//?>
