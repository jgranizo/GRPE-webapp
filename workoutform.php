<?php
//suggested reps and sets for workout today
//include exercises for category picked
require_once('database.php');
$sbd=filter_input(INPUT_POST,'image_clicked');
//
//pick exercises
// And submit it,
//next form will submit rpe sets and reps and WILL submit it to workout table



//i want to ask user how many exercises he will do based on compound and if any other extra exercises 
//outside of compound



//i want to display the specific amount of exercises the
$querySBD='SELECT * FROM exercise WHERE categoryID =(
                    SELECT categoryID FROM exercise WHERE exerciseName= :exercise_name);';
$db=getDB();                    
$statement=$db->prepare($querySBD);
$statement->bindValue(':exercise_name',$sbd);
$statement->execute();
$exercises=$statement->fetchAll();
$statement->closeCursor();
//print_r($exercises)



$query='SELECT* FROM exercise WHERE categoryID!=(
    SELECT categoryID FROM exercise where exerciseName=:exercise_name);';
$statement2=$db->prepare($query);
$statement2->bindValue(':exercise_name',$sbd);
$statement2->execute();
$nonCompound=$statement2->fetchAll();
$statement2->closeCursor();
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="styles.css">
      
 
    <title>Dynamic Exercise Form</title>
</head>
<body>
<?php include('header.php');?>
    <label for="numExercises">Number of Exercises for compound: </label>
    <input type="number" id="numExercises" min="0" max="5" value="0">
    <button type="button" onclick="generateExerciseDropdowns()">Generate</button>


    <label for="nonNumExercises">Number of Exercises for non-compound: </label>
    <input type="number" id="nonNumExercises" min="0" max="5" value="0">
    <button type="button" onclick="generateExerciseDropdowns2()">Generate</button>
    <br>
    <span></span>

    <form action="rpe_form.php" method="post" id="exercisesForm">
        <div id="exerciseTemplate" style="display:none;">
            <div class="exercise-dropdown">
                <label>Exercise: </label>
                <select name="exercise">
                    <?php foreach($exercises as $exercise): 
                       echo htmlspecialchars($exercise['exerciseName']);?>
                        
                        <option value="<?php echo htmlspecialchars($exercise['exerciseName']); ?>">
                            <?php echo htmlspecialchars($exercise['exerciseName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
            </div>
        </div>
    
        <div id="exerciseTemplate2" style="display:none;">
            <div class="exercise-dropdown2">
                <label>Exercise: </label>
                <select name="exercise">
                    <?php foreach($nonCompound as $other): ?>
                        <option value="<?php echo htmlspecialchars($other['exerciseName']); ?>">
                            <?php echo htmlspecialchars($other['exerciseName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
            </div>
        </div>
        <div id="exercises"></div>
        <div id="exercises2"></div>

       <div id="total"> <input type="hidden" id="totalNumExercises" name="totalNumExercises" value="">
        </div>

        <input type="submit"  value="Submit" id="sub">
        <span></span>
    </form>


</body>
</html>
    
</main>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" 
integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
crossorigin="anonymous"></script>

        <script
        src="workoutform.js">
    </script>
</body>
</html>