<?php
    class Character{
        private $name;
        private $gender;
        private $money = 0;
        private $current = 0;
        private $partner = '未婚';
        private $age = '20';
        private $children = 0;        
        public function __construct(){
        }
        public function getName(){
            return $this -> name;
        }
        public function setName($name){
            $this -> name = $name;
        }
        public function getGender(){
            return $this -> gender;
        }
        public function setGender($gender){
            $this -> gender = $gender;
        }        
        public function getMoney(){
            return $this -> money;
        }
        public function setMoney($money){
            $this -> money += $money;
        }       
        public function getCurrent(){
            return $this -> current;
        }
        public function setCurrent($n){
            $this -> current += $n;
        }        
        public function getPartner(){
            return $this -> partner;
        }
        public function setPartner($partner){
            $this -> partner = $partner;
        }        
        public function getAge(){
            return $this -> age;
        }
        public function setAge($age){
            $this -> age = $age;
        }        
        public function getChildren(){
            return $this -> children;
        }
        public function setChildren($children){
            $this -> children = $children;
        }
        public function move(){ 
        }
    }
?>