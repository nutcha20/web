<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chonburi&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Prompt', sans-serif;
    }
</style>
<body>
    <h3>Currency Converter</h3>
    <form action="show.php" method="POST">
        <div class="row">
            <label for="change">From:</label>
            <select id="change" name="change">
            
            <?php
                $url = "http://10.0.15.20/lab8/restapis/currencyrate";    
                $response = file_get_contents($url);
                $result = json_decode($response);
                
                foreach ($result->rates as $key=>$value){
                        if($key == "THB" || $key == "JPY" || $key == "CNY" || $key == "SGD" || $key == "USD"){
                            if ($_POST['change'] == $value){
                                echo "<option value='$value'selected>". $key ."</option>";
                            }
                            else{
                                echo "<option value='$value'>". $key ."</option>"; 
                            }
                        }
                }
                
            ?>
            </select>
            <?php
                $num1 = $_POST['number'];
                echo "<input type='number' id='number' name='number' placeholder='Enter number'  value='$num1' required />";
            ?>
        </div>
        <br>
        <div class="row">
            <label for="change2">To:</label>
            <select id="change2" name="change2">
        
            <?php
                $url = "http://10.0.15.20/lab8/restapis/currencyrate";    
                $response = file_get_contents($url);
                $result = json_decode($response);
                
                foreach ($result->rates as $key=>$value){
                    if($key == "THB" || $key == "JPY" || $key == "CNY" || $key == "SGD" || $key == "USD"){
                        if ($_POST['change2'] == $value){
                            echo "<option value='$value'selected>". $key ."</option>";
                        }
                        else{
                            echo "<option value='$value'>". $key ."</option>"; 
                        }
                    
                }
            }
                
            ?>
            </select>
            <?php
                $ccc = $_POST['change'];
                $num = $_POST['number'];
                $ccc_want = $_POST['change2'];
                $total = ($num/$ccc) * $ccc_want;
                $total =  number_format($total, 2, '.', '');
                echo "<input type='text' id='prodname' name='prodname' placeholder'' value='$total'/>";
                
            ?>
            <!-- <input type="text" id="prodname" name="prodname" placeholder=""/> -->
        </div>
        <br>
        <button type="submit" name="submit">Convert</button>
    </form>
</body>
</html>