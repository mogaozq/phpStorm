<?php
if(!isset($_GET['sId'],$_GET['rId'])){
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script>
        window.onload = function () {
            setTimeout(getNewMessages(), 1000);

            window.setInterval(getNewMessages, 1000);

        }
        function getNewMessages() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var max = document.getElementById("chatArea").getAttribute("time");
                    var json = JSON.parse(this.responseText);
                    for (var i = 0; i < json.length; i++) {

                        document.getElementById("chatArea").value +=json[i].sender_id+": "+ json[i].message + "\n";
                        if (json[i].createdAt > max) max = json[i].createdAt;

                    }
                    document.getElementById("chatArea").setAttribute("time",max);
                }

            }
            var sId = document.getElementById("myId").value;
            var rId = document.getElementById("recieverId").value;
            var time = document.getElementById("chatArea").getAttribute("time");
            xhr.open("get", "http://localhost/phpStorm/ajax/reg/message.php?sId=" + sId + "&rId=" + rId + "&time=" + time, true);
            xhr.send();
        }
        function sendMsg(event) {
            if (event.keyCode == 13) {
                var string = document.getElementById("messageArea").value;
                var sId = document.getElementById("myId").value;
                var rId = document.getElementById("recieverId").value;
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        var response = this.responseText;
                        if(response=="1"){
                            console.log("message has sent seccessfully");
                        }else{
                            console.log("message send error.");
                        }
                    }
                };
                xhr.open("get", "http://localhost/phpStorm/ajax/reg/send.php?" + "sId=" + sId + "&rId=" + rId + "&message=" +'"'+ string+'"', true);
                xhr.send();
                document.getElementById("messageArea").value = "";

            }
        }
    </script>
</head>
<body>
myId <input id="myId" type="number" value="<?php echo $_GET['sId'];?>"/>
<br/>
recieverId <input id="recieverId" type="number" value="<?php echo $_GET['rId'];?>"/>
<br/>
<br/>
<br/>
chat
<br/>
<textarea time="0" onclick="getNewMessages()" id="chatArea"
          style="margin: 0px; height: 200px; width: 322px;"></textarea>
<br/>
your message;
<br/>
<textarea id="messageArea" onkeyup="sendMsg(event)" style="margin: 0px; height: 100px; width: 200px;"></textarea>


</body>
</html>