<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   
<form method="POST">
<?php
   // Connect to Database 
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('customers.db');
      }
   }

   // Open Database 
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully<br>";
   }

   $sql ="SELECT * from customers";
   $ret = $db->query($sql);
   $num = 0;
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo $row['CustomerId'] . " ";
      echo $row['FirstName'] ." ";
      echo $row['LastName'] ." ";
      echo $row['Company'] ."<br><br>";
      $num = $row['CustomerId'];
   }
   echo "<button type='submit' name='submit'>del</button>";
   if(isset($_POST["submit"])){
      $sql = "DELETE from customers where CustomerId = $num";
      $ret = $db->exec($sql);
      if(!$ret){
        echo $db->lastErrorMsg();
      } else {
         echo $db->changes(),"finish";
         header('Refresh: 0');
      }
   }
   $db->close();

?>
</form>
</body>
</html>