<?php
include 'navbar2.php';

    if($_GET){
        $provision = $_GET['provision'];
        
        }
    $sql_ballot = "SELECT * FROM ballots where provision=$provision";
    $result_ballot = mysqli_query($conn, $sql_ballot);
    
  if (mysqli_num_rows($result_ballot) > 0 ) {
      $i=0;
      while($row = mysqli_fetch_assoc($result_ballot)) {
        
      
        $pid = $row['party_id'];
        $sql_party = "SELECT party_name as pname from parties where party_id = $pid";
        
        $row1 = mysqli_fetch_assoc(mysqli_query($conn, $sql_party));
        $posid = $row['position_id'];
        $sql_position = "SELECT position_name as posname from positions where position_id = $posid";
        
        $row2= mysqli_fetch_assoc(mysqli_query($conn, $sql_position));


        $ballots[$i] = array(
          "bt_id"=>$row['bt_id'],
          "party_name"=>$row1['pname'],
         "position_name"=>$row2['posname'],
           "position_id" => $row['position_id'],
         "party_id"=>$row['party_id'],
         
          "candidate_name" => $row['candidate_name'],
          
          "number_of_vote" => $row['number_of_vote'],
        );
        // print_r($ballots);
        // echo "<br>";
        
  
      $i++;
      }
      // print_r($total);
      // echo "<br>";
  }
?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
         <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>


    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="Chart.min.js"></script>


</head>
<body>
    <div class="result-table">
        <table  class="tbl">
        <tr>
            <th>S.N.</th>
            <th>Party Name</th>
            <th>Candidate Name</th>
            <th>Position Name</th>
            <th>Number of Vote</th>
        </tr>
        <?php foreach($ballots as $index =>$ballot){ ?>
        <tr>
            <td><?=$index + 1?></td>
            <td><?=$ballot["party_name"]?></td>
            <td><?=$ballot['candidate_name']?></td>
            <td><?=$ballot['position_name']?></td>
            <td><?=$ballot['number_of_vote']?></td>
            
        </tr>
        <?php } ?>
    </table>
    </div>	
  
<div class="foot">
                    copyright@2021 hamrovote
                  </div>
</body>
<style type="text/css">
    .tbl
    {
        margin-top: 130px;
        margin-left: auto;
        margin-right: auto;
         border-collapse: collapse;
        width: 50%;
       color: white;
        background-color: black;
    }

table, tr, td, th{
    border:2px solid white;
    padding: 40px 70px;
    font-family: sans-serif;


}

td a
{
    color: black;
}
th{
    height: 25px;
    background-color: black;
    color: white;
}
td{
    text-align: center;
}
 /* tr:nth-child(even){
    background-color:#f5f5f5 ;
}*/
tr:hover{
    background-color:#7f8c8d;
}
.foot
{
    margin-top: 158px;
}


@media  (max-width: 704px)
{
    .tbl
    {
        margin-top: 130px;
        margin-left: auto;
        margin-right: auto;
         border-collapse: collapse;
        width: 5%;
       color: white;
        background-color: black;
        box-shadow: 5px 10px 8px #888888;
    }

    table, tr, td, th{
        border:2px solid white;
        border-radius: 22px;

        padding: 25px 16px;
        font-family: sans-serif;


    }

    td a
    {
        color: black;
    }
    th{
        height: 25px;
        background-color: black;
        color: white;
        width: 10px;
    }
    td{
        text-align: center;
    }
     
    tr:hover{
        background-color:#7f8c8d;
    }
    .foot
    {
        margin-top: 158px;
    }

}

</style>
</html>