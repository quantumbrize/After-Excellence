<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .video-section {
            position: relative;
            background-color: #000;
            padding-top: 56.25%;
            /* 16:9 Aspect Ratio */
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background: none;
            border: none;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        .video-play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .video-play-button img {
            width: 80px;
            height: 80px;
        }

        .content-section {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
        }

        .category {
            color: #ff6600;
            font-weight: bold;
            font-size: 14px;
        }

        .title {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }

        .description-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .description {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .description a {
            color: #0066cc;
            text-decoration: none;
        }

        .description a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */

        @media (min-width: 768px) {
            .container {
                max-width: 750px;
            }

            .video-play-button img {
                width: 100px;
                height: 100px;
            }
        }

        @media (min-width: 1024px) {
            .container {
                max-width: 900px;
            }

            .video-play-button img {
                width: 120px;
                height: 120px;
            }
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 8px;
            background-color: #000;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>