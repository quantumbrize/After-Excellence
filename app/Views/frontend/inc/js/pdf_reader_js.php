<style>
    /* Adjust this as necessary for your design */
.pdf-viewer-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin-bottom: 70px;
    /* Use the full height of the viewport */
}

.pdf-viewer-container iframe {
    width: 70%;
    /* or any percentage or fixed width you prefer */
    height: 100vh;
    /* 80% of the viewport height, adjust as needed */
    border: none;
    /* Removes the border */
}
@media (max-width: 426px) {
        .pdf-viewer-container iframe {
        width: 100%;
        height: 35vh;
    }
    .pdf-viewer-container{
        height: 44vh !important;
    }
}
@media (max-width: 769px) {
        .pdf-viewer-container iframe {
        width: 100%;
        height: 40vh;
    }

    .pdf-viewer-container{
        height: 44vh !important;
    }
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
        <div class="pdf-viewer-container">
            <iframe id="iframe_url" src="" frameborder="0"></iframe>
        </div>
        <!-- PDF Viewer End -->
    </div>
</div>

<script>
    let url = '<?= $_GET['pdf_url'] ?>';
    document.getElementById('iframe_url').src = '<?= base_url()?>public/uploads/study_material/'+url;
</script>