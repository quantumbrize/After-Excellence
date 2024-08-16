<div class="heading">
        <a href="<?= base_url()?>"><img src="<?= base_url()?>/public/assets/images/arrow.svg" alt="Back"></a>
        <h2>Study</h2>
    </div>
    <!-- Filters -->
    <header>
        <div class="search-bar">
            <img src="<?= base_url()?>/public/assets/images/Fill 1.png" alt="Search Icon" class="search-icon">
            <input type="text" onkeyup="search_popular_papers()" id="searchStudyMaterial" placeholder="Search...">
            <img src="<?= base_url()?>/public/assets/images/FILTER.svg" alt="Filter Icon" class="filter-icon">
        </div>
    </header>
    <div class="switch-buttons">
        <button class="switch-button active" id="popularPaperBtn">Popular Paper</button>
        <a href="<?= base_url('study-material')?>" style="text-decoration:none" class="switch-button">Study Material</a href="<?= base_url('papers')?>">
    </div>
    

    

    <div class="content">
        <div id="studyMaterialContent" class="content-item active">
            <div class="study-material" id="study-material">
                 <!-- <img src="<?= base_url()?>/public/assets/images/save.svg" alt=""> -->
                 <div id="banner-container" class="banner-container">
                    <!-- <div class="banner">
                        <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Banner Image">
                        <div class="banner-content">
                            <h3>Graphic Design</h3>
                            <p>Advanced</p>
                            <p>Rating: 4.2</p>
                        </div>
                    </div>
                    <div class="banner">
                        <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Banner Image">
                        <div class="banner-content">
                            <h3>Graphic Design</h3>
                            <p>Advanced</p>
                            <p>Rating: 4.2</p>
                        </div>
                    </div> -->
                </div>

                <div class="section-container">
                    <div class="section-item">
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>