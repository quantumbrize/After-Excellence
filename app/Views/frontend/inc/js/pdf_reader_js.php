<style>
    /* Adjust this as necessary for your design */
.pdf-viewer-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 150vh;
    margin-bottom: 70px;
    /* Use the full height of the viewport */
}

.pdf-viewer-container iframe {
    width: 70%;
    /* or any percentage or fixed width you prefer */
    height: 150vh;
    /* 80% of the viewport height, adjust as needed */
    border: none;
    /* Removes the border */
}
@media (max-width: 426px) {
        .pdf-viewer-container iframe {
        width: 100%;
        height: 65vh;
    }
    .pdf-viewer-container{
        height: 44vh !important;
    }

}
@media (max-width: 769px) {
        .pdf-viewer-container iframe {
            width: 100%;
            height: 70vh;
        }

    .pdf-viewer-container{
        height: 70vh !important;
    }

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
@media (min-width: 600px) and (max-width: 1024px) {
    .pdf-viewer-container{
        height: 70vh !important;
    }
    .pdf-viewer-container iframe {
            width: 100%;
            height: 80vh;
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

</style>
<div class="heading">
        <a href="<?= base_url()?>"><img src="<?= base_url()?>/public/assets/images/arrow.svg" alt="Back"></a>
        <h2>Home</h2>
    </div>
    <!-- Filters -->
    <div class="switch-buttons">
        <!-- <button class="switch-button active" id="popularPaperBtn">PDF</button> -->
        <!-- <button class="switch-button active" id="studyMaterialBtn">Study Material</button> -->
    </div>
    

    

    <div class="content">
    <div id="studyMaterialContent" class="content-item active">
        <!-- PDF Viewer Start -->
        <a href="" id="download_url" download class="download-button">Download PDF</a>
        <div class="pdf-viewer-container">
            <iframe id="iframe_url" src="" frameborder="0"></iframe>
        </div>
        <!-- PDF Viewer End -->
    </div>
</div>
</br>
</br>
</br>
<!-- <script src="https://documentcloud.adobe.com/view-sdk/viewer.js"></script> -->
<script>
    let url = '<?= $_GET['pdf_url'] ?>';
    document.getElementById('iframe_url').src = 'https://docs.google.com/viewer?url=<?= base_url()?>public/uploads/study_material/'+url+'&embedded=true';
        // document.getElementById('iframe_url').src = 'https://view.officeapps.live.com/op/embed.aspx?src=<?= base_url()?>public/uploads/study_material/' + url;
            // document.getElementById('iframe_url').src = 'https://documentcloud.adobe.com/viewerembed/?file=https://<?= base_url()?>public/uploads/study_material/'+url;
                // document.getElementById('iframe_url').src = 'https://www.docdroid.net/embed/<?= base_url()?>public/uploads/study_material/' + url;
                    // document.getElementById('iframe_url').src = 'https://viewer.zoho.com/docs/urlview.do?url=<?= base_url()?>/public/uploads/study_material/' + url;
                        // document.getElementById('iframe_url').src = 'https://mozilla.github.io/pdf.js/web/viewer.html?file=<?= base_url()?>/public/uploads/study_material/' + url;



        document.getElementById('download_url').href = '<?= base_url('public/uploads/study_material/') ?>' + url;

</script>