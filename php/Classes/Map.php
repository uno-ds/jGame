<?php
    class Map{    
        private $goal = 0;
        private $map =array();
        public function __construct($n){
            $servername = '****';
            $username = '****';
            $password = '****';
            $dbname = '****';           
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              $conn->close();
            }
            // echo "DB Connected successfully";
            $goal = $n*6;
            $map = array();
            $sqla = 'SELECT id,title, money, contents 
            FROM event_nofunction ORDER BY rand() LIMIT 1';
            $sqlb = 'SELECT id,title, contents 
            FROM event_function ORDER BY rand() LIMIT 1';
            $y=0;
            for($i=0;$i<$goal-$n;$i++){
                ++$y;
                $result=$conn->query($sqla);
                $row = $result ->fetch_array(MYSQLI_ASSOC);
                $map[$y] = array("code"=>$row["id"],"title"=>$row["title"],"money"=>$row["money"],"contents"=>$row["contents"]);
            }
            for($i=0;$i<=$n;$i++){
                ++$y;
                $result=$conn->query($sqlb);
                $row = $result ->fetch_array(MYSQLI_ASSOC);
                $map[$y] = array("code"=>$row["id"],"title"=>$row["title"],"contents"=>$row["contents"]);
            }
            shuffle($map);
            $this->goal = $goal;
            $this->map = $map;
            $conn->close();
        }
        public function getMap(){
            return $this->map;
        }
        public function getGoal(){
            return $this->goal;
        }
    }
?>
