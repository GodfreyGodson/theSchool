<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/qu.css">
</head>
<body>
<?php
session_start();
?>
    <div class="white-container">
        <div class="quiz-container">
            <div class="quiz-header">
                <h2>Quiz Title</h2>
            </div>
            <div class="quiz-body">
                <div class="question-container">
                    <div class="question-header">
                        <h3>Question 1/10</h3>
                    </div>
                    <div class="question">
                        <p id="question-text">What is the capital of France?</p>
                        <div class="options" id="options-container">
                            <label>
                                <input type="radio" name="answer" value="Paris">
                                Paris
                            </label>
                            <label>
                                <input type="radio" name="answer" value="Rome">
                                Rome
                            </label>
                            <label>
                                <input type="radio" name="answer" value="Madrid">
                                Madrid
                            </label>
                            <label>
                                <input type="radio" name="answer" value="Canada">
                                Canada
                            </label>
                        </div>
                    </div>
                    <div class="navigation">
                        <button class="prev-btn" id="prev-btn" disabled>Prev</button>
                        <button class="next-btn"  id="next-btn">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="results-container" style="display:none;">
            <h2>Results</h2>
            <ul id="results-list"></ul>
        </div>
    </div>

    <script>
        let currentQuestion = 0;
        let questions = [];
        const q1 = {
            question: "What is the capital of France?",
            options: ["Paris", "Rome", "Madrid", "Canada"],
            answer: "Paris",
            userAnswer: null
        };
        const q2 = {
            question: "What is the largest planet in our solar system?",
            options: ["Jupiter", "Saturn", "Mars", "Earth"],
            answer: "Jupiter",
            userAnswer: null
        };
        const q3 = {
            question: "What is the tallest mammal in the world?",
            options: ["Elephant", "Giraffe", "Horse", "Cow"],
            answer: "Giraffe",
            userAnswer: null
        };
        // push each question object to the array
        questions.push(q1, q2, q3);
        // update the current question on the screen
        const updateQuestion = () => {
            const questionText = document.getElementById('question-text');
            const optionsContainer = document.getElementById('options-container');
            questionText.textContent = questions[currentQuestion].question;
            optionsContainer.innerHTML = '';
            questions[currentQuestion].options.forEach(option => {
                const optionElement = document.createElement('label');
                optionElement.innerHTML = `
                    <input type="radio" name="answer" value="${option}">
                    ${option}
                `;
                optionsContainer.appendChild(optionElement);
            });
            // update the navigation buttons
            const prevButton = document.getElementById ('prev-btn');
            const nextButton = document.getElementById('next-btn');
if (currentQuestion === 0) {
prevButton.disabled = true;
} else {
prevButton.disabled = false;
}
if (currentQuestion === questions.length - 1) {
nextButton.textContent = 'Finish';
} else {
nextButton.textContent = 'Next';
}
};
updateQuestion();
// handle next button click
const nextButton = document.getElementById('next-btn');
nextButton.addEventListener('click', () => {
const selectedOption = document.querySelector('input[name="answer"]:checked');
if (selectedOption) {
questions[currentQuestion].userAnswer = selectedOption.value;
currentQuestion++;
if (currentQuestion < questions.length) {
updateQuestion();
} else {
// quiz is finished, show the results
const whiteContainer = document.querySelector('.white-container');
const quizContainer = document.querySelector('.quiz-container');
const resultsContainer = document.querySelector('.results-container');
whiteContainer.removeChild(quizContainer);
resultsContainer.style.display = 'block';
// display results
const resultsList = document.getElementById('results-list');
let numCorrect = 0;
questions.forEach(question => {
const li = document.createElement('li');
li.innerHTML = `${question.question} - Your answer: ${question.userAnswer}. Correct answer: ${question.answer}`;
if (question.userAnswer === question.answer) {
li.classList.add('correct');
numCorrect++;
} else {
li.classList.add('incorrect');
}
resultsList.appendChild(li);
});
// display score
const score = document.createElement('p');
score.textContent = `Your score ${numCorrect}/${questions.length}`;

resultsContainer.appendChild(score);
}
}
});
// handle previous button click
const prevButton = document.getElementById('prev-btn');
prevButton.addEventListener('click', () => {
currentQuestion--;
updateQuestion();
});
</script>

</body>
</html>
