<?php 
 require_once("database.php");
 $db=getDB();
foreach($_POST as $exercise){ #loop the amount of exercises in array 
     #save each workout into variables to insert data into database

    
    $ename=$exercise[0];
    $sets=$exercise[1];
    $reps=$exercise[2];
    $weight=$exercise[3];
    $rpe=$exercise[4];

    

    $querydate='SELECT NOW()';
    $statement1=$db->prepare($querydate);
    $statement1->execute();
    $date=$statement1->fetch();
    $date=$date[0];
    $statement1->closeCursor();
    

    $queryWID='SELECT MAX(workoutID) from workout';
    $statement2=$db->prepare($queryWID);
    $statement2->execute();
    $id=$statement2->fetch();
    $id=$id[0]+1;
    $statement2->closeCursor();
    


    $queryCatID='SELECT categoryID from exercise WHERE exercisename=:exercisename;';
    $statement3=$db->prepare($queryCatID);
    $statement3->bindValue(":exercisename",$ename);
    $statement3->execute();
    $catID=$statement3->fetch();
    $catID=$catID[0];
    $statement3->closeCursor();
    

    $query = "INSERT INTO workout(workoutID, workoutDate, categoryID, exerciseName, `set`, reps, RPE, `weight`) VALUES (:wID,:wDate,:cID,:eName,:setsS,:reps,:rpe,:weightT)";
    $statement4=$db->prepare($query);
    $statement4->bindValue(":wID",(int)$id);
    $statement4->bindValue(":wDate",$date);
    $statement4->bindValue(":cID",(int)$catID);
    $statement4->bindValue(":eName",$ename);
    $statement4->bindValue(":setsS",(int)$sets);
    $statement4->bindValue(":reps",(int)$reps);
    $statement4->bindValue(":rpe",(int)$rpe);
    $statement4->bindValue(":weightT",(int)$weight);
    $statement4->execute();
    $statement4->closeCursor();

}  


?>

<html>
    <head><title>Workout Summary</title></head>
    <body>
    <?php include('header.php'); ?>
        <main>
        <h1> Summary of workout</h1>
        <table>
              <tr>
                <th>exercise</th>
                <th>sets</th>
                <th>reps</th>
                <th>weight </th>
                <th>RPE</th>
                <th>Recommendations for next week: </th>
            </tr>
                <?php foreach($_POST as $EXERCISES): 
                    
                     
    
   
    $Rreps=(int)$exercise[2];
    $Rweight=(int)$exercise[3];
    $Rrpe=(int)$exercise[4];

                    ?>
                    
                    <tr>
                        <td><?php echo $EXERCISES[0]?></td>
                        <td><?php echo $EXERCISES[1]?> </td>
                        <td> <?php echo $EXERCISES[2]?></td>
                        <td> <?php echo $EXERCISES[3]?></td>
                        <td> <?php echo $EXERCISES[4]?></td>
                        <td><?php if ($Rreps >= 6 && $Rreps <= 8) {
                        if ($Rrpe<=8){
                          $Rweight+=5;
                          
                        }
                        
                      }
                      elseif ($Rreps > 8){
                          if($Rrpe<=9){$Rweight+=5;}
                      }
                      elseif ($Rreps < 6){
                          if($Rrpe>=8){$Rweight-=5;}
                      }
                      if($Rreps<3){
                        $Rreps+=3;
                      }
                      echo "Aim for Weight: ".$Rweight."  and aim for higher repeitions than: ".($Rreps-3);
                    ?> </td>
                    </tr>
                <?php endforeach?>    
                
        </main>
    </body>
</html>