<?php include('server.php');?>
<!DOCTYPE html>
<html>

<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <title>IOT</title>
  <link rel="icon" type="image/x-icon" href="iot.png">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="powerButton.css">
  <header>
    <h1>Module Controller</h1>
  </header><br><br><br>

  <div class="power-switch">
    <input type="checkbox" id="led" onclick="myFunction()" />
    <div class="button">
      <svg class="power-off">
        <use xlink:href="#line" class="line" />
        <use xlink:href="#circle" class="circle" />
      </svg>
      <svg class="power-on">
        <use xlink:href="#line" class="line" />
        <use xlink:href="#circle" class="circle" />
      </svg>
    </div>
  </div>

  <!-- SVG -->
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" id="line">
      <line x1="75" y1="34" x2="75" y2="58" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" id="circle">
      <circle cx="75" cy="80" r="35" />
    </symbol>
  </svg>
</head>

<body>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <br><br>

  <div id="container">
    <div class="main">
      <p style="color:white; font-size:22px;">> Brightness</p>
      <input type="range" id="brightness" min="1" max="255" value="255" onchange="fun(this)">
    </div>
  </div>


  <span class="metadata" id="user_id" title="<?php echo $_SESSION['user_id'] ?>"></span>

  <script>
    function fun(e) {
      var container = document.getElementById('container');
      var val = e.value;
      if (document.getElementById("led").checked)
        var url = "http://localhost/iot4/api/update.php?id=" + id + "&status=" + val;
        $.getJSON(url, function(data) {
          console.log(data);
      });
    }

    var id = document.getElementById("user_id").title;

    function myFunction() {
      if (document.getElementById("led").checked)
        var url = "http://localhost/iot4/api/update.php?id=" + id + "&status=" + document.getElementById("brightness").value;
      else
        var url = "http://localhost/iot4/api/update.php?id=" + id + "&status=0";

      $.getJSON(url, function(data) {
          console.log(data);
      });
      }

      /*document.getElementById('led').addEventListener('click', function() {
        alert(document.getElementById("brightness").value);

              var url = "http://localhost/nodemcu/api/update.php?id=1&status=" + document.getElementById("brightness").value;
              $.getJSON(url, function(data) {
                  console.log(data);
              });
          });*/
  </script>

  <div class="content">

    <br><br><br>
    <a href="index.php?logout='1'"><button class="button button3">Sign out</button></a>


  </div>
</body>

</html>