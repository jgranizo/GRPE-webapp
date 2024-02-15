$(document).ready(()=>{
    $("#exercisesForm").submit( event =>{
    var compoundExercises = document.getElementById("numExercises").value;
    var nonCompoundExercises = document.getElementById("numExercises").value;
    let exercise_array = [];
    let exercise2_array = [];
    var intCompound= parseInt(compoundExercises);
    var intNoncompound = parseInt(nonCompoundExercises);
   
    if(intCompound==0 && intNoncompound == 0){
        $("#nonNumExercises").next().next().next().text("Please enter at least 1 compound exercise to be generated before submitting.");
        event.preventDefault();
    }
    //we must get all values and save into array;
 

    let q =document.querySelectorAll("#exercises select").forEach(function(element){
    exercise_array.push(element.value)}); 
    console.log(exercise_array);
    //set must be unique, no duplicates
    if(new Set(exercise_array).size!=exercise_array.length){
        event.preventDefault();
        $("#sub").next().text("No duplicate exercises!");

    }
    let q2 =document.querySelectorAll("#exercises2 select").forEach(function(element){
    exercise2_array.push(element.value)}); 
    console.log(exercise2_array);
    //set must be unique, no duplicates
    if(new Set(exercise2_array).size!=exercise2_array.length){
        event.preventDefault();
        $("#sub").next().text("No duplicate exercises!");
    }
   
    })
});
function is_valid(){
   // select all where the exercise equals the previous exercise. if so call error.
}
function generateExerciseDropdowns() {
    var numExercises = document.getElementById("numExercises").value;//
    var container = document.getElementById("exercises");
    var template = document.getElementById("exerciseTemplate").innerHTML;
       
    container.innerHTML = ''; // Clear existing dropdowns

    for (var i = 0; i < numExercises; i++) {
        var exerciseHTML = template.replace(/exercise/g, 'exercise' + (i + 1));
       
        container.innerHTML += exerciseHTML;
        container.lastElementChild.querySelector('select').setAttribute('name','exercise'+(i+1));
    }
    generateTotalExercises();
    

}
var numberOfExercises=document.getElementById("numExercises").value;

function generateExerciseDropdowns2() {
    var numExercises2 = document.getElementById("nonNumExercises").value;
    var numExercises1 = document.getElementById("numExercises").value;
    numExercises1=parseInt(numExercises1);
    numExercises2=parseInt(numExercises2);
    var container2 = document.getElementById("exercises2");
    var template2 = document.getElementById("exerciseTemplate2").innerHTML;
    console.log("NumExerciseInitial: "+numExercises2+numExercises1);
    console.log("NumExerciseResult: "+ numExercises1);

    container2.innerHTML = ''; // Clear existing dropdowns

    for (var j = numExercises1; j < (numExercises1+numExercises2); j++) { //creating name for each exercise to be able to access each data point 
        var exerciseHTML2 = template2.replace(/exercise/g, 'exercise' + (j + 1));//afterwards
        container2.innerHTML += exerciseHTML2;
        console.log("i: "+(j+1));
        console.log("total: "+ (numExercises1+numExercises2));
        container2.lastElementChild.querySelector('select').setAttribute('name','exercise'+(j+1));
    }
    generateTotalExercises();
}


function generateTotalExercises(){
    var numExercise1 = document.getElementById("nonNumExercises").value;
    var numExercise2 = document.getElementById("numExercises").value;
    var numExercises1=parseInt(numExercise1);
    var numExercises2=parseInt(numExercise2);
    var totalNum=(numExercises2+numExercises1);
document.getElementById("totalNumExercises").value = totalNum; 
}