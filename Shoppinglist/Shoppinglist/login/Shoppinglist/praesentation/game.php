<?php
session_start();

include("../backend/connection.php");
include("../businesslogik/functions.php");
$highscore_data = check_login($con);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['highscore'];
	
	
	if (!empty($user_name) && !is_numeric($user_name)) {

		//save to database
		$rank_id = random_num(20);
		$query = "insert into highscore (rank_id,user_name,rank) values ('$rank_id','$user_name',2500)";

		mysqli_query($con, $query);

		header("Location: Game.php");
		die;
	} else {
		echo "Please enter some valid information!";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <meta charset=utf-8>
</head>

<body>
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      background-color: rgb(0, 0, 0);
    }

    @font-face {
      font-family: f0;
      src: url('cloock-black.svg#cloock-black') format('svg');
    }

    @font-face {
      font-family: f1;
      src: url('cloock-cloock.svg#cloock-cloock') format('svg');
    }

    @font-face {
      font-family: f2;
      src: url('cloock-roman.svg#cloock-roman') format('svg');
    }

    @font-face {
      font-family: f3;
      src: url('cloock-script.svg#cloock-script') format('svg');
    }

    @font-face {
      font-family: f4;
      src: url('cloock-type.svg#cloock-type') format('svg');
    }


    #roulette-box {

      position: fixed;
      top: 200px;
      left: 600px;
      width: 300px;
      height: 300px;
      border-radius: 150px;
      border: 1px solid #999;
      box-shadow: inset 0 0 5px 0 rgba(0, 0, 0, .4);
      background: rgb(146, 35, 35);
    }

    #roulette-box>div {
      position: absolute;
      top: 0;
      left: 110px;
      width: 80px;
      height: 120px;
      text-align: center;
      font-size: 20px;
      -o-transform-origin: 50% 1500px;
      -webkit-transform-origin: 50% 150px;
      -moz-transform-origin: 50% 150px;
      transform-origin: 50% 150px;
    }

    .opera #roulette-box>div {
      line-height: .8
    }

    .webkit #roulette-box>div {
      line-height: 1.2
    }

    .moz #roulette-box>div {
      line-height: 1
    }

    #roulette-box #roulette-number-22 {
      -o-transform: rotate(0deg);
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      transform: rotate(0deg);

    }

    #roulette-box #roulette-number-5 {
      -o-transform: rotate(15deg);
      -webkit-transform: rotate(15deg);
      -moz-transform: rotate(15deg);
      transform: rotate(15deg);
    }

    #roulette-box #roulette-number-20 {
      -o-transform: rotate(30deg);
      -webkit-transform: rotate(30deg);
      -moz-transform: rotate(30deg);
      transform: rotate(30deg);
    }

    #roulette-box #roulette-number-19 {
      -o-transform: rotate(45deg);
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    #roulette-box #roulette-number-4 {
      -o-transform: rotate(60deg);
      -webkit-transform: rotate(60deg);
      -moz-transform: rotate(60deg);
      transform: rotate(60deg);
    }

    #roulette-box #roulette-number-12 {
      -o-transform: rotate(75deg);
      -webkit-transform: rotate(75deg);
      -moz-transform: rotate(75deg);
      transform: rotate(75deg);
    }

    #roulette-box #roulette-number-10 {
      -o-transform: rotate(90deg);
      -webkit-transform: rotate(90deg);
      -moz-transform: rotate(90deg);
      transform: rotate(90deg);
    }

    #roulette-box #roulette-number-21 {
      -o-transform: rotate(105deg);
      -webkit-transform: rotate(105deg);
      -moz-transform: rotate(105deg);
      transform: rotate(105deg);
    }

    #roulette-box #roulette-number-8 {
      -o-transform: rotate(120deg);
      -webkit-transform: rotate(120deg);
      -moz-transform: rotate(120deg);
      transform: rotate(120deg);
    }

    #roulette-box #roulette-number-9 {
      -o-transform: rotate(135deg);
      -webkit-transform: rotate(135deg);
      -moz-transform: rotate(135deg);
      transform: rotate(135deg);
    }

    #roulette-box #roulette-number-3 {
      -o-transform: rotate(150deg);
      -webkit-transform: rotate(150deg);
      -moz-transform: rotate(150deg);
      transform: rotate(150deg);
    }

    #roulette-box #roulette-number-18 {
      -o-transform: rotate(165deg);
      -webkit-transform: rotate(165deg);
      -moz-transform: rotate(165deg);
      transform: rotate(165deg);
    }

    #roulette-box #roulette-number-23 {
      -o-transform: rotate(180deg);
      -webkit-transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      transform: rotate(180deg);
    }

    #roulette-box #roulette-number-1 {
      -o-transform: rotate(-165deg);
      -webkit-transform: rotate(-165deg);
      -moz-transform: rotate(-165deg);
      transform: rotate(-165deg);
    }

    #roulette-box #roulette-number-14 {
      -o-transform: rotate(-150deg);
      -webkit-transform: rotate(-150deg);
      -moz-transform: rotate(-150deg);
      transform: rotate(-150deg);
    }

    #roulette-box #roulette-number-17 {
      -o-transform: rotate(-135deg);
      -webkit-transform: rotate(-135deg);
      -moz-transform: rotate(-135deg);
      transform: rotate(-135deg);
    }

    #roulette-box #roulette-number-16 {
      -o-transform: rotate(-120deg);
      -webkit-transform: rotate(-120deg);
      -moz-transform: rotate(-120deg);
      transform: rotate(-120deg);
    }

    #roulette-box #roulette-number-6 {
      -o-transform: rotate(-105deg);
      -webkit-transform: rotate(-105deg);
      -moz-transform: rotate(-105deg);
      transform: rotate(-105deg);
    }

    #roulette-box #roulette-number-7 {
      -o-transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      transform: rotate(-90eg);
    }

    #roulette-box #roulette-number-13 {
      -o-transform: rotate(-75deg);
      -webkit-transform: rotate(-75deg);
      -moz-transform: rotate(-75deg);
      transform: rotate(-75deg);
    }

    #roulette-box #roulette-number-2 {
      -o-transform: rotate(-60deg);
      -webkit-transform: rotate(-60deg);
      -moz-transform: rotate(-60deg);
      transform: rotate(-60deg);
    }

    #roulette-box #roulette-number-11 {
      -o-transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      transform: rotate(-45deg);
    }

    #roulette-box #roulette-number-15 {
      -o-transform: rotate(-30deg);
      -webkit-transform: rotate(-30deg);
      -moz-transform: rotate(-30deg);
      transform: rotate(-30deg);
    }

    #roulette-box #roulette-number-22 {
      -o-transform: rotate(-15deg);
      -webkit-transform: rotate(-15deg);
      -moz-transform: rotate(-15deg);
      transform: rotate(-15deg);
    }

    #roulette-box+#roulette-pointer {
      position: absolute;
      top: 80px;
      left: 80px;
    }

    #roulette-box+#roulette-pointer+#roulette-toggle {
      position: absolute;
      top: 136px;
      left: 110px;
      width: 100px;
      margin: 0;
      padding: 12px 0;
      font-size: 24px;
      font-family: courier;
      color: #aaa;
      text-align: center;
      cursor: pointer;
    }

    #roulette-box.blink0>div:first-child,
    #roulette-box.blink2>div:first-child {
      -o-transition: color .3s;
      -webkit-transition: color .3s;
      -moz-transition: color .3s;
      transition: color .3s;
      color: rgb(0, 0, 0);
    }

    #roulette-box.blink1>div:first-child,
    #roulette-box>div {
      -o-transition: color .15s;
      -webkit-transition: color .15s;
      -moz-transition: color .15s;
      transition: color .15s;
      color: rgb(255, 255, 255);
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #111;
    }

    .active {
      background-color: #04AA6D;
    }
    h4{
      color: wheat;
    }
    #highscore_table{
