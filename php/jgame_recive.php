<?php
include_once "Classes/Character.php";
include_once "Classes/Map.php";
SESSION_START();
  $char =$_SESSION['char'];
  $objMap =$_SESSION['obj_map'];
  $n =$_SESSION['n'];
  $goal =$_SESSION['goal'];
SESSION_WRITE_CLOSE();
  $map = $objMap->getMap();
  $name = $char->getName();
  $gender = $char->getGender();
  $money = $char->getMoney();
  $age = $char->getAge();
  $partner = $char->getPartner();
  $children = $char->getChildren();
  $current = $char->getCurrent();
  $aftern=$current+$n;
SESSION_START();  
  $_SESSION['char']=$char;
  $_SESSION['obj_map']=$objMap;
  $_SESSION['n'] = $n;
  $_SESSION['goal'] = $goal;
SESSION_WRITE_CLOSE();
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
<h3>マス先情報</h3>
<?php
  if($current <= $goal-6){
  for($i = $current+6; $i > $current; $i--){
    if($i%2 == 0){
      echo '<div class="even" id="even">';
    }else{
      echo '<div class="odd" id="odd">';
    }                      
    echo $i.'マス:'.$map[$i]["title"].'</div><br>';
  }
  echo '<br>移動先MapNo.'.$aftern.' :'.$map[$aftern]['contents'];                  
  }else{
    for($i = $goal; $i > $current; $i--){
        if($i%2 == 0){
          echo '<div class="even" id="even">';
        }else{
          echo '<div class="odd" id="odd">';
        }                      
        echo $i.'マス:'.$map[$i]["title"].'</div><br>';
      }
      if($aftern<=$goal){
        echo '<br>移動先MapNo.'.$aftern.' :'.$map[$aftern]['contents'];
      }else{
        echo '<br>移動先 :  goal!!!';
      } 
  }
?>
</div></div>
<div class="temp-box">
<h3>キャラクター情報</h3>
<div class = character>
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
echo '<table class="table table-striped">';
echo '<tr><td>名前 :</td><td>'.$name.'</td></tr>';
echo '<tr><td>年齢 ：</td><td>'.$age.'      歳</td></tr>';
echo '<tr><td>所持金 :</td><td>'.$money.'   円</td></tr>';
echo '<tr><td>結婚 ：</td><td>'.$partner.' </td></tr>';
echo '<tr><td>子供 :</td><td>'.$children.'  人</td></tr>';
echo '</table>';
?>
<br><br><br>
<div class="container dice">
<form method="post" action="
<?php 
  if($aftern > $goal){
    echo 'End.php';
  }else{
    echo 'jgame.php';
  }
?>">
<button id="btn" type="submit" value="進む">進む
<?php
echo '<img id ="dice" src="../img/dice'.$n.'.png" valu="'.$n.'">';
?>
</button>
</form>
</div>
</div>
</div>
<div class="temp-box">
<div class="currentMap">
</div>
</div>
<div class="temp-box">
</div>
</div>
</main>
<footer>Team TripleAxel</footer>
</body>
</html>
