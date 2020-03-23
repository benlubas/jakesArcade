<?php
  include("../includes/connection.php");
  $link = $_POST['link'];
  $sql = "SELECT title, instructions FROM games WHERE link='$link';";
  $row = $con -> query($sql) -> fetch_assoc();
  echo $row['title']."12#$5".$row['instructions'];
?>