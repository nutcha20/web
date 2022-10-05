<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Noto Sans Mono', monospace;   
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
                        echo "<option value='$value'>". $key ."</option>"; 
                    }
                }
                
            ?>
            </select>
            <input type="number" id="number" name="number" placeholder="Enter number" required />
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
                        echo "<option value='$value'>". $key ."</option>"; 
                    }
                }
            ?>
            </select>
            <input type="text" id="prodname" name="prodname" placeholder=""/>
        </div>
        <input type="text" id="ans" name="name" placeholder="ans">
        <button type="submit" name="submit">Convert</button>
        
    </form>
</body>
</html>