<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
  <link rel = "stylesheet" type = "text/css" href = "index1.css">
  <link rel="stylesheet" href="../jquery/jquery.min.js">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php  
class Strawberry extends Fruit {

private $taste;
const FRUIT_ID = 89;

function __construct($taste,$name, $color,$sort = 'k2') {

    $this->taste = $taste;
    parent::__construct($name, $color,$sort);
             
  }

  

    public function __get($taste) {
    return "The name of the taste is : ".$this->$taste;
  }




}



class Fruit {
  public $name;
  public $color;
  public $s;

  function __construct($name, $color,$sort = 'k2') {
    $this->name = $name;
    $this->color = $color;
    $this->s = $sort;
  }
  function get_name() {
    return "The name of the fruit is : ".$this->name;
  }
  function get_color() {
    return "The color of the fruit is : ".$this->color;
  }
  function get_sort() {
    return "The sort of the fruit is : ".$this->s;
  }
}

$apple = new Strawberry("Sweet","Apple","red");

echo $apple->name = "Mango";
echo "</br>";
echo $apple->get_color();
echo "</br>";
echo $apple->get_sort();
echo "</br>";
echo $apple->taste;
ECHO "</br>";

echo Strawberry::FRUIT_ID;


$x = array();
array_push($x,$apple);

var_dump($x);

echo $x[0]->name;

?>

<div class="container">
  <div class="row align-items-center justify-content-center" style="height:50px;">
    
    <div class="col-lg-2">
      <button type="submit" style="height: 50px;width:150px;font-family: Poppins;margin: auto;" class="btn btn-danger btn-lg" onclick="tmr = !tmr">Start Count</button>
    </div>
    <div class="col-lg-2 align-items-center " style="margin-left: -15px;"><h1 id="timer" style="font-family: Poppins;margin: auto;">op</h1></div>
  </div>
  
  
</div>



  
</body>
</html>





<script>

                      tmr = false;

                      cnt = 0;

                      setInterval(function(){


                        if(tmr){

                          timer.innerText = ++cnt;

                        }

                      },10);


</script>





  







