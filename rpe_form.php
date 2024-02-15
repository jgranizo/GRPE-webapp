<?php
//rpe for workout
require_once('database.php');
$exercise_name1=filter_input(INPUT_POST,'exercise1');
$exercise_name2=filter_input(INPUT_POST,'exercise2');
$exercise_name3=filter_input(INPUT_POST,'exercise3');
$exercise_name4=filter_input(INPUT_POST,'exercise4');
$exercise_name5=filter_input(INPUT_POST,'exercise5');
$exercise_name6=filter_input(INPUT_POST,'exercise6');
$exercise_name7=filter_input(INPUT_POST,'exercise7');
$exercise_name8=filter_input(INPUT_POST,'exercise8');
$exercise_name9=filter_input(INPUT_POST,'exercise9');
$exercise_name10=filter_input(INPUT_POST,'exercise10');
$total_number=filter_input(INPUT_POST,"totalNumExercises");

$exerciseArray=[$exercise_name1,$exercise_name2,$exercise_name3,$exercise_name4,$exercise_name5,$exercise_name6,$exercise_name7,$exercise_name8,$exercise_name9,$exercise_name10];

$db=getDB();  
 foreach ($exerciseArray as $index => $name) {
  if ($name != '') {
      $query = 'SELECT reps, RPE, weight FROM workout WHERE exerciseName = :exerciseName ORDER BY workoutID DESC LIMIT 1;';
      $statement = $db->prepare($query);
      $statement->bindValue(':exerciseName', $name);
      $statement->execute();
      $exercises = $statement->fetchAll();
      $statement->closeCursor();
      $sqlExercises[] = $exercises; //appending array with query result
  }
}

?>
<html>
    <head>
        <title> Workout </title>

    </head>

    <body>
        <?php include('header.php')?>
        <main>
           
            <table>
              <tr>
                <th>exercise</th>
                <th>sets</th>
                <th>reps</th>
                <th>weight (lbs) </th>
                <th>RPE</th>
                <th>Recommendations</th>
              </tr>
              <form action="workout_summary.php" method="post">
              <?php foreach($exerciseArray as $index => $e): ?>
                <?php if($e ==""){break;}
                
                ?>
                
              <tr><td> <input type="hidden" id="exercise_name<?php echo $index;?>" value="<?php echo (string)$e?>" name="e<?php echo $index;?>[]"><?php  echo (string)$e ?></td>                
               <td> <input type="number" id="set<?php echo $index;?>" min="1" max="6" value="0" name="e<?php echo $index;?>[]"></td>
               <td> <input type="number" id="reps<?php echo $index;?>" min="1" max="50" value="0" name="e<?php echo $index;?>[]"></td>
               <td> <input  type="number" id="weight<?php echo $index;?>" step="0.01" min="1" max="1000" value="0" name="e<?php echo $index;?>[]"></td>
               <td> <input  type="number" id="RPE<?php echo $index;?>" min="6" max="10" value="0" name="e<?php echo $index;?>[]"></td>
                <td> <?php ?></td>
              <td><?php 
              
              if (!$sqlExercises[$index])
              {echo "Have no data for this workout yet, Aim for 3 sets from 8-12 reps with medium to light weight to see where you are. ";}
              else{

                      $rep=(int)$sqlExercises[$index][0]["reps"];
                      $weight=(int)$sqlExercises[$index][0]["weight"];
                      $rpe=(int)$sqlExercises[$index][0]["RPE"];
                      if ($rep >= 6 && $rep <= 8) {
                        if ($rpe<=8){
                          $weight+=5;
                          
                        }
                        
                      }
                      elseif ($rep > 8){
                          if($rpe<=9){$weight+=5;}
                      }
                      elseif ($rep < 6){
                          if($rpe>=8){$weight-=5;}
                      }
                      if($rep<3){
                        $rep+=3;
                      }
                      echo "Aim for Weight: ".$weight."  and aim for higher repeitions than: ".($rep-3);}
                      ?></td>
              
              </tr>
                <?php endforeach;?>
                
               
              </tr>
            </table>
            <input type="submit" >
            </form>
        </main>
    </body>
</html>
