<?php
include_once "Classes/Character.php";
SESSION_START();
  $char =$_SESSION['char'];
SESSION_WRITE_CLOSE();
  $name = $char->getName();
  $gender = $char->getGender();
  $money = $char->getMoney();
  $age = $char->getAge();
  $partner = $char->getPartner();
  $children = $char->getChildren();
?>
<!DOCTYPE html>
<html lang="jp">
<head>  
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>人生ゲーム</title>
<link rel="stylesheet" href="../css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<header><h2>人生ゲーム（V1.0.5）</h2></header>
<main>
<div class="main-container">
<div class="temp-box">                
<div class="container info">
<h1>最終結果!</h1>
<span id="photo">
<?php
switch ($gender) {
  case 'm':
    echo "<img src=\"../img/character1.png\" width=\"100\" height=\"170\">";
      break;
  case 'f':
    echo "<img src=\"../img/character2.png\" width=\"100\" height=\"170\">";
      break;
}
echo '</span>';
echo '<p>';
echo '<table class="table table-striped">';
echo '<tr><td>名前 :</td><td>'.$name.'</td></tr>';
echo '<tr><td>年齢 ：</td><td>'.$age.'      歳</td></tr>';
echo '<tr><td>所持金 :</td><td>'.$money.'   円</td></tr>';
echo '<tr><td>結婚 ：</td><td>'.$partner.' </td></tr>';
echo '<tr><td>子供 :</td><td>'.$children.'  人</td></tr>';
echo '</table>';
echo '</p>';
/*$sqll = $conn->query( "INSERT INTO player (name, money, current, partner, age, children) 
    VALUES ($name, $money, $current, $partner, $age, $children)");

    
  $conn->query("INSERT INTO player (name, gender, money, current,
            partner, age, children) VALUES ($name, $gender, $money,
            $current,$partner,$age,$children)");
  
  $conn->close(); */
?>
</div></div></div>
<footer>Team TripleAxel</footer>
</body>
</html>

