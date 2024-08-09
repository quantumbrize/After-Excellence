<script>
    load_qna()
    function load_qna() {
        $.ajax({
            url: '<?= base_url('/api/results/qna') ?>',
            method: 'GET',
            data: {
                'result_id': '<?= $_GET['result_id'] ?>'
            },
            beforeSend: function () {
                $('#table-banner-list-all-body').html(`<tr>
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                if (resp.status) {
                    let questions = JSON.parse(resp.data.questions)
                    let answers = JSON.parse(resp.data.answer)
                    let marks = JSON.parse(resp.data.marks)
                    let right_ans = JSON.parse(resp.data.right_ans)

                    const combinedArray = questions.map((question, index) => ({
                        question: question,
                        answer: answers[index],
                        marks: marks[index],
                        rightAns: right_ans[index]
                    }));
                    html = ''
                    $.each(combinedArray, function (index, item) {
                        html += `<tr>
                                    <td>
                                        ${item.question}
                                    </td>
                                    <td>
                                        ${item.rightAns}
                                    </td>
                                    <td>
                                        ${item.answer}
                                    </td>
                                    <td>
                                        ${item.marks}
                                    </td>
                                </tr>`;
                    })

                    console.log(combinedArray)


                    $('#table-banner-list-all-body').html(html)
                    $('#table-banner-list-all').DataTable();
                }
            },
            error: function (err) {
                console.error(err)
            }
        })
    }

</script>