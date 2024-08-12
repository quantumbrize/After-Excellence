<!-- Bootstrap CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<style>
        .acc-profile-header {
            background-color: #007bff;
            color: white;
            height: 200px;
        }

        .acc-profile-header .acc-cover-image {
            height: 100%;
            width: 100%;
            object-fit: cover;
            opacity: 0.7;
        }

        .acc-top-dets{
            background: linear-gradient(to right, #edf7ff, #fcf1ea);
            height: 75px;
            width: 100%;
            display: flex;
            align-items: start;
            justify-content: space-between;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            /* border-radius: 50% 10% 50% 10% / 10% 50% 10% 50%; */
        }

        .acc-left-s{
            height: 100%;
            width: auto;
            display: flex;
        }

        .acc-profile-header .acc-profile-picture {
            width: 100px;
            height: 100px;
            margin-top: -40px;
            border-radius: 50%;
            border: 4px solid white;
            filter: drop-shadow(1px 1px 7px rgb(202, 202, 202));
            z-index: 1;
        }

        .acc-profile-header .acc-profile-info {
            color: #000;
            margin-top: 10px;
            margin-left: 15px;
        }

        .acc-profile-header .acc-profile-info h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .acc-profile-header .acc-profile-info p {
            margin: 0;
            font-size: 16px;
        }

        .acc-profile-info {
            margin-top: 75px;
        }

        .acc-profile-info .btn {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            text-align: left;
        }

        .acc-profile-details {
            margin-top: 20px;
        }

        .acc-profile-details .card {
            margin-bottom: 20px;
        }

        .shopping-btn {
            float: right;
            margin-top: 10px;
        }


        /* Responsiveness */
        @media (max-width:768px){
            .acc-top-dets{
                background: linear-gradient(to right, #d4ecff, #ffe5d5);
            }

            .acc-profile-header .acc-profile-info {
                margin-left: 5px;
            }

            .acc-profile-header .acc-profile-info h2 {
                font-size: 18px;
            }

            .acc-profile-header .acc-profile-info p {
                font-size: 15px;
            }
            .shopping-btn {
                font-size: 12px;
                margin-top: 18px;
                padding: 7px;
                padding: 7px;
            }
            
        }

    </style>