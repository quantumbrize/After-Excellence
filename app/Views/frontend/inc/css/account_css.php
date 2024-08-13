<style>

        .acc-container-fluid {
            width: 100%;
            padding-right: 0;
            padding-left: 0;
            margin: 0 auto;
        }

        .acc-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .acc-profile-header {
            background-color: #007bff;
            color: white;
            height: 200px;
            position: relative;
        }

        .acc-cover-image {
            height: 100%;
            width: 100%;
            object-fit: cover;
            opacity: 0.7;
            position: absolute;
            top: 0;
            left: 0;
        }

        .acc-top-dets {
            background: linear-gradient(to right, #edf7ff, #fcf1ea);
            height: 75px;
            width: 100%;
            display: flex;
            align-items: start;
            justify-content: space-between;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            position: relative;
            z-index: 1;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 10px;
        }

        .acc-profile-picture {
            width: 100px;
            height: 100px;
            margin-top: -30px;
            border-radius: 50%;
            border: 4px solid white;
            filter: drop-shadow(1px 1px 7px rgb(202, 202, 202));
            z-index: 1;
            background-color: white;
        }

        .acc-profile-info {
            color: #000;
            margin-top: 10px;
            margin-left: 15px;
            display: flex; 
            flex-wrap: wrap;
        }

        .acc-profile-name{
            margin-top: 10px;
        }

        .acc-profile-info h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .acc-profile-info p {
            margin: 0;
            font-size: 16px;
        }

        .sm-acc-card{
            flex: 1; 
            min-width: 300px;
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.189);
        }

        .acc-btn-cont{
            margin-top: 100px;
        }

        .acc-profile-details {
            flex: 3;
            min-width: 250px;
            margin-top: 20px;
        }

        .acc-card {
            background: linear-gradient(to right, #edf7ff, #fcf1ea);
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            margin-left: 20px;
        }

        .acc-card-title {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .acc-btn {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: left;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .acc-btn-primary {
            background-color: #007bff;
            color: white;
            margin-top: 20px;
        }

        .acc-card-body p{
            margin-bottom: 8px;
        }
        .acc-card-body h5{
            text-decoration: underline;
            margin-top: 0px;
        }

        .acc-card-body-inner{
            z-index: 1;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }
        .acc-card-style{
            position: absolute;
            background-color: #accde8;
            height: 300px;
            width: 170px;
            left: 300px;
            bottom: -50px;
            z-index: -1;
            rotate: 30deg;
        }

        .acc-btn-primary:hover {
            background-color: #0069d9;
        }

        .acc-btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .acc-btn-secondary:hover {
            background-color: #5a6268;
        }


        /* Responsiveness */
        @media (max-width: 768px) {

            .acc-profile-header .acc-profile-info {
                margin-left: 0;
            }

            .acc-profile-header .acc-profile-info h2 {
                font-size: 18px;
            }

            .acc-profile-header .acc-profile-info p {
                font-size: 15px;
            }

            .shopping-acc-btn {
                font-size: 12px;
                margin-top: 10px;
                padding: 7px;
            }

            .acc-container {
                padding: 0 10px;
            }
            .acc-profile-info {
                margin-left: 0px;
            }

            .acc-card {
                padding: 15px;
                margin-left: 0px;
            }

            .acc-btn {
                font-size: 14px;
                padding: 8px;
            }

            .acc-profile-picture {
                width: 80px;
                height: 80px;
                margin-top: -10px;
            }
        }
    </style>