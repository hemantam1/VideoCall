<?php
    if(isset($_GET['c']) && isset($_GET['t']))
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="header">My Video</div>
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong><span> You can invite others join this channel by click </span><a href="" target="_blank">here</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong><span> Joined room successfully. </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong><span> Joined room successfully. </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="container">
    <div class="button-group">
        <form id="join-form">
            <input id="appid" type="hidden" value="fb1ff76118b54977b3c7fd5193f28ccf">
            <input id="token" type="hidden" value="<?php echo $_GET['t'];?>">
            <input id="channel" type="hidden" value="<?php echo $_GET['c'];?>">
            <button id="join" type="submit" class="btn btn-primary btn-sm" style="display: none;">Join</button>
            <button id="leave" type="button" class="btn btn-primary btn-sm" disabled>Leave</button>
        </form>
      </div>
      <div class="container1" id="jRoom" style="display: none;">
        <div class="wrapper">
            <img src="icon/close.svg" onclick="closeForm()">
                <h1>Join Room</h1>
                <div class="row-sm">
                    <p class="join-info-text">Channel Name</p>
                    <input id="channel" name="cname" type="text" placeholder="enter channel name" value="<?php echo $_GET['c'];?>" required disabled>
                </div>
                <div class="row-sm">
                    <p class="join-info-text">ID</p>
                    <textarea name="token" id="token" cols="30" rows="5" placeholder="Room ID" required disabled><?php echo $_GET['t'];?></textarea>
                </div>
                <input type="text" id="hiddendata" value="https://agoraapk.herokuapp.com/joinl.php?c=<?php echo $_POST['cname'];?>&t=<?php echo $_POST['token'];?>">
                <div class="buttondiv">
                    <button name="submit" id="submit" type="submit" onclick="copylink()">Copy Link</button>
                </div>
        </div>
    </div>
      <div class="roominfo">
        <button class="viewinfo" onclick="openroominfo()">View Room Info</button>
      </div>
      <div class="row video-group" id="remote-playerlist">
      <div class="col">
        <p id="local-player-name" class="player-name"></p>
        <div id="local-player" class="player"></div>
      </div>
    </div>
  </div>
  <script src="./jquery-3.4.1.min.js"></script>
  <script src="./bootstrap.bundle.min.js"></script>
  <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
  <script src="./basicVideo.js"></script>
  <script>
    $( document ).ready(function() {
        $("#join-form").submit();
    });
    function openroominfo()
    {
      document.getElementById('jRoom').style.display = 'block';
    }
    function closeForm() 
    {
      document.getElementById('jRoom').style.display = 'none';
    }
    function copylink()
    {
      var copyText = document.getElementById("hiddendata");
      copyText.select();
      document.execCommand("copy");
      alert("Copied");
    }
    </script>
</body>
</html>
<?php 
    }
?>