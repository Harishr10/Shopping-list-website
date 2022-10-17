<?php
session_start();

include("../backend/connection.php");
include("../businesslogik/functions.php");



?>

<!DOCTYPE html>
<html>

<head>
	<title>My website</title>
</head>

<body style="background-color:grey;">

	<body>
		<header>
		<ul>
  <li><?php
		$link = "admin.php";
		$user_data = check_login($con);
		if ($user_data['user_name'] == 'Harish') {
			echo "<a href='" . $link . "'>Admin</a>";
		}
		?></li>
 
</ul>
		
		
		Hello, <?php echo $user_data['user_name']; ?>


	</header>
		<div id="box">
		<tr>
      <td>1</td>
      <td><?php echo $highscore_data['user_name']; ?></td>
      <td><?php echo $highscore_data['date']; ?></td>
      <td>2500</td>
      <td>4594</td>
    </tr>
		</div>
		
		
	</body>

</html>
<style>
html,
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

#box {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    
}

.glow-on-hover {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #000
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}
</style>