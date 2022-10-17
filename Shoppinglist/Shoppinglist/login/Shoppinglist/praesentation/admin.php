<?php
session_start();

include("../backend/connection.php");
include("../businesslogik/functions.php");

$user_data = check_login($con);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $sentence = $_POST['sentence'];

    if (!empty($sentence) && !is_numeric($user_name)) {

        //save to database
        $sentence_id = random_num(20);
        $query = "insert into sentence (sentence_id,sentence) values ('$sentence_id','$sentence')";

        mysqli_query($con, $query);

        header("Location: admin.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
if (isset($_POST['update_sent_data'])) {
    $id = $_POST['sent_id'];

    $sentence = $_POST['sent'];


    $query = "UPDATE sentence SET sentence='$sentence' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: admin.php");
    } else {
        $_SESSION['status'] = "Not Updated";
        header("Location: index.php");
    }
}

if (isset($_POST['delete_sent_data'])) {
    $id = $_POST['sent_id'];


    $query = "DELETE FROM sentence WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: admin.php");
    } else {
        $_SESSION['status'] = "Not Deleted";
        header("Location: index.php");
    }
}
if (isset($_POST['sent_to_categories'])) {
    //something was posted
    $categorie = $_POST['cat'];

    if (!empty($categorie) && !is_numeric($user_name)) {

        //save to database
        $categorie_id = random_num(20);
        $query = "insert into categories (categorie_id,categories) values ('$categorie_id','$categorie')";

        mysqli_query($con, $query);

        header("Location: admin.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
if (isset($_POST['sent_to_catword'])) {
    //something was posted
    $cat_id = $_POST['categorieid'];
    $catword = $_POST['catword'];

    $query = "UPDATE sentence SET categorie_id='$cat_id' WHERE sentence='$catword'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: admin.php");
    } else {
        $_SESSION['status'] = "Not Updated";
        header("Location: index.php");
    }
}
if (isset($_POST['delete_highscore'])) {
    $id = $_POST['high'];



    $query = "DELETE FROM highscore WHERE rank_id='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: admin.php");
    } else {
        $_SESSION['status'] = "Not Deleted";
        header("Location: index.php");
    }
}








?>



<!DOCTYPE html>
<html>

<head>
    <title>My website</title>
</head>

<body style="background-color:grey;">
    <style type="text/css">
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
        #text {

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {

            padding: 10px;
            width: 100px;
            color: black;
            background-color: white;
            border: none;
        }

        #box1 {

            background-color: grey;
            margin: auto;
            width: 500px;
            padding: 5%;
        }

        
    </style>

    <body>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li style="float:right"><a href="logout.php">Logout</a></li>
        </ul>
        <div id="box1">

            <form method="post">

                <div style="font-size: 20px;margin: 10px;color: white;">Add word or sentence</div>

                <input id="text" type="text" name="sentence"><br><br>

                <input id="button" type="submit" value="Add"><br><br>
        </div>
        </form>
        <div id="box1">
            <form action="admin.php" method="POST">

                <div style="font-size: 20px;margin: 10px;color: white;">Update word or sentence</div>
                <label for="">Sentence ID</label>
                <input id="text" type="text" name="sent_id" class="form-control"><br><br>

                <label for="">New sentence</label>
                <input id="text" type="text" name="sent" class="form-control"><br><br>


                <button id="button" type="submit" name="update_sent_data">Update Data</button>

        </div>

        </form>
        <div id="box1">
            <form action="admin.php" method="POST">
                <div style="font-size: 20px;margin: 10px;color: white;">Delete word or sentence</div>
                <label for="">Sentence ID</label>
                <input id="text" type="text" name="sent_id" class="form-control"><br><br>
                <button id="button" type="submit" name="delete_sent_data">Delete</button>

        </div>
        </form>

        </form>
        <div id="box1">
            <form action="admin.php" method="POST">
                <div style="font-size: 20px;margin: 10px;color: white;">Add a categorie</div>
                <label for="">Add categorie</label>
                <input id="text" type="text" name="cat" class="form-control"><br><br>
                <button id="button" type="submit" name="sent_to_categories">Add</button><br><br>
                <label for="">Add to categorie</label>
                <input id="text" type="text" name="categorieid" class="form-control"><br><br>
                <input id="text" type="text" name="catword" class="form-control"><br><br>
                <button id="button" type="submit" name="sent_to_catword">Sort</button>

        </div>
        <div id="box1">
            <form action="admin.php" method="POST">
                <div style="font-size: 20px;margin: 10px;color: white;">Delete Highscore</div>
                <label for="">rank_id</label>
                <input id="text" type="text" name="high" class="form-control"><br><br>
                <button id="button" type="submit" name="delete_highscore">Delete</button>


        </div>
        </form>

    </body>

</html>