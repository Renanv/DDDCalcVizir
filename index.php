<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
        <title>DDD Price Calculation</title>
        
</head>
    <!--Defines the values in a form tag-->
<body>
    <form name="order"
          action=""
          method="post">
    <h4>Calculate DDD costs</h4>
    <br>
    <br>
    Origin:
    <select name="origin" value="true">
        <option value=" "></option>
        <option value="1">011</option>
        <option value="2">016</option>
        <option value="3">017</option>
        <option value="4">018</option>
    </select>
    Destination:
    <select name="destination" value="true">
        <option value=" "></option>
        <option value="1">011</option>
        <option value="2">016</option>
        <option value="3">017</option>
        <option value="4">018</option>
    </select>
    <input type="number" name="timeSpent" placeholder="Time spent calling" value="true"  />
    Subscription:
    <select name="subscription" value="true">
        <option value=" "></option>
        <option value="30">FaleMais 30</option>
        <option value="60">FaleMais 60</option>
        <option value="120">FaleMais 120</option>
    </select>    
    <br><br><input type="submit" width="300px" name="submit"
               value="Calculate"/>
    </form>
    
<?php
    //read values from form
if(isset($_POST["submit"]) ){
    $origin = $_POST["origin"];
    $destination = $_POST["destination"];
    $subscription = $_POST["subscription"];
    $timeSpent = $_POST["timeSpent"];
    $spent = floatval($timeSpent);
    $sub = floatval($subscription);
function DDD($origin, $destination)
{
    $DDD = array();
    $DDD[1] = array();
    $DDD[2] = array();
    $DDD[3] = array();
    $DDD[4] = array();
    $DDD[1][1] = 0;
    $DDD[1][2] = 1.90;
    $DDD[1][3] = 1.70;
    $DDD[1][4] = 0.90;
    $DDD[2][1] = 2.90;
    $DDD[2][2] = 0;
    $DDD[2][3] = 1.20;
    $DDD[2][4] = 2;
    $DDD[3][1] = 2.70;
    $DDD[3][2] = 0.20;
    $DDD[3][3] = 0;
    $DDD[3][4] = 1.80;
    $DDD[4][1] = 1.90;
    $DDD[4][2] = 1;
    $DDD[4][3] = 0;
    $DDD[4][4] = 0.80;
    return($DDD[$origin][$destination]);
}
    $result = floatval(DDD($origin, $destination));
    $withSub = ($spent - $sub);
    $totalWithoutSub = $result * $spent;
    $totalWithSub = ($result * $withSub) * 1.10;
    echo "Your total costs calling with subscription would be: $" . $totalWithSub . "<br>";
    echo "Your total costs calling without subscription would be: $" . $totalWithoutSub;
}
?>
</body>
</html>
