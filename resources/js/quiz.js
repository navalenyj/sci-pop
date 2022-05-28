import $ from 'jquery';

window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';


const questionsMass = [
    {
        question: "Столица Греции:",
        answers: [
            "Каир",
            "Афины",
            "Коропитэк",
            "Египет"
        ],
        correct: 2,
    },
    {
        question: "Основная растительная культура Греции:",
        answers: [
            "персики",
            "сливы",
            "виноград",
            "укроп"
        ],
        correct: 3,
    },
    {
        question: "Главный бог греческой мифологии:",
        answers: [
            "Аид",
            "Нептун",
            "Марс",
            "Зевс"
        ],
        correct: 4,
    },
    {
        question: "Какой канал разделяет Северную Америку и Южную:",
        answers: [
            "Панамский",
            "Мадагаскарский",
            "Берингов пролив",
            "Москва река"
        ],
        correct: 1,
    },
    {
        question: "Хищное вонючее животное, обитающее в Северной Америке:",
        answers: [
            "скунс",
            "коала",
            "медведь",
            "полосатик"
        ],
        correct: 1,
    },

    {
        question: "В 1940-х годах Северная и Западная Германия назывались: ",
        answers: [
            "Украина",
            "Оления",
            "Безония",
            "Зубрия"
        ],
        correct: 3,
    },
    {
        question: "Хищное вонючее животное, обитающее в Северной Америке:",
        answers: [
            "скунс",
            "коала",
            "медведь",
            "полосатик"
        ],
        correct: 1,
    },
    {
        question: "Откуда пошло выражение «деньги не пахнут?:",
        answers: [
            "От подателей за провоз парфюмерии",
            "От сборов за нестиранные носки",
            "От налога на туалеты",
            "От всу"
        ],
        correct: 2,
    },
    {
        question: "Туристы, приезжающие на Майорку, обязаны заплатить налог…",
        answers: [
            "На плавки",
            "На пальмы",
            "На солнце",
            "полосатик"
        ],
        correct: 3,
    },
    {
        question: "Кот, прислуживающей Бабе-Яге",
        answers: [
            "Баюн",
            "Путин",
            "Зеленский",
            "Ким чин ин"
        ],
        correct: 1,
    },
    {
        question: "Завершающий этап спортивного состязания:",
        answers: [
            "атака киева",
            "атака вашингтона",
            "финал",
            "радость"
        ],
        correct: 3,
    },
    {
        question: "Слой, образующий на поверхности железа в результате коррозии:",
        answers: [
            "ржавчина",
            "ржака",
            "кустолес",
            "пам пам пам"
        ],
        correct: 1,
    },
    {
        question: "Хищное вонючее животное, обитающее в Северной Америке:",
        answers: [
            "скунс",
            "коала",
            "медведь",
            "полосатик"
        ],
        correct: 1,
    },
    {
        question: " Место, откуда Тезею помогла выбраться нить Ариадны",
        answers: [
            "скунс",
            "коала",
            "Лабиринт",
            "полосатик"
        ],
        correct: 3,
    },
    {
        question: "Факты, подтверждающие непричастность подозреваемого к какому-либо преступлению",
        answers: [
            "скунс",
            "коала",
            "медведь",
            "Алиби"
        ],
        correct: 4,
    },
];

let questions = questionsMass.map(i => [Math.random(), i]).sort().map(i => i[1]);

const headerContainer = document.querySelector('#header');
const listContainer = document.querySelector('#list');
const submitBtn = document.querySelector('#submit');
const scoreShow = document.querySelector('#score');
const timeShow = document.querySelector('#time');

let time = 75;
let t = setInterval(updateCountdown, 1000);

let score = 0;
let questionIndex = 0;


submitBtn.onclick = checkAnswer;
clearPage();
showQuestion();


function updateCountdown() {
    const minutes = Math.floor(time / 60);
    let seconds = time % 60;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    timeShow.innerHTML = `${minutes}:${seconds}`;
    time--;
    if (time < 0) {

        clearPage();
        showResults();

    }
}

function clearPage() {
    headerContainer.innerHTML = '';
    listContainer.innerHTML = '';
}

function showQuestion() {


    const headerTemplate = `<hr><div class="text-center fs-4 fw-bold bg-light">%title%</div><hr>`

    const title = headerTemplate.replace('%title%', questions[questionIndex]['question']);

    headerContainer.innerHTML = title;
    let answerNumber = 1;
    for (let answerText of questions[questionIndex]['answers']) {

        const questionTemplate =
            `<li class="list-group-item bg-light">
                <label>
                    <div class="form-check">

                        <input value="%number%" type="radio" class="answer form-check-input" name="answer"/>
                        <span class="form-check-label">%answer%</span>
                    </div>

                </label>
                </li>`;


        let answerHTML = questionTemplate.replace('%answer%', answerText);

        answerHTML = answerHTML.replace('%number%', answerNumber);

        listContainer.innerHTML += answerHTML;
        answerNumber++;
    }


}

function checkAnswer() {
    const checkRadio = listContainer.querySelector('input[type="radio"]:checked');
    if (checkRadio) {
        const userAnswer = parseInt(checkRadio.value);

        if (questions[questionIndex]['correct'] === userAnswer) {
            score += 100;
            time += 15;
            scoreShow.textContent = score;
        } else {
            time -= 15;
        }


        if (questionIndex !== questions.length - 1) {
            questionIndex++;
            clearPage();
            showQuestion();
        } else {
            clearPage();
            showResults();
        }
    } else {
        submitBtn.blur();
        return
    }
}

function showResults() {

    time = 0;
    timeShow.innerHTML = '00:00';

    clearInterval(t);
    sendResult();

    const resultsTemplate =
        `<hr><div class="text-center fs-4 fw-bold bg-light">
            %result%
        </div><hr>`;

    let message = "Поздравляем , ваш результат: " + score;

    listContainer.innerHTML = resultsTemplate.replace('%result%', message);

    submitBtn.blur();
    submitBtn.innerText = 'Начать заного';
    submitBtn.onclick = () => {
        history.go()
    };

}

function sendResult() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "quiz/save",
            method: "POST",
            data: {score: score},
            dataType: "text",
            success: function (data) {
                console.log('da');
                console.log(data);
            }
        });

}
