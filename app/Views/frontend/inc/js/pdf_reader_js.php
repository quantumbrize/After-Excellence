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
        margin-top: 20px;
    }
</style>
<div class="heading">
    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/public/assets/images/arrow.svg" alt="Back"></a>
    <h2>Home</h2>
</div>
<div class="content">
    <div id="studyMaterialContent" class="content-item active">
        <a href="" id="download_url" download class="download-button">Download PDF</a>
        <canvas id="pdfCanvas" class="pdf-viewer-container"></canvas>
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
        const page = await pdf.getPage(1);
        const canvas = document.getElementById('pdfCanvas');
        const context = canvas.getContext('2d');
        const viewport = page.getViewport({ scale: 100 });

        canvas.width = viewport.width;
        canvas.height = viewport.height;

        const renderContext = {
            canvasContext: context,
            viewport: viewport
        };
        await page.render(renderContext).promise;
    }

    renderPDF(pdfUrl);
</script>