background-color: wheat;
position: absolute;
top: 20%;
left: 80%;
    }
    
  </style>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li style="float:right"><a href="logout.php">Logout</a></li>
  </ul>
  <h4 style="float:right"> Lives:3</h4>
  <h4> Account:2500$</h4>
  <table id="highscore_table">
  <thead>
    <tr>
      <td>Rank</td>
      <td>Username</td>
      <td>Time</td>
      <td>Money</td>
      <td>Rounds</td>
    </tr>
  </thead>
  <tbody id="highscore_tableb">

    <tr>
      <td>1</td>
      <td><?php echo $highscore_data['user_name']; ?></td>
      <td><?php echo $highscore_data['date']; ?></td>
      <td>2500</td>
      <td>4594</td>
    </tr>
    <form method="post">

                <div style="font-size: 20px;margin: 10px;color: white;">Save to Highscore</div>

                <input id="text" type="text" name="highscore"><br><br>

                <input id="button" type="submit" value="Add"><br><br>
    </form>
  
  <div style=position:relative;left:594px;top:190px;width:500px;height:500px;overflow:hidden>
    <div id=roulette-box>
      <div id=roulette-number-0 class="roulette-number f0">0</div>
      <div id=roulette-number-1 class="roulette-number f1">1</div>
      <div id=roulette-number-2 class="roulette-number f2">2</div>
      <div id=roulette-number-3 class="roulette-number f3">3</div>
      <div id=roulette-number-4 class="roulette-number f4">4</div>
      <div id=roulette-number-5 class="roulette-number f0">5</div>
      <div id=roulette-number-6 class="roulette-number f1">6</div>
      <div id=roulette-number-7 class="roulette-number f2">7</div>
      <div id=roulette-number-8 class="roulette-number f3">8</div>
      <div id=roulette-number-9 class="roulette-number f4">9</div>
      <div id=roulette-number-10 class="roulette-number f4">10</div>
      <div id=roulette-number-11 class="roulette-number f0">11</div>
      <div id=roulette-number-12 class="roulette-number f1">12</div>
      <div id=roulette-number-13 class="roulette-number f2">13</div>
      <div id=roulette-number-14 class="roulette-number f3">14</div>
      <div id=roulette-number-15 class="roulette-number f4">15</div>
      <div id=roulette-number-16 class="roulette-number f0">16</div>
      <div id=roulette-number-17 class="roulette-number f1">17</div>
      <div id=roulette-number-18 class="roulette-number f2">18</div>
      <div id=roulette-number-19 class="roulette-number f3">19</div>
      <div id=roulette-number-20 class="roulette-number f4">20</div>
      <div id=roulette-number-21 class="roulette-number f4">21</div>
      <div id=roulette-number-22 class="roulette-number f4">22</div>
      <div id=roulette-number-23 class="roulette-number f4">23</div>

    </div>
    <canvas id=roulette-pointer width=160></canvas>
    <p id=roulette-toggle>SPIN</p>

    

    
  </tbody>
