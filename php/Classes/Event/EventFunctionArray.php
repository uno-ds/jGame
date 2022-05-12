<?php
include_once "Classes/Event/FunctionEvent.php";
$events = [];
class e501 implements Event{
    private $contents;
    public function event($char){
        $n=rand(500,10000000);
        $char->setMoney($n);
        $contents=$n.'円の宝くじに当たり';
        $this->contents=$contents;
    }
    public function getContents(){
        return $this->contents;
    }
}
class e502 implements Event{
    private $contents;
    public function event($char){
        if($char->getPartner()=='既婚'){
            $char->setChildren(1);
            $contents='子供が生まれた。祝い金10万円が入りました！';
            $char->setMoney(100000);
        }else{
            $contents='親戚のいとこに出産祝い金で３万を渡しました！';
            $char->setMoney(-30000);
        }
        $this->contents=$contents;
        return $contents;
    }
    public function getContents(){        
        return $this->contents;
    }
}
class e503 implements Event{
    private $contents;
    public function event($char){
        if($char->getPartner()=='既婚'){
            $contents='友たちの結婚式に行きました。祝い金5万円を出しました！';
            $char->setMoney(-50000);
        }else{
            $contents='結婚しました！祝い金も５０万円入りました！';
            $char->setPartner('既婚');
            $char->setMoney(500000);
        }
        $this->contents=$contents;
        return $contents;
    }
    public function getContents(){        
        return $this->contents;
    }
}
class e504 implements Event{
    private $contents;
    public function event($char){
        $n=rand(1,10);
        $pay=-($n*5000);
        $char->setMoney($pay);
        $contents=$n.'日間入院しました。'.$pay*(-1).'を払いました。';
        $this->contents=$contents;
        return $contents;
    }
    public function getContents(){        
        return $this->contents;
    }
}
$events["501"] = new e501();
$events["502"] = new e502();
$events["503"] = new e503();
$events["504"] = new e504();
?>