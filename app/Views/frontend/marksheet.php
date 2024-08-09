<!--=====================================-->
<!--=       Breadcrumb Area Start      =-->
<!--=====================================-->
<style>
    .first_page{
        background: url('<?= base_url() ?>public/assets/images/pdf/first_page.jpg') no-repeat center center;
    }
    .middle_page{
        background: url('<?= base_url() ?>public/assets/images/pdf/middle_page.jpg') no-repeat center center;
    }
    .last_page{
        background: url('<?= base_url() ?>public/assets/images/pdf/last_page.jpg') no-repeat center center;
    }
    .single_page{
        background: url('<?= base_url() ?>public/assets/images/pdf/single_page.jpg') no-repeat center center;
    }
    .middle_page .result-content, .last_page .result-content{
        margin-top: 80px;
    }
    .certificate-style {
        position: relative;
        min-width: 760px;
        min-height: 1080px;
        background-size: cover;
        padding: 20px;
        color: #fff;
    }

   

    .result-content {
        position: absolute;
        top: 0px;
        left: 50px;
        right: 50px;
        margin-top: 200px;
    }

    .result-content h2 {
        margin-bottom: 20px;
        font-size: 36px;
        text-align: center;
    }

    .result-content p {
        margin: 0px 0;
        font-size: 15px;

    }

    .result-content .participant-photo {
        margin: 20px auto;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
    }

    .result-content .participant-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .download-result {
        display: flex;
    }

    .download-result-btn {
        display: block;
    }

    table {
        width: 50%;
        border-collapse: collapse;
    }

    b {
        font-weight: 10px;
    }

    .center-table {
        margin: auto;
        border-collapse: collapse;
        width: 100%;
    }

    .center-table th,
    .center-table td {
        border: 1px solid black;
        padding: 10px;
        text-align: left;
        font-size: 12px;
        color: black;
    }

    .center-table td {
        padding: 6px 10px 6px 10px;
    }

    #download {
        display: block;
    }
</style>

<div class="edu-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Marksheet</h1>
            </div>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1">
            <span></span>
        </li>
        <li class="shape-2 scene"><img data-depth="2" src="<?= base_url() ?>public/assets/images/about/shape-13.png"
                alt="shape"></li>
        <li class="shape-3 scene"><img data-depth="-2" src="<?= base_url() ?>public/assets/images/about/shape-15.png"
                alt="shape"></li>
        <li class="shape-4">
            <span></span>
        </li>
        <li class="shape-5 scene"><img data-depth="2" src="<?= base_url() ?>public/assets/images/about/shape-07.png"
                alt="shape"></li>
    </ul>
</div>

<!--=====================================-->
<!--=          Login Area Start         =-->
<!--=====================================-->
<section class="account-page-area section-gap-equal" style="overflow:scroll;">
    <div class="container position-relative">
        <div class="row g-5 justify-content-center">

            <div class="col-lg-12">
                <div class="login-form-box registration-form">
                    <div class="row" id="form-heading">
                    </div>
                    <!-- <form> -->
                    <div class="row mb-4 form-container" id="btn-con">
                        <button class="btn-lg btn-info" id="download" style="width: 200px;">Download as PDF</button>
                    </div>
                    <div class="row mb-4"
                        style="width: fit-content; display: flex; align-items: center; justify-content: center;">
                        <div id="examination_form" style="width: fit-content;"></div>
                    </div>



                    <!-- </form> -->
                </div>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1 scene"><img data-depth="2" src="<?= base_url() ?>public/assets/images/about/shape-07.png"
                    alt="Shape"></li>
            <li class="shape-2 scene"><img data-depth="-2" src="<?= base_url() ?>public/assets/images/about/shape-13.png"
                    alt="Shape"></li>
            <li class="shape-3 scene"><img data-depth="2"
                    src="<?= base_url() ?>public/assets/images/counterup/shape-02.png" alt="Shape"></li>
        </ul>
    </div>
</section>