</table>
    <script>
      (function() {
        for (var prop in document.documentElement.style)
          if (/^(O|Moz|webkit)/.test(prop)) break
        switch (prop.substr(0, 1)) {
          case 'O':
            document.documentElement.className = 'opera';
            break
          case 'M':
            document.documentElement.className = 'moz';
            break
          case 'w':
            document.documentElement.className = 'webkit';
            break
        }

        var main = document.body
        while (main = main.lastChild)
          if (main.nodeName == 'SCRIPT') break
        var canvas = main.parentNode.querySelector('#roulette-pointer')
        if (!canvas) return
        draw(canvas.getContext('2d'), canvas.width)

        function draw(c, w) {
          var offset = 23
          c.shadowColor = 'rgba(0,0,0,.7)'
          c.shadowOffsetX = c.shadowOffsetY = 0
          c.shadowBlur = 24
          c.save()
          c.translate(w / 2, w / 2)
          arc()
          c.restore();
          c.save()
          c.translate(w / 2, offset + 1)
          pointer()
          c.restore();
          c.save()
          c.shadowBlur = 0
          c.translate(w / 2, w / 2)
          arc()

          function arc() {
            c.beginPath()
            c.arc(0, 0, w / 2 - offset, 0, Math.PI * 2, true)
            c.fillStyle = 'white'
            c.fill()
          }

          function pointer() {
            c.beginPath()
            c.moveTo(-12, 0);
            c.lineTo(0, -18);
            c.lineTo(12, 0)
            c.closePath()
            c.fillStyle = 'white'
            c.fill()
          }
        }

        var timer, count = 0,
          toggle = main.parentNode.querySelector('#roulette-toggle'),
          mainBox = main.parentNode.querySelector('#roulette-box'),
          boxes = [].slice.call(mainBox.querySelectorAll('div'))

        function update(numBox) {
          var n = numBox.textContent * 1 - 1
          if (n < 0) n = 23
          numBox.textContent = n
          numBox.className = 'f' + Math.floor(Math.random() * 5)
        }

        function succ() {
          for (var i = 0; i < 25; i++)
            update(boxes[i])
          count++
        }

        function startOrStop(e) {
          if (!timer) {
            timer = window.setInterval(succ, 50)
            toggle.textContent = 'STOP'
            mainBox.className = ''

          } else {
            window.clearInterval(timer)
            timer = null
            toggle.textContent = 'START'
            mainBox.className = 'blink0'
          }

        }

        function blink(e) {
          if (this.className == 'blink2') this.className = ''
          else this.className = 'blink' + (this.className.substr(-1) * 1 + 1)
        }
        toggle.addEventListener('click', startOrStop, false)
        mainBox.addEventListener(transitionEvent(document.documentElement.className), blink, false)

        function transitionEvent(n) {
          if (n == 'opera') return 'otransitionend'
          else if (n == 'webkit') return 'webKitTransitionEnd'
          return 'transitionend'
        }

      })()



      $(document).ready(function() {
        let list = $(".roulette-number");
        var length = list.length;

        list.each(function(index) {
          deg = (((360 / length) * index) - 180);
          console.log(deg);
          $(this).css("transform-rotate", "rotate(" + deg + ")deg");
        })
      })
    </script>
  </div>
</body>

</html>