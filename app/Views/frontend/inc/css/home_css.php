<style>
    /* Basic styling */
    #hero-banner {
        width: 100%;
        height: 300px; /* Adjust height as needed */
        overflow: hidden;
        position: relative;
    }
    #banner-container {
        width: 100%;
        height: 100%;
        display: flex;
        transition: transform 1s ease;
    }
    .banner-item {
        flex: 0 0 100%;
        height: 100%;
    }
    /* Add additional styling as needed */
    :root {
    --surface-color: #fff;
    --curve: 40;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Noto Sans JP', sans-serif;
      background-color: #fef8f8;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin: 4rem 5vw;
      padding: 0;
      list-style-type: none;
    }

    .card {
      position: relative;
      display: block;
      height: 100%;  
      border-radius: calc(var(--curve) * 1px);
      overflow: hidden;
      text-decoration: none;
    }

    .card__image {      
      width: 100%;
      height: auto;
    }

    .card__overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 1;      
      border-radius: calc(var(--curve) * 1px);    
      background-color: var(--surface-color);      
      transform: translateY(100%);
      transition: .2s ease-in-out;
    }

    .card:hover .card__overlay {
      transform: translateY(0);
    }

    .card__header {
      position: relative;
      display: flex;
      align-items: center;
      gap: 2em;
      padding: 2em;
      border-radius: calc(var(--curve) * 1px) 0 0 0;    
      background-color: var(--surface-color);
      transform: translateY(-100%);
      transition: .2s ease-in-out;
    }

    .card__arc {
      width: 80px;
      height: 80px;
      position: absolute;
      bottom: 100%;
      right: 0;      
      z-index: 1;
    }

    .card__arc path {
      fill: var(--surface-color);
      /* d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z"); */
    }       

    .card:hover .card__header {
      transform: translateY(0);
    }

    .card__thumb {
      flex-shrink: 0;
      width: 50px;
      height: 50px;      
      border-radius: 50%;      
    }

    .card__title {
      font-size: 1em;
      margin: 0 0 .3em;
      color: #6A515E;
    }

    .card__tagline {
      display: block;
      margin: 1em 0;
      font-family: "MockFlowFont";  
      font-size: .8em; 
      color: #D7BDCA;  
    }

    .card__status {
      font-size: .8em;
      color: #D7BDCA;
    }

    .card__description {
      padding: 0 2em 2em;
      margin: 0;
      color: #D7BDCA;
      font-family: "MockFlowFont";   
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 3;
      overflow: hidden;
    }

    .teacher-section{
      cursor:pointer;
    }
</style>
<style>
    .ag-format-container {
      width: 1142px;
      margin: 0 auto;
    }

    .ag-courses_box {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: start;
      -ms-flex-align: start;
      align-items: flex-start;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;

      padding: 50px 0;
    }
    .ag-courses_item {
      -ms-flex-preferred-size: calc(33.33333% - 30px);
      flex-basis: calc(33.33333% - 30px);

      margin: 0 15px 30px;

      overflow: hidden;

      border-radius: 28px;
    }
    .ag-courses-item_link {
      display: block;
      padding: 30px 20px;
      background-color: #121212;

      overflow: hidden;

      position: relative;
    }
    .ag-courses-item_link:hover,
    .ag-courses-item_link:hover .ag-courses-item_date {
      text-decoration: none;
      color: #FFF;
    }
    .ag-courses-item_link:hover .ag-courses-item_bg {
      -webkit-transform: scale(10);
      -ms-transform: scale(10);
      transform: scale(10);
    }
    .ag-courses-item_title {
      min-height: 87px;
      margin: 0 0 25px;

      overflow: hidden;

      font-weight: bold;
      font-size: 30px;
      color: #FFF;

      z-index: 2;
      position: relative;
    }
    .ag-courses-item_date-box {
      font-size: 18px;
      color: #FFF;

      z-index: 2;
      position: relative;
    }
    .ag-courses-item_date {
      font-weight: bold;
      color: #f9b234;

      -webkit-transition: color .5s ease;
      -o-transition: color .5s ease;
      transition: color .5s ease
    }
    .ag-courses-item_bg {
      height: 128px;
      width: 128px;
      background-color: #f9b234;

      z-index: 1;
      position: absolute;
      top: -75px;
      right: -75px;

      border-radius: 50%;

      -webkit-transition: all .5s ease;
      -o-transition: all .5s ease;
      transition: all .5s ease;
    }
    .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
      background-color: #3ecd5e;
    }
    .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
      background-color: #e44002;
    }
    .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
      background-color: #952aff;
    }
    .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
      background-color: #cd3e94;
    }
    .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
      background-color: #4c49ea;
    }



    @media only screen and (max-width: 979px) {
      .ag-courses_item {
        -ms-flex-preferred-size: calc(50% - 30px);
        flex-basis: calc(50% - 30px);
      }
      .ag-courses-item_title {
        font-size: 24px;
      }
    }

    @media only screen and (max-width: 767px) {
      .ag-format-container {
        width: 96%;
      }

      /* .features-area-hide{
        display: none;
      } */

    }
    @media only screen and (max-width: 639px) {
      .ag-courses_item {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
      }
      .ag-courses-item_title {
        min-height: 72px;
        line-height: 1;

        font-size: 24px;
      }
      .ag-courses-item_link {
        padding: 22px 32px;
      }
      .ag-courses-item_date-box {
        font-size: 16px;
      }

      /* .features-grid-wrap{
        max-width: 100px;
      } */
    }

    @media (min-width: 768px) {
      .counterup-area-2{
        margin-top: 100px;
      }
    }
