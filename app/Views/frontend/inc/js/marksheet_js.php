<script>
    $(document).ready(function () {
        load_result();
    });


    function load_result() {
        var user_id = '<?= $_SESSION['USER_user_id'] ?>'
        $.ajax({
            url: "<?= base_url('/api/results') ?>",
            type: "GET",
            data: {
                user_id: user_id,
            },
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp);
                let html = '';
                if (resp.status) {
                    var total_marks_obtain = 0;
                    var total_marks = JSON.parse(resp.data.total_marks);
                    var user_question = JSON.parse(resp.data.questions);
                    var user_answer = JSON.parse(resp.data.answer);
                    var user_right_ans = JSON.parse(resp.data.right_ans);
                    var user_marks = JSON.parse(resp.data.marks);
                    let batchSize = 10; // Set your batch size here
                    const totalBatches = Math.ceil(user_question.length / batchSize); // Calculate total batches

                    let html = '';

                    for (let i = 0; i < user_question.length; i += batchSize) {
                        let isFirstBatch = (i === 0);
                        let isLastBatch = (i + batchSize >= user_question.length);
                        let isSinglePage = (totalBatches === 1);

                        let pageClass = isSinglePage ? 'single_page' : isFirstBatch ? 'first_page' : isLastBatch ? 'last_page' : 'middle_page';
                        batchSize = isSinglePage ? batchSize : isFirstBatch ? batchSize + 2 : batchSize + 2; // Set different batch sizes for the first batch and others

                        if (isFirstBatch || isLastBatch || i > 0) {
                            html += `<div class="certificate-style ${pageClass}">
                                        <div class="result-content">`;

                            if (isFirstBatch) {
                                html += `<div class="row" style="padding-left: 10px; padding-right: 10px; margin-bottom: 10px;">
                                            <div style="width: 50%; float: left;">
                                                <p><strong>Name:&nbsp;</strong>${resp.data.name}</p>
                                                <p><strong>Phone:&nbsp;</strong>${resp.data.phone}</p>
                                                <p><strong>Email:&nbsp;</strong>${resp.data.email}</p>
                                            </div>
                                            <div style="width: 50%; float: left;">
                                                <p><strong>Centre:&nbsp;</strong>${resp.data.exam_centre}</p>
                                                <p><strong>Class:&nbsp;</strong>${resp.data.class_name}</p>
                                                <p><strong>Branch:&nbsp;</strong>${resp.data.branch_name}</p>
                                            </div>
                                        </div>`;
                            }


                            html += `<table class="center-table">
                                        <tr> 
                                            <th><b>Sl. No.</b></th>
                                            <th><b>Question</b></th>
                                            <th><b>Answer</b></th>
                                            <th><b>Right Answer</b></th>
                                            <th><b>Marks</b></th>
                                        </tr>`;
                        }

                        for (let j = i; j < i + batchSize && j < user_question.length; j++) {
                            total_marks_obtain = parseInt(total_marks_obtain, 10) + parseInt(user_marks[j], 10);
                            html += `<tr>
                                        <td>${j + 1}</td>
                                        <td>${user_question[j]}</td>
                                        <td>${user_answer[j]}</td>
                                        <td>${user_right_ans[j]}</td>
                                        <td>${user_marks[j]}</td>
                                    </tr>`;
                        }

                        if (isLastBatch) {
                            html += `<tr>
                                        <th colspan="2"><b>Total Marks </b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                        <th><b>${total_marks}</b></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><b>Total Marks Obtained</b></th>
                                        <th><b></b></th>
                                        <th><b></b></th>
                                        <th><b>${total_marks_obtain}</b></th>
                                    </tr>
                                </table>
                            </div>
                        </div>`;
                        } else {
                            html += `</table>
                                    </div>
                                </div>`;
                        }
                    }

                    $('#examination_form').html(html);
                    // $('#btn-con').html(`<button class="btn btn-info" id="download" style="width: 200px;">Download as PDF</button>`)
                } else {
                    $('#examination_form').html(`<h3 class="title" style="text-align:center">${resp.message}!</h3>`);
                }

            },
            error: function (err) {
                console.log(err);
            },
            complete: function () { }
        });


    }


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.getElementById('download').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;

        $('#download').html('<div class="spinner-border" role="status"></div>');
        $('#download').attr('disabled', true);

        const elements = document.getElementsByClassName('certificate-style'); // Replace 'pdf-page' with your class name
        const pdf = new jsPDF('p', 'pt', 'a4');
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        let promises = [];
        for (let i = 0; i < elements.length; i++) {
            promises.push(
                html2canvas(elements[i], {
                    scale: 1.4,
                    useCORS: true
                }).then(canvas => {
                    const imgData = canvas.toDataURL('image/png');
                    const canvasWidth = canvas.width / 1.4; // Divide by the scale used in html2canvas
                    const canvasHeight = canvas.height / 1.4;

                    // Calculate the scaled dimensions while maintaining aspect ratio
                    const ratio = Math.min(pdfWidth / canvasWidth, pdfHeight / canvasHeight);
                    const imgScaledWidth = canvasWidth * ratio;
                    const imgScaledHeight = canvasHeight * ratio;

                    // Center the image on the PDF page
                    const x = (pdfWidth - imgScaledWidth) / 2;
                    const y = (pdfHeight - imgScaledHeight) / 2;

                    if (i > 0) {
                        pdf.addPage();
                    }
                    pdf.addImage(imgData, 'PNG', x, y, imgScaledWidth, imgScaledHeight);
                })
            );
        }
        Promise.all(promises).then(() => {
            pdf.save('marksheet.pdf');
            $('#download').html('Download PDF');
            $('#download').attr('disabled', false);
        }).catch(error => {
            console.error('Error generating PDF:', error);
            $('#download').html('Download PDF');
            $('#download').attr('disabled', false);
        });
    });
</script>