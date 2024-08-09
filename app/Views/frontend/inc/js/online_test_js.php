<script>
    $(document).ready(function () {
        load_online_tests('<?= $_SESSION[SES_USER_USER_ID] ?>')
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
                user_id: '<?= $_SESSION[SES_USER_USER_ID] ?>',
                answer_data: JSON.stringify(ansArr)
            },
            beforeSend: function () {},
            success: function (resp) {
                let html = '';

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

    function load_online_tests(user_id) {
        $.ajax({
            url: "<?= base_url('/api/student/online-test') ?>",
            type: "GET",
            data: { user_id: user_id },
            beforeSend: function () {},
            success: function (resp) {
                if (resp.status) {
                    console.log(resp);
                    startCountdown(resp.data.timer * 60);
                    var html = '';
                    var quentions_length = resp.data.questions.length;
                    var submit_button = '';
                    var form_heading = `<div class="col-lg-6">
                                            <h3 class="title">Examination Form</h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <span>Total quentions: ${quentions_length}</span>
                                            <div>Total time ${resp.data.timer}.00 minutes</div>
                                            <div>Time remain: <span id="timer">${resp.data.timer}:00</span> </div>
                                        </div>`;
                    $('#form-heading').html(form_heading);
                    $.each(resp.data.questions, function (index, question) {
                        if (quentions_length == index + 1) {
                            submit_button = `<button type="submit" class="submit-btn" onClick="submit_test()">Submit</button>`;
                        }
                        var answers = '';
                        if (question.question_type == 'saq') {
                            answers = `<input type="text" class="input-answer ans_saq" data-question-id="${question.uid}" id="ans-${question.uid}" placeholder="write your answer here">`;
                        } else if (question.question_type == 'mcq') {
                            answers = `<div class="custom-control custom-radio">
                                            <span>A )</span>
                                            <input 
                                                data-question-id="${question.uid}"
                                                data-opt="a"
                                                data-opt-right="${question.answer[0].right_ans}"
                                                type="radio" 
                                                id="a_${question.uid}" 
                                                name="customRadio-${question.uid}" 
                                                class="custom-control-input-${question.uid} ans_mcq">
                                            <label class="custom-control-label" for="a_${question.uid}">${question.answer[0].a}</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <span>B )</span>
                                            <input 
                                                data-question-id="${question.uid}"
                                                data-opt="b"
                                                data-opt-right="${question.answer[0].right_ans}"
                                                type="radio" 
                                                id="b_${question.uid}" 
                                                name="customRadio-${question.uid}" 
                                                class="custom-control-input-${question.uid} ans_mcq">
                                            <label class="custom-control-label" for="b_${question.uid}">${question.answer[0].b}</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <span>C )</span>
                                            <input 
                                                data-question-id="${question.uid}"
                                                data-opt="c"
                                                data-opt-right="${question.answer[0].right_ans}"
                                                type="radio" 
                                                id="c_${question.uid}" 
                                                name="customRadio-${question.uid}"
                                                class="custom-control-input-${question.uid} ans_mcq">
                                            <label class="custom-control-label" for="c_${question.uid}">${question.answer[0].c}</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <span>D )</span>
                                            <input 
                                                data-question-id="${question.uid}"
                                                data-opt="d"
                                                data-opt-right="${question.answer[0].right_ans}"
                                                type="radio" 
                                                id="d_${question.uid}" 
                                                name="customRadio-${question.uid}" 
                                                class="custom-control-input-${question.question_id} ans_mcq">
                                            <label class="custom-control-label" for="d_${question.uid}">${question.answer[0].d}</label>
                                        </div>`;
                        }
                        html += `<h5>Q${index + 1}.${question.question}</h5>
                                 <div class="answers">
                                    <h6>Answer:</h6>
                                    ${answers}
                                 </div>
                                 <div class="submit-btn-container">
                                    ${submit_button}
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
