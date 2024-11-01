<style>
    @media (max-width: 769px) {
        .download-button {
            display: block;
            width: 100% !important;
            text-align: center;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .download-button:hover {
            background-color: #45a049;
        }
    }

    @media (min-width: 769px) {
        canvas {
            height: 100%;
            width: 50% !important;
            margin-top: 10px;
        }
    }


    .download-button {
        display: block;
        width: 70%;
        text-align: center;
        padding: 15px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        margin-left: auto;
        margin-right: auto;
    }

    .download-button:hover {
        background-color: #45a049;
    }

    canvas {
        height: 100%;
        width: 100%;
        margin-top: 10px;
        z-index: 10000;
    }

    .pdf-viewer-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .pdf-page-canvas {
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    }

    .content {
        margin-bottom: 100px;
    }

    .canvas-wrapper {
        /* display: inline-block; */
        width: 100%;
        height: auto;
        text-align: center;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pdf-page-canvas {
        max-width: 100%;
        height: auto;
    }
</style>


<div class="heading">
    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/public/assets/images/arrow.svg" alt="Back"></a>
    <h2>Home</h2>
</div>
<div class="content">
    <div id="studyMaterialContent" class="content-item active">
        <a href="" id="download_url" download class="download-button">Download PDF</a>
        <div id="pdfContainer" class="pdf-viewer-container"></div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    const pdfUrl = '<?= base_url('public/uploads/study_material/') ?>' + '<?= $_GET['pdf_url'] ?>';
    document.getElementById('download_url').href = pdfUrl;

    const pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

    async function renderPDF(url) {
        const pdf = await pdfjsLib.getDocument(url).promise;
        const pdfContainer = document.getElementById('pdfContainer');

        // Clear the container to prevent duplicate renders if the function is called multiple times
        pdfContainer.innerHTML = '';

        for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
            const page = await pdf.getPage(pageNum);
            const viewport = page.getViewport({ scale: 1.5 });

            // Create a wrapper with a black background for full-screen effect
            const canvasWrapper = document.createElement('div');
            canvasWrapper.classList.add('canvas-wrapper');
            canvasWrapper.style.backgroundColor = 'white';
            pdfContainer.appendChild(canvasWrapper);

            const canvas = document.createElement('canvas');
            canvas.classList.add('pdf-page-canvas');
            canvasWrapper.appendChild(canvas);

            const context = canvas.getContext('2d');
            canvas.width = viewport.width;
            canvas.height = viewport.height;

            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            await page.render(renderContext).promise;

            // Add click event to toggle full screen
            canvasWrapper.addEventListener("click", toggleFullScreen);
        }
    }

    // Function to toggle full screen mode
    function toggleFullScreen(event) {
        const element = event.currentTarget;

        if (document.fullscreenElement) {
            // Exit full screen if already in full-screen mode
            document.exitFullscreen();
        } else {
            // Enter full screen if not currently in full-screen mode
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) { // Firefox
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) { // Chrome, Safari, Opera
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) { // IE/Edge
                element.msRequestFullscreen();
            }
        }
    }

    // Ensure the function is only called once
    renderPDF(pdfUrl);


</script>