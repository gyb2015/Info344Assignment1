<html>
<head>
<title>Online Php Script Execution</title>
</head>
<body>
<?php
try 
{
 // $playerName = $_POST["playerName"];//
  $conn = new PDO('mysql:host=awsuser.c3lb8gup7igo.us-west-2.rds.amazonaws.com; dbname=mydb', 'info344user', '340344380=9.0');
  $stmt = $conn->prepare("SELECT * FROM nbaplayers WHERE playerName LIKE '%".$_POST["playerName"]."%'");
  /*$stmt = $conn->prepare("SELECT * FROM nbaplayers WHERE CONCAT( nameFirst,  ' ', nameLast ) LIKE  '%Joe%'");*/
  
//  echo  $playerName;//
  $stmt->execute(); 
  $result = $stmt->fetchAll();
  if ( count($result))
    {
     foreach($result as $row)
     {
       print $row['playerName'].'   '.$row['GP'].'   '.$row['FGP']. '   '.$row['TPP']. '   '.$row['FTP']. '   '.$row['PPG'].'<br>';
      }
    }
    else
    {
       echo "No rows returned.";       
    }
}
catch(PDOException $e)
{
  echo 'Error: ' . $e->getMessage();
}
    
    
?>
</body>
</html>