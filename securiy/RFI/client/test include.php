<form>
    iran<input type="radio" name="country" value="iran">
    china<input type="radio" name="country" value="china">
    china<input type="radio" name="country" value="england">
    <input type="submit" name="show" value="show">
</form>
<?php
if (isset($_GET['show'])) {
    if (isset($_GET['country'])) {
        echo "<br/>";;
        include $_GET['country'] . ".php"; //never use this everywhere
    }

}