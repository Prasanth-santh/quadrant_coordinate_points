<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <input type="submit" value="Total Submit" name="total_submit">
            <?php
                session_start();
                if(!isset($_SESSION["count"])){
                    $_SESSION["count"]=0;
                }
                $_SESSION["count"]++;
              $totalarr=[];
                if(isset($_POST["submit"])){
                    $xvalue=$_POST["xvalue"];
                    $yvalue=$_POST["yvalue"];
                    $xaxis=$_POST["xaxis"];
                    $yaxis=$_POST["yaxis"];
                    // echo $xvalue,$xaxis,$yvalue,$yaxis;
                    if($xaxis=="left"){
                        $xvalue="-".$xvalue;
                    }
                    if($yaxis=="down"){
                        $yvalue="-".$yvalue;
                    }
                    echo "The cordinates is ($xvalue,$yvalue)";
                    $total="($xvalue,$yvalue)";
                    $addval=array($xvalue, $yvalue,$total);
                    $status=true;
                    while($status){
                        $totalarr[$_SESSION["count"]] =$addval;
                        $status=false;
                    }
                    
                    
                }
                // print_r($_SESSION['coordinates']);
               print_r($totalarr);
               echo count($totalarr);
               if (isset($_POST['total_submit'])) {
                echo "<h2>Stored Coordinates:</h2>";
                echo "<table border='1'>";
                echo "<tr><th>X Value</th><th>Y Value</th> <th>Coordinates</th></tr>";
                for($i=0;$i<=count($totalarr)-1;$i++){
                    echo "<tr><td>{$totalarr[0]}</td><td>{$totalarr[1]}</td><td>{$totalarr[2]}</td></tr>";

                }
                echo "</table>";
                $totalarr=[];
                // Clear coordinates if needed
                // unset($_SESSION['coordinates']);
                session_destroy();
            }
               
            ?>
        </form>
        <form action="" method="post">
            
        </form>
    </div>
</body>
</html>