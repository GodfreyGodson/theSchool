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
            const prevButton = document.getElementById('prev-btn');
            const nextButton = document.getElementById('next-btn');
            if (currentQuestion === 0) {
                prevButton.disabled = true;
            } else {
                prevButton.disabled = false
            }
            if (currentQuestion === questions.length - 1) {
                nextButton.textContent = 'Finish';
            } else {
                nextButton.textContent = 'Next';
            }
            document.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);

        };
        // move to the next question
        const nextQuestion = () => {
            const selectedOption = document.querySelector('input[name="answer"]:checked');
            if (selectedOption) {
                questions[currentQuestion].userAnswer = selectedOption.value;
            }
            currentQuestion++;
            if (currentQuestion < questions.length) {
                updateQuestion();
                document.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);
            } else {
                // finish the quiz
                finishQuiz();
            }
        };

        // move to the previous question
        const prevQuestion = () => {
            currentQuestion--;
            updateQuestion();
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
            // display the user's score
            const score = document.getElementById('score');
            score.textContent = `You got ${numCorrect} out of ${questions.length} questions correct.`;
        };
        // initialize the quiz
        updateQuestion();
        // add event listeners to the navigation buttons
        const prevButton = document.getElementById('prev-btn');
        const nextButton = document.getElementById('next-btn');
        prevButton.addEventListener('click', prevQuestion);
        nextButton.addEventListener('click', nextQuestion);