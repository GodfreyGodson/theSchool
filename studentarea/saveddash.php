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

    // Set the selected quiz in the session variable
    if (isset($_POST['exam'])) {
        $_SESSION['selected_exam'] = $_POST['exam'];
    }

    ?>
    <div class="white-container">
        <div class="quiz-container">

            <div class="quiz-header">
                <h2>
                    <?php
                    if (isset($_SESSION['selected_exam'])) {
                        echo $_SESSION['selected_exam'] . " Quiz";
                    } else {
                        echo "No exam selected";
                    }
                    ?>
                </h2>
            </div>

            <div class="quiz-body">

                <div class="question-container">
                    <div class="question-header">
                        <h3>Question <span id="question-number"></span>/10</h3>
                    </div>
                    <div class="question">
                        <p id="question-text"></p>
                        <div class="options" id="options-container">
                        </div>
                    </div>
                    <div class="navigation">
                        <button class="prev-btn" id="prev-btn" disabled>Prev</button>
                        <button class="next-btn" id="next-btn">Next</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="results-container" style="display:none;">
            <?php

            // Get the quiz title from the session
            $quizTitle = isset($_SESSION['title']) ? $_SESSION['title'] : '';

            ?>
            <h2>Results for <?php echo $quizTitle; ?></h2>
            <ul id="results-list"></ul>
        </div>
    </div>

    <script>
let currentQuestion = 0;
let questions = [];

fetch('http://localhost:3000/api/questions/<?php echo $_SESSION["selected_exam"] ?>')
  .then(response => response.json())
  .then(data => {
    questions = data.map(q => ({
      question: q.question,
      options: [q.opt1, q.opt2, q.opt3, q.opt4],
      answer: q.answer
    }));
    updateQuestion();
  })
  .catch(error => console.error(error));

  const updateQuestion = () => {
  const questionNumber = document.getElementById('question-number');
  const questionText = document.getElementById('question-text');
  const optionsContainer = document.getElementById('options-container');
  if (questions.length > 0) {
    questionNumber.textContent = currentQuestion + 1;
    questionText.textContent = questions[currentQuestion].question;
    optionsContainer.innerHTML = '';
    const options = questions[currentQuestion].options;
    options.forEach((option, index) => {
      const optionElement = document.createElement('label');
      optionElement.innerHTML = `
        <input type="radio" name="answer" value="${option}">
        ${option}
      `;
      optionsContainer.appendChild(optionElement);
    });
    // Update the navigation buttons
    const prevButton = document.getElementById('prev-btn');
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
    document.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);
  } else {
    console.log('No questions found');
  }
};


const nextQuestion = () => {
  const selectedOption = document.querySelector('input[name="answer"]:checked');
  if (selectedOption) {
    const selectedValue = selectedOption.value;
    console.log('Selected value:', selectedValue); // Verify that the correct value is being captured
    questions[currentQuestion].userAnswer = selectedValue;

    // Extract question, answer and userAnswer
    const question = questions[currentQuestion].question;
    const answer = questions[currentQuestion].answer;
    const userAnswer = selectedValue;
    const exam = "<?php  echo $_SESSION['selected_exam']; ?>"; // Get exam value from PHP session

    // Send data to Node.js endpoint using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost:3000/api/results', true);
    xhr.setRequestHeader('Content-type', 'application/json');
    xhr.send(JSON.stringify({
      question: question,
      answer: answer,
      userAnswer: userAnswer,
      exam: exam // Include exam value in JSON object
    }));

    const xhr2 = new XMLHttpRequest();
    xhr2.open('POST', 'save-session.php', true);
    xhr2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr2.send('answer=' + selectedValue + '&question=' + currentQuestion);

    // Update the value of currentQuestion
    currentQuestion++;

    if (currentQuestion < questions.length) {
      updateQuestion();
      const prevButton = document.getElementById('prev-btn');
      
      prevButton.disabled = false; // Enable "Prev" button when moving to the next question
    } else {
      showResults();
      const nextButton = document.getElementById('next-btn');
      nextButton.disabled = true; // Disable "Next" button after reaching the last question
    }
  }
};










        
const prevQuestion = () => {
    currentQuestion--;
    updateQuestion();
    const selectedAnswer = questions[currentQuestion].userAnswer;
    if (selectedAnswer) {
        const radioButtons = document.querySelectorAll('input[name="answer"]');
        radioButtons.forEach(radio => {
            if (radio.value === selectedAnswer) {
                radio.checked = true;
            }
        });
    }
};

        // finish the quiz and show the results
        const finishQuiz = () => {
            // hide the quiz container and show the results container
            const quizContainer = document.querySelector('.quiz-container');
            quizContainer.style.display = 'none';
            const resultsContainer = document.querySelector('.results-container');
            resultsContainer.style.display = 'block';
            // display the user's answers and the correct answers
            const resultsList = document.getElementById('results-list');
            let numCorrect = 0;
            questions.forEach((question, index) => {
                const listItem = document.createElement('li');
                let text = `${question.question} - Your Answer: ${question.userAnswer || 'Not answered'}`;
                text += ` - Correct Answer: ${question.answer}`;
                listItem.textContent = text;
                if (question.userAnswer === question.answer) {
                    listItem.classList.add('correct');
                    numCorrect++;
                } else {
                    listItem.classList.add('incorrect');
                }
                resultsList.appendChild(listItem);

                
            });
// display score
const score = document.createElement('p');
score.textContent = `Your score ${numCorrect}/${questions.length}`;
resultsContainer.appendChild(score);
        };
        // initialize the quiz
        updateQuestion();
        // add event listeners to the navigation buttons
        const prevButton = document.getElementById('prev-btn');
        const nextButton = document.getElementById('next-btn');
        prevButton.addEventListener('click', prevQuestion);
        nextButton.addEventListener('click', nextQuestion);
    </script>
<script src="js/jquery.js" type="text/javascript"></script>

</body>

</html>




