<html>
<head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<?php
if (isset($_GET['submit'])) {
    $secret = "6LexNyEUAAAAAAPNHxJKnJ_qdU8sB4bP_MYwKYfC";
    $response = $_GET['g-recaptcha-response'];
    $remote = $_SERVER['REMOTE_ADDR'];
    $response = sendReCaptcha($secret, $response, $remote);
    var_dump($response);
    if ($response['success'] == true) {
        $message = "ok";
    } else {
        $message = "no you are robot";
    }

}
?>
<form method="get">
    <input type="text" name="username">
    <input type="text" name="password">
    <br/>
    <div class="g-recaptcha" data-sitekey="6LexNyEUAAAAAEw7iy7jMiRKDAOrvCkKFSrJEbWb"></div>
    <input type="submit" name="submit" value="login">
</form>

<?php if (isset($message)) {
    echo $message;
}
function sendReCaptcha($secret, $response, $remote)
{
    $data = "secret=$secret&response=$response&remote=$remote";
    $curl = curl_init("https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $googleResponse = curl_exec($curl);
    return json_decode($googleResponse, true);
}

?>
</html>
