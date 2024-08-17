<script>
    $(document).ready(function () {
        load_online_tests('<?= $_COOKIE[SES_USER_USER_ID] ?>', '<?= $_GET['test_id'] ?>')
    });

    function formatDate(dateString) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function startCountdown(duration) {
        var timer = duration, minutes, seconds;
        var countdownInterval = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            document.getElementById('timer').textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(countdownInterval);
                document.getElementById('timer').textContent = "Time's up!";
                // Optionally, submit the form or take any other action when the time is up
                submit_test()
            }
        }, 1000);
    }

    function submit_test() {
        let mcqArr = [];
        let saqArr = [];

        $('.ans_mcq').each(function () {
            mcqArr.push({
                'q_id': $(this).data('question-id'),
                'opt': $(this).data('opt'),
                'right': $(this).data('opt-right'),
                'ans': $(this).is(':checked'),
                'q_type': 'mcq'
            });
        });

        $('.ans_saq').each(function () {
            saqArr.push({
                'q_id': $(this).data('question-id'),
                'ans': $(this).val(),
                'q_type': 'saq'

            });
        });

        mcqArr = organizeAnswers(mcqArr);

        let ansArr = [...mcqArr, ...saqArr];

        $.ajax({
            url: "<?= base_url('/api/online-test/submit') ?>",
            type: "POST",
            data: {
                user_id: '<?= $_COOKIE[SES_USER_USER_ID] ?>',
                answer_data: JSON.stringify(ansArr)
            },
            beforeSend: function () {},
            success: function (resp) {
                let html = '';
                console.log(resp)

                if (resp.status) {
                    html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                    window.location.href = '<?= base_url() ?>';
                } else {
                    html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                }

                $('#alert').html(html);
            }
        });
    }

    function organizeAnswers(answers) {
        let organizedAnswers = {};

        answers.forEach(answer => {
            if (!organizedAnswers[answer.q_id]) {
                organizedAnswers[answer.q_id] = {
                    q_id: answer.q_id,
                    q_type: answer.q_type,
                    selected_opt: null,
                    right_opt: answer.right
                };
            }
            if (answer.ans) {
                organizedAnswers[answer.q_id].selected_opt = answer.opt;
            }
        });

        return Object.values(organizedAnswers);
    }

    function load_online_tests(user_id, test_id) {
        $.ajax({
            url: "<?= base_url('/api/tests') ?>",
            type: "GET",
            data: { test_id: test_id },
            beforeSend: function () {},
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    console.log(resp);
                    startCountdown(resp.data[0].timer * 60);
                    var html = '';
                    var quentions_length = resp.data[0].questions.length;
                    var submit_button = '';
                    var form_heading = `
                                        <p>Total questions: ${quentions_length}</p>
                                        <p>Total time: ${resp.data[0].timer}.00 minutes</p>
                                        <p>Time remaining: <span id="timer">${resp.data[0].timer}:00</span></p>`;
                    $('#paper_details').html(form_heading);
                    $.each(resp.data[0].questions, function (index, question) {
                        if (quentions_length == index + 1) {
                            submit_button = `<button type="submit" onClick="submit_test()" class="submit-button">Submit</button>`;
                        }
                        var answers = '';
                        if (question.question_type == 'saq') {
                            answers = `<input type="text" class="input-answer ans_saq" data-question-id="${question.uid}" id="ans-${question.uid}" placeholder="write your answer here">`;
                        } else if (question.question_type == 'mcq') {
                            answers = `<label>
                                            <input type="radio"
                                                data-question-id="${question.uid}"
                                                data-opt-right="${question.answer[0].right_ans}"
                                                data-opt="a"
                                                name="customRadio-${question.uid}" 
                                                value="${question.answer[0].a}" 
                                                id="a_${question.uid}" 
                                                class="ans_mcq"
                                                />
                                                A) ${question.answer[0].a}
                                        </label>
                                        <br />
                                        <label>
                                            <input type="radio" 
                                                data-question-id="${question.uid}"
                                                data-opt-right="${question.answer[0].right_ans}"
                                                data-opt="b"
                                                name="customRadio-${question.uid}" 
                                                value="${question.answer[0].b}"
                                                 id="b_${question.uid}" 
                                                class="ans_mcq" 
                                                />
                                                B) ${question.answer[0].b}
                                        </label>
                                        <br />
                                        <label>
                                            <input type="radio" 
                                                data-question-id="${question.uid}"
                                                data-opt-right="${question.answer[0].right_ans}"
                                                data-opt="c"
                                                name="customRadio-${question.uid}" 
                                                value="${question.answer[0].c}" 
                                                 id="c_${question.uid}" 
                                                class="ans_mcq"
                                                />
                                                C) ${question.answer[0].c}
                                        </label>
                                        <br />
                                        <label>
                                            <input type="radio" 
                                                data-question-id="${question.uid}"
                                                data-opt-right="${question.answer[0].right_ans}"
                                                data-opt="d"
                                                name="customRadio-${question.uid}" 
                                                value="${question.answer[0].d}" 
                                                 id="d_${question.uid}" 
                                                class="ans_mcq"
                                                />
                                                D) ${question.answer[0].d}
                                        </label>
                                    `;
                        }
                        html += `
                                <div class="question">
                                    <p><strong>Q${index + 1}.</strong> ${question.question}</p>
                                    <div class="answers">
                                        ${answers}</br></br>
                                        ${submit_button}
                                    </div>
                                </div>`;
                    });
                    $('#examination_form').html(html);
                } else {
                    $('#examination_form').html(`<h3 class="title" style="text-align:center">${resp.message}!</h3>`);
                }
            },
            error: function (err) {
                console.log(err);
            },
            complete: function () {}
        });
    }
</script>
