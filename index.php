<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery-3.4.1.min.js"></script>
    <style>
        body, html {
        height: 100%;
        margin: 0;
        }
        .bg {
        /* The image used */
        background-image: url("icon/back.jpg");
        /* Full height */
        height: 100%; 
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
        .tabcontainer 
        {
            height: 100%;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }
        h1 
        {
            margin: 0px;
            color: white;
        }
        .row 
        {
            display: flex;
        }
        label 
        {
            margin-top: 30px;
            width: 100px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            background: green;
            cursor: pointer;
            margin-right: 10px;
        }
        .container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: auto;
            background: #ffffffe6;;
        }
        .wrapper 
        {
            max-width: 400px;
            height: 70%;
            margin: 5% auto auto auto;
            border: 1px lightgray solid;
            border-radius: 10px;
            position: relative;
            background: white;
        }

        .wrapper img 
        {
            position: absolute;
            top: 10px;
            right: 10px;
            height: 20px;
            width: 20px;
            cursor: pointer;
        }
        .wrapper h1 
        {
            text-align: center;
            color: black;
        }
        .wrapper .row-sm 
        {
            margin: 30px 0px 0px 20px;
        }
        .wrapper .row-sm p 
        {
            margin: 0px;
        }
        .wrapper .row-sm input[type="text"]
        {
            width: 225px;
            outline: none;
        }
        textarea {
        resize: none;
        outline: none;
        }
        .buttondiv 
        {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        button 
        {
            width: 100px;
            background: #2274A4;
            color: white;
            border-radius: 5px;
            outline: none;
            border: 0px;
            padding: 5px 0px;
            cursor: pointer;
            font-weight: 600;
        }
        @media screen and (max-width: 480px) {
            .wrapper 
            {
                margin: 30% auto auto auto;
            }
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="tabcontainer">
            <h1>What you Want?</h1>
            <div class="row">
                <label onclick="CROOM()">Create Room</label>
                <label onclick="Open()">Join Room</label>
            </div>
        </div>
    </div>
    <div class="container" id="jRoom" style="display: none;">
        <div class="wrapper">
            <img src="icon/close.svg" onclick="closeForm()">
            <form action="join.php" method="post" id="">
                <h1>Join Room</h1>
                <div class="row-sm">
                    <p class="join-info-text">Channel Name</p>
                    <input id="channel" name="cname" type="text" placeholder="enter channel name" required>
                </div>
                <div class="row-sm">
                    <p class="join-info-text">ID</p>
                    <textarea name="token" id="token" cols="30" rows="5" placeholder="Room ID" required></textarea>
                </div>
                <div class="buttondiv">
                    <button name="submit" id="submit" type="submit">JOIN</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container" id="cRoom" style="display: none;">
        <div class="wrapper">
            <img src="icon/close.svg" onclick="closeForm()">
            <form action="" method="post">
                <h1>Join Room</h1>
                <div class="row-sm">
                    <p class="join-info-text">Channel Name</p>
                    <input name="createchannel" type="text" placeholder="enter channel name" required>
                </div>
                <div class="buttondiv">
                    <button name="create" type="submit">CREATE</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function closeForm()
        {
            document.getElementById('jRoom').style.display = 'none';
            document.getElementById('cRoom').style.display = 'none';
        }
        function Open() 
        {
            document.getElementById('jRoom').style.display = 'block';
        }
        function CROOM() 
        {
            document.getElementById('cRoom').style.display = 'block';
        }
    </script>
</body>
</html>
<?php 
    if(isset($_POST['create']))
    {
        include("./RtcTokenBuilder.php");
        $appID = "fb1ff76118b54977b3c7fd5193f28ccf";
        $appCertificate = "d73ef67136214bc6b3f3e97f57196fd8";
        $channelName = $_POST['createchannel'];
        $uid = 0;
        $role = RtcTokenBuilder::RolePublisher;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
        
        echo "<script>
            document.getElementById('channel').value = '".$channelName."';
            document.getElementById('token').value = '".$token."';
            document.getElementById('submit').click();
        </script>";
    }
?>