<html>
    <head>
        <title>
            Object Oriented Programming in PHP
        </title>
        <h1>Object Oriented Programming in PHP</h1>
    </head>
    <body>
        <?php
        class Person{
            
            protected $name;
            protected $age;
            protected $height; #in inches
            protected $id;
            
            public static $currentId = 1001;
            public static $numOfPeople = 0;
            
            function getname(){
                return $this->name;
            }
            function getage(){
                return $this->age;
            }
            function getheight(){
                return $this->height . " inches";
            }
            function getid(){
                return $this->id;
            }
            
            function __construct($name){
                $this->id = Person::$currentId;
                Person::$currentId++;
                $this->name = $name;
                echo $this->name . " has been assigned ID #" . $this->id . "<br>";
            }
            
            public function __destruct(){
                echo $this->name . " is being removed" . "<br>";
            }
            
            function __get($getter){
                echo "Asked for " . $getter . "</br>";
                return $this->$getter;
            }
            
            function __set($setter, $value){
                switch ($setter){
                    case "name":
                        $this->name = $value;
                        break;
                    case "age":
                        $this->age = $value;
                        break;
                    case "height":
                        $this->name = $value;
                        break;
                    case "id":
                        $this->id = $value;
                        break;
                    default:
                }
                
                echo "Set " . $setter . " to " . $value . "<br>";
            }
            
            function work(){
                echo $this->name . " works." . "<br>";
            }
            
            function __toString(){
                $str = "";
                $str = $str . "This is " . $this->name . "<br>";
                $str = $str . $this->name . " is " . $this->age . " years old, and " . $this->height . " inches tall." . "<br>";
                echo $str;
                $this->work();
                echo "<br>";
            }
        }
        
        class Boss extends Person{
            function work(){
                echo $this->name . " makes others work." . "<br>";
            }
        }
        
        $Person1 = new Person("Mike");
        $Person2 = new Boss("Jeff");
        
        $Person1->__set("age", 21);
        $Person1->__set("height", 70);
        
        $Person2->__set("age", 27);
        $Person1->__set("height", 65);
        
        echo "<br>";
        
        $Person1->__toString();
        $Person2->__toString();
        
        ?>
    </body>
</html>