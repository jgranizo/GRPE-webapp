let number_of_exercises =parseInt("Enter number of workouts you will do today(0-10): ");
while(isInteger(number_of_exercises)||isNaN(number_of_exercises||number_of_exercises>10||number_of_exercises||number_of_exercises<0)){
    number_of_exercises=parseInt("Number must a whole number from 0-10. Please try again.");
}
console.log('NumberOfExercises = '+number_of_exercises);
