<?php
include_once "Classes/Map.php";
include_once "Classes/Character.php";
include_once "Classes/Event/EventFunctionArray.php";
include_once "Classes/Event/FunctionEvent.php";
  SESSION_START();
    $char =$_SESSION['char'];
    $objMap = $_SESSION['obj_map'];    
    $n =$_SESSION['n'];
    $goal =$_SESSION['goal'];
  SESSION_WRITE_CLOSE();
    $map = $objMap->getMap();
    $char->setCurrent($n);
    $current = $char->getCurrent();
    $num =$map[$current]["code"];
    if($num>500){
      switch ($num){
      	case 501:
	        $randn=rand(500,10000000);
    	    $char->setMoney($randn);
    	    $contents=$randn.'円の宝くじに当たり';
        	$map[$current]["contents"]=$contents;
      		break;
      	case 502:
      		if($char->getPartner()=='既婚'){
            	$char->setChildren(1);
            	$contents='子供が生まれた。祝い金10万円が入りました！';
            	$char->setMoney(100000);
        	}else{
            	$contents='親戚のいとこに出産祝い金で３万を渡しました！';
            	$char->setMoney(-30000);
        	}
        	$map[$current]["contents"]=$contents;
      	case 503:
   	        if($char->getPartner()=='既婚'){
            	$contents='友たちの結婚式に行きました。祝い金5万円を出しました！';
            	$char->setMoney(-50000);
        	}else{
            	$contents='結婚しました！祝い金も５０万円入りました！';
            	$char->setPartner('既婚');
            	$char->setMoney(500000);
        	}
        	$map[$current]["contents"]=$contents;
        	break;
      	case 504:
      	    $randn=rand(1,10);
	        $pay=-($randn*5000);
    	    $char->setMoney($pay);
        	$contents=$randn.'日間入院しました。'.$pay*(-1).'を払いました。';
        	$map[$current]["contents"]=$contents;
        	break;
      }
    }else{
      $pMoney = $map[$current]["money"]; 
      $char->setMoney($pMoney);
    }  
    if($current>=36){
      $char->setAge(50);
    }else if($current>=24){
      $char->setAge(40);
    }else if($current>=12){
      $char->setAge(30);
    }    
    $name = $char->getName();
    $gender = $char->getGender();
    $money = $char->getMoney();
    $age = $char->getAge();
    $partner = $char->getPartner();
    $children = $char->getChildren();
  SESSION_START();
    $n = rand(1,6);
    $_SESSION['char']=$char;
    $_SESSION['obj_map']=$objMap;
    $_SESSION['n'] = $n;
    $_SESSION['goal']=$goal;
  SESSION_WRITE_CLOSE();
?>
<!DOCTYPE html>
<html lang="jp">
<head>  
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" >
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
    echo '<br>現在MapNo.'.$current.' :'.$map[$current]['contents'];                  
    }else{
      for($i = $goal; $i > $current; $i--){
          if($i%2 == 0){
            echo '<div class="even" id="even">';
          }else{
            echo '<div class="odd" id="odd">';
          }                      
          echo $i.'マス:'.$map[$i]["title"].'</div><br>';
        }
        echo '<br>現在MapNo.'.$current.' :'.$map[$current]['contents'];  
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
<form method="post" action="jgame_recive.php">
<button id="btn" type="submit" value="サイコロ">サイコロを振る
<img id = "diceA" src="../img/dice1.png">
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
