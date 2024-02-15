<?php
//welcome page
//select what sbd you want to hit
//nav bar with sbd previous lifts
//work on sbd pages last
//idea for that is to estimate when pr will occur and progress bar

//require_once('database.php');


//create 3 cards
//keep it simple
// squat bench deadlift
//add variety after
//ask user for number of exercises will be accomplished
//run a for loop for form to show what exercises to pick with the var got from homepage
//number of sbd group exercises, number of other group member exercises
//form for the 2 numbers needed ^ . homepage will just look pretty with no forms
//just links to the sbds
//sbds will show past 3 RPE 10s for category and previous category workouts.


?>

<html>
    <head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GRPE</title>
       <link rel ="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
    <?php include('header.php');?>



        <h1>GRPE</h1>
        <main>Welcome! Click on an image with the compound lift you would like to focus on for your workout today!</main>
        <form action="workoutform.php"  method='post';>

        <button name="image_clicked" value="Squat" >
        <img src="images/squat.jpeg" alt="Submit" />
    </button>
    <button name="image_clicked" value="Bench" >
        <img src="images/bench.jpeg" alt="Submit" />
    </button>
    <button name="image_clicked" value="Deadlift" >
        <img src="images/deadlift.jpg" alt="Submit" />
    </button>
        </form>
    </body>

</html>