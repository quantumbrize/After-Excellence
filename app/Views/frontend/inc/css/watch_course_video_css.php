<style>
    /* .product-img{
        height: 60px;
        width: 60px;
        object-fit: contain;
        background: white;
    } */
    tbody tr{
        transition: 50ms;
    }
    #table-product-variant tbody tr:hover{
        cursor: pointer;
       
    }
    .sorting_1{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    #table-product-variant-body td{
       text-align:  center !important;
    }
    #table-product-variant_wrapper{
        overflow-x:scroll ;
    }

    .stock_number{
        padding: 0px 10px 0px 10px;
        width: 20px;
        box-sizing: content-box;
        border: none;
        outline: none;
        text-align: center;
    }



    .course_image {
        text-align: center;
    }

    .course-img {
        width: 80%;
        max-width: 100%; /* Ensures the image doesn't exceed its original size */
        height: auto; /* Maintains aspect ratio */
        display: block; /* Centers the image */
        margin: 0 auto; /* Centers the image horizontally */
    }

    .text-center {
        text-align: center;
    }


    .course_name {
        font-weight: bold;
        font-size: 16px;
        margin-top: 10px; /* Adjust as needed  */
    }

    .course_code {
        font-style: italic;
        font-weight: bold;
        margin-top: 5px; /* Adjust as needed */
    }

    .course_description{
        margin-top: 10px; /* Adjust as needed  */
    }

    .video-style {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        overflow: hidden;
    }

    .video-style iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    @media (min-width: 1025px) {
        .video-style iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 80%;
            border: 0;
        }
    }

    /* @media (min-width: 769px) and (max-width: 1024px) {
        .video-style iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 80%;
            border: 0;
        }
    } */

</style>