</style>
<style>
    /* Button Styles */
    .btn-top {
        display: inline-block;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 30px;
        background: linear-gradient(135deg, #4a90e2, #6545d2);
        transition: background 0.3s ease;
        cursor: pointer;
    }

    /* Hover Effect */
    .btn-top:hover {
        background: linear-gradient(135deg, #6545d2, #4a90e2);
    }

    .container-city {
    max-width: 1200px;
    width: 100%;
}

header {
    text-align: center;
    margin-bottom: 20px;
}

header h1 {
    font-size: 2.5em;
    margin: 0;
}

header p {
    font-size: 1.2em;
    color: #555;
}

.search-bar button:hover {
    background-color: #3700b3;
}

    
    .centre-locations {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        /* padding: 20px; */
        margin: 0;
        /* height: 100vh;  */
    }

    .grid-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        max-width: 1200px;
        padding: 10px;
        justify-content: center;
    }

    .grid-item {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: calc(50% - 10px);
        margin-bottom: 20px;
    }

    .grid-item img {
        /* width: 100%;
        height: auto; */
        max-width: 200px;
        max-height: 200px;
        object-fit: cover;
        margin-top: 10px;
    }

    .grid-item h3 {
        font-size: 1.2em;
        margin: 10px 0;
    }

    .grid-item p {
        font-size: 1em;
        color: #555;
        margin: 0 0 10px 0;
    }

    /* Media query for larger screens */
    @media (min-width: 768px) {
        .grid-item {
            width: calc(33.333% - 20px);
        }
    }

    @media (min-width: 1024px) {
        .grid-item {
            width: calc(25% - 20px);
        }
    }

    @media (max-width: 768px) {
        .grid-item img {
            /* width: 100%;
            height: auto; */
            max-width: 130px;
            max-height: 130px;
            object-fit: cover;
            margin-top: 10px;
        }
    }

    .shape-line .icon-19 {
        color: black;
    }

    .modal-btn{
      cursor:pointer;
    }

    @media (max-width: 426px) {
        .carousel-images img {
          height: Auto !important;
          object-fit: contain !important;
          margin: 0 auto !important;
        }

        .carousel {
          height: auto !important;
        }
    }

    @media (max-width: 1024px) {
        .carousel-images img {
          height: Auto !important;
          object-fit: contain !important;
          margin: 0 auto !important;
        }

        .carousel {
          height: auto !important;
        }
    }



}
</style>
<style>
  .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #ffffff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .feedback-form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .modal-content {
                margin: 15% auto;
                max-width: 90%;
            }

            .form-group input,
            .form-group textarea {
                font-size: 14px;
            }

            .form-group button {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 480px) {
            .modal-content {
                margin: 20% auto;
                max-width: 95%;
            }

            .form-group input,
            .form-group textarea {
                font-size: 12px;
            }

            .form-group button {
                font-size: 14px;
            }
        }

</style>