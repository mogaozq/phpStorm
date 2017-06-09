<?php
/**
 * Created by PhpStorm.
 * User: MOGA
 * Date: 2017-06-01
 * Time: 5:49 PM
 */
$address = "target 1.php";
$name = "seyed mohammad";
$name = "سید مهدی";
$family = "هاشمی &= نژاد";
$link = rawurlencode($address);// for dynamic link use rawurlencode function to encode the name
$link .= "?name=" . urlencode($name);
$link .= "&family=" . urlencode($family);
?>
for more <?php echo htmlspecialchars("<inforemation>") ?>click <a href="<?php echo $link ?>">here</a>
