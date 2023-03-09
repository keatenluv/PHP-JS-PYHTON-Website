<!DOCTYPE html>

<!-- LEARNING -->

 <body>
    <?php
    // Comment 
    # Comment
    /*
    Comment
     */

    // Create a variable
    # '$'variableName = value;

    $x = 5;

    $txt = "PHP";
    echo "I love $txt!";
    ?>

    
    <?php 



    // Declaring Functions
    function firstFunction() {
        global $x;
        $x = $x + $x;
        echo "<p> The variable x in my first function is equal to $x</p>";
    }
    
    firstFunction();

    // All global variables are stored in an array called
    $GLOBALS['x'];
    # The index is the name of the variable

    function staticTest(){
        static $y = 1;
        echo "$y</br>";
        $y++;
    }

    staticTest();
    staticTest();
    staticTest();
    
    ?>

    <!--   Variables     -->
    <?php 
    
    # Float
    $fl = 10.569;
    var_dump($fl);
    echo "<h1>$fl</br></br></h1>";

    # Bool
    $bl = true;
    var_dump($bl);
    echo "</br>$bl</br></br>";

    # Array 
    $cars = array("Volvo", "BMW", "Toyota");
    var_dump($cars);
    echo "</br>$cars[0]</br>";
    
    # Objects
    class Drink {
        public $type;
        public $APC;
        public function __construct($type, $APC){
            $this->type = $type;
            $this->APC = $APC;
        }
        public function message(){
            return "</br>This drink is a " . $this->type . " and contatins " . $this->APC . "% alcohol";
        }
    }

    $beer = new Drink("Beer", 4.5);
    echo $beer -> message();
    echo "</br>";
    $ginTonic = new Drink("Gin and Tonic", 13.5);
    echo $ginTonic -> message();


    # Null
    $nul = null;
    echo "</br>";
    var_dump($nul);
    ?>

    <!--  Numbers  -->
    <?php 
    
    echo "<br>";

    # Check if value is numeric
    $x = 589;
    var_dump(is_numeric($x));
    echo "<br>";
    $x = "hello5";
    var_dump(is_numeric($x));

    $x = "50";

    ?>

    <!-- Constants -->
    <?php 
    define("HEADER", "<h1>My name is Keaton Love and you should hire me.</h1>");
    echo HEADER;
    ?>

<body>

</html>