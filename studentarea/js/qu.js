// Quiz data
var quiz = [    {        question: "What is the capital of France?",        options: {            a: "Paris",            b: "Rome",            c: "Madrid",            d: "Canada"        },        answer: "a"    },    {        question: "What is the currency of Japan?",        options: {            a: "Yen",            b: "Dollar",            c: "Euro",            d: "Pound"        },        answer: "a"    },    {        question: "What is the tallest mountain in the world?",        options: {            a: "Mount Everest",            b: "Mount Kilimanjaro",            c: "Mount Fuji",            d: "Mount McKinley"        },        answer: "a"    }];

var currentQuestion = 0;
var userAnswers = {};

// Function to show the current question
function showQuestion() {
    var questionContainer = document.getElementById("question_" + currentQuestion);
    var prevButton = questionContainer.querySelector(".prev-btn");
    var nextButton = questionContainer.querySelector(".next-btn");
    var submitButton = questionContainer.querySelector(".submit-btn");

    // Show or hide navigation buttons
    if (currentQuestion == 0) {
        prevButton.style.display = "none";
    } else {
        prevButton.style.display = "inline-block";
    }

    if (currentQuestion == quiz.length - 1) {
        nextButton.style.display = "none";
        submitButton.style.display = "inline-block";
    } else {
        nextButton.style.display = "inline-block";
        submitButton.style.display = "none";
    }

    // Show the current question
    questionContainer.style.display = "block";
}

// Function to hide all questions
function hideQuestions() {
    var questionContainers = document.getElementsByClassName("question-container");
    for (var i = 0; i < questionContainers.length; i++) {
        questionContainers[i].style.display = "none";
    }
}

// Function to navigate to the previous or next question
function showQuestionByOffset(offset) {
    hideQuestions();
    currentQuestion += offset;
    showQuestion();
}

// Function to handle the user's answer for the current question
function handleAnswer() {
    var questionContainer = document.getElementById("question_" + currentQuestion);
    var radioButton = questionContainer.querySelector("input[type='radio']:checked");
    if (radioButton) {
        var answer = radioButton.value;
        userAnswers[currentQuestion] = answer;
    }
}

// Function to submit the quiz and show the score
function submitQuiz() {
    hideQuestions();

    var score = 0;
    for (var i = 0; i < quiz.length; i++) {
        var answer = userAnswers[i];
        if (answer && answer == quiz[i].answer) {
            score++;
        }
    }

    var scoreContainer = document.getElementById("score-container");
    scoreContainer.style.display = "block";
    scoreContainer.innerHTML = "You scored " + score + " out of " + quiz.length + ".";
}

// Show the first question
showQuestion();

// Add event listeners to navigation buttons
var prevButton = document.querySelector(".prev-btn");
var nextButton = document.querySelector(".next-btn");
var submitButton = document.querySelector(".submit-btn");

prevButton.addEventListener("click", function() {
    handleAnswer();
    showQuestionByOffset(-1);
});

nextButton.addEventListener("click", function() {
    handleAnswer();
    showQuestionByOffset(1);
});

submitButton.addEventListener("click", function() {
    handleAnswer();
    showQuestionByOffset(1);
});
