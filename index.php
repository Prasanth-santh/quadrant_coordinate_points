<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="overall">
        <form action="" method="post">
        <label for="xvalue">X Value</label><br/>
            <input type="number" id="xvalue" name="xvalue"><br/>
            <select name="xaxis" >
                <option value="">----</option>
                <option value="left">Left</option>
                <option value="right">Right</option>
            </select><br/>
            <label for="yvalue">Y Value</label><br/>
            <input type="number" id="yvalue" name="yvalue"><br/>
            <select name="yaxis" >
                <option value="">----</option>
                <option value="up">Up</option>
                <option value="down">Down</option>
            </select><br/>
            <input type="submit" value="Submit" id="submit" name="submit"><br/>
            <?php
              $totalarr=[];
              session_start(); // Start the session

                // Initialize or update the session array for storing coordinates
                if (!isset($_SESSION['coordinates'])) {
                    $_SESSION['coordinates'] = [];
                }
                if(isset($_POST["submit"])){
                    $xvalue=$_POST["xvalue"];
                    $yvalue=$_POST["yvalue"];
                    $xaxis=$_POST["xaxis"];
                    $yaxis=$_POST["yaxis"];
                    // echo $xvalue,$xaxis,$yvalue,$yaxis;
                    if($xvalue!=="" && $yvalue!==""){
                        if($xaxis=="left"){
                            $xvalue="-".$xvalue;
                        }
                        if($yaxis=="down"){
                            $yvalue="-".$yvalue;
                        }
                        $i=$_SESSION['coordinates'];
                        $count=count($_SESSION['coordinates']);
                        // echo $count;
                        if($count==0){
                            echo "The cordinates is ($xvalue,$yvalue)";
                            $total="($xvalue,$yvalue)";
                            $arr=array($xvalue,$yvalue);
                            $_SESSION['coordinates'][] = [$xvalue, $yvalue,$total,$arr];
                        }
                        if($count>=1){
                            $xx=$i[$count-1][3][0];
                            $yy=$i[$count-1][3][1];
                            $xxval=$xx+$xvalue;
                            $yyval=$yy+$yvalue;
                            echo "The cordinates is ($xxval,$yyval)";
                            $total="($xxval,$yyval)";
                            $arr=array($xxval,$yyval);
                            $_SESSION['coordinates'][] = [$xvalue, $yvalue,$total,$arr];
                        }
                    }
                    else{
                        echo "Enter the value";
                    }
                }
                // print_r($_SESSION['coordinates']);
               
                
               
            ?>
        
        <form action="" method="post">
            <input type="submit" value="Total Submit" id="submit1" name="total_submit">
            <?php
                 if (isset($_POST['total_submit'])) {
                    echo "<h2>Stored Coordinates:</h2>";
                    echo "<table border='1'>";
                    echo "<tr><th>X Value</th><th>Y Value</th> <th>Coordinates</th></tr>";
                    foreach ($_SESSION['coordinates'] as $coordinate) {
                        echo "<tr><td>{$coordinate[0]}</td><td>{$coordinate[1]}</td><td>{$coordinate[2]}</td></tr>";
                    }
                    echo "</table>";
                    $_SESSION['coordinates']=[];
                    // Clear coordinates if needed
                    // unset($_SESSION['coordinates']);
                }
            ?>
        </form>
        </form>
    </div>
</body>
</html>