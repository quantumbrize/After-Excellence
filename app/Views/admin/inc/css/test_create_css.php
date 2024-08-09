
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Rubik", sans-serif;
    }


    .container {
        background-color: #ffffff;
        width: 60%;
        min-width: 450px;
        position: relative;
        margin: 50px auto;
        padding: 50px 20px;
        border-radius: 7px;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.05);
    }

    input[type="file"] {
        display: none;
    }

    #btn_upload {
        display: block;
        position: relative;
        color: #ffffff;
        font-size: 18px;
        text-align: center;
        margin: auto;
        border-radius: 5px;
        cursor: pointer;
    }

    .container p {
        text-align: center;
        margin: 20px 0 30px 0;
    }

    #images {
        width: 90%;
        position: relative;
        margin: auto;
        display: flex;
        justify-content: space-evenly;
        gap: 20px;
        flex-wrap: wrap;
    }

    figure {
        width: 45%;
    }

    img {
        width: 100%;
    }

    figcaption {
        text-align: center;
        font-size: 2.4vmin;
        margin-top: 0.5vmin;
    }
    .ck-editor__editable_inline {
        min-height: 100px !important;
    }

    .form-label{
        font-size: 18px;
    }

    .checkbox-wrapper-10 {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .checkbox-wrapper-10 .tgl {
        display: none;
    }

    .checkbox-wrapper-10 .tgl,
    .checkbox-wrapper-10 .tgl:after,
    .checkbox-wrapper-10 .tgl:before,
    .checkbox-wrapper-10 .tgl *,
    .checkbox-wrapper-10 .tgl *:after,
    .checkbox-wrapper-10 .tgl *:before,
    .checkbox-wrapper-10 .tgl+.tgl-btn {
        box-sizing: border-box;
    }

    .checkbox-wrapper-10 .tgl::-moz-selection,
    .checkbox-wrapper-10 .tgl:after::-moz-selection,
    .checkbox-wrapper-10 .tgl:before::-moz-selection,
    .checkbox-wrapper-10 .tgl *::-moz-selection,
    .checkbox-wrapper-10 .tgl *:after::-moz-selection,
    .checkbox-wrapper-10 .tgl *:before::-moz-selection,
    .checkbox-wrapper-10 .tgl+.tgl-btn::-moz-selection,
    .checkbox-wrapper-10 .tgl::selection,
    .checkbox-wrapper-10 .tgl:after::selection,
    .checkbox-wrapper-10 .tgl:before::selection,
    .checkbox-wrapper-10 .tgl *::selection,
    .checkbox-wrapper-10 .tgl *:after::selection,
    .checkbox-wrapper-10 .tgl *:before::selection,
    .checkbox-wrapper-10 .tgl+.tgl-btn::selection {
        background: none;
    }

    .checkbox-wrapper-10 .tgl+.tgl-btn {
        outline: 0;
        display: block;
        width: 4em;
        height: 2em;
        position: relative;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .checkbox-wrapper-10 .tgl+.tgl-btn:after,
    .checkbox-wrapper-10 .tgl+.tgl-btn:before {
        position: relative;
        display: block;
        content: "";
        width: 50%;
        height: 100%;
    }

    .checkbox-wrapper-10 .tgl+.tgl-btn:after {
        left: 0;
    }

    .checkbox-wrapper-10 .tgl+.tgl-btn:before {
        display: none;
    }

    .checkbox-wrapper-10 .tgl:checked+.tgl-btn:after {
        left: 50%;
    }

    .checkbox-wrapper-10 .tgl-flip+.tgl-btn {
        padding: 2px;
        transition: all 0.2s ease;
        font-family: sans-serif;
        perspective: 100px;
    }

    .checkbox-wrapper-10 .tgl-flip+.tgl-btn:after,
    .checkbox-wrapper-10 .tgl-flip+.tgl-btn:before {
        display: inline-block;
        transition: all 0.4s ease;
        width: 100%;
        text-align: center;
        position: absolute;
        line-height: 2em;
        font-weight: bold;
        color: #fff;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 4px;
    }

    .checkbox-wrapper-10 .tgl-flip+.tgl-btn:after {
        content: attr(data-tg-on);
        background: #02C66F;
        transform: rotateX(-180deg);
    }

    .checkbox-wrapper-10 .tgl-flip+.tgl-btn:before {
        background: #FF3A19;
        content: attr(data-tg-off);
    }

    .checkbox-wrapper-10 .tgl-flip+.tgl-btn:active:before {
        transform: rotateX(-20deg);
    }

    .checkbox-wrapper-10 .tgl-flip:checked+.tgl-btn:before {
        transform: rotateX(180deg);
    }

    .checkbox-wrapper-10 .tgl-flip:checked+.tgl-btn:after {
        transform: rotateX(0);
        left: 0;
        /* background: #7FC6A6; */
    }

    .checkbox-wrapper-10 .tgl-flip:checked+.tgl-btn:active:after {
        transform: rotateX(20deg);
    }


















    input[type="file"] {
        display: none;
    }

    #btn_upload {
        display: block;
        position: relative;
        color: #ffffff;
        font-size: 18px;
        text-align: center;
        margin: auto;
        border-radius: 5px;
        cursor: pointer;
    }

    .container p {
        text-align: center;
        margin: 20px 0 30px 0;
    }

    #images {
        width: 90%;
        position: relative;
        margin: auto;
        display: flex;
        justify-content: space-evenly;
        gap: 20px;
        flex-wrap: wrap;
    }

    figure {
        width: 45%;
    }

    img {
        width: 100%;
    }

    figcaption {
        text-align: center;
        font-size: 2.4vmin;
        margin-top: 0.5vmin;
    }
</style>