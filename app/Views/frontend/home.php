<style>
.carousel {
    position: relative;
    width: 100%;
    height: 500px; /* Adjust this height as needed */
    overflow: hidden;
}

.carousel-images {
    display: flex;
    transition: transform 0.5s ease;
    width: 100%;
    height: 100%; /* Ensure the container takes up the full height */
}

.carousel-images img {
    flex-shrink: 0; /* Prevent shrinking */
    width: 100%; /* Ensure images cover the width of the container */
    height: 100%; /* Ensure images cover the height of the container */
    object-fit: cover; /* Adjust the image fitting to cover the container */
}

.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    cursor: pointer;
    padding: 10px;
    z-index: 1; /* Ensure buttons are above other content */
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

.carousel-indicators {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    justify-content: center;
    width: 100%;
}

.carousel-indicators span {
    display: inline-block;
    width: 10px;
    height: 10px;
    background-color: #bbb;
    border-radius: 50%;
    margin: 0 5px;
    cursor: pointer;
}

.carousel-indicators .active {
    background-color: #717171;
}


</style>
<header>
    <!-- <div class="search-bar">
        <img src="<?= base_url()?>/public/assets/images/Fill 1.png" alt="Search Icon" class="search-icon">
        <input type="text" placeholder="search for...">
        <img src="<?= base_url()?>/public/assets/images/FILTER.svg" alt="Filter Icon" class="filter-icon">
    </div> -->
</header>
    <!-- carousel -->
    <!-- <div class="carousel"> -->
        <!-- <div class="carousel-images"> -->
        <!-- <div class="carousel-images" id="banner_container"> -->
                <!-- <img src="<?= base_url()?>/public/assets/images/banner.png" alt="Image 1">
                <img src="<?= base_url()?>/public/assets/images/banner.png" alt="Image 2">
                <img src="<?= base_url()?>/public/assets/images/banner.png" alt="Image 3">
                <img src="<?= base_url()?>/public/assets/images/banner.png" alt="Image 4"> -->
        <!-- </div>
        <button class="carousel-button prev">‹</button>
        <button class="carousel-button next">›</button> -->
        <!-- <div class="carousel-indicators"> -->
        <!-- <div class="carousel-indicators" id="banner_indicators"> -->
            <!-- <span data-index="0" class="active"></span>
            <span data-index="1"></span>
            <span data-index="2"></span>
            <span data-index="3"></span> -->
        <!-- </div>
    </div> -->
    <!-- carousel -->
    <div class="carousel">
    <div class="carousel-images" id="banner_container">
        <!-- <img src="https://via.placeholder.com/800x400?text=Image+1" alt="Image 1">
        <img src="https://via.placeholder.com/800x400?text=Image+2" alt="Image 2">
        <img src="https://via.placeholder.com/800x400?text=Image+3" alt="Image 3">
        <img src="https://via.placeholder.com/800x400?text=Image+4" alt="Image 4"> -->
    </div>
    <button class="carousel-button prev">‹</button>
    <button class="carousel-button next">›</button>
    <div class="carousel-indicators" id="banner_indicators">
        <!-- <span data-index="0" class="active"></span>
        <span data-index="1"></span>
        <span data-index="2"></span>
        <span data-index="3"></span> -->
    </div>
</div>
    <!-- carousel -->
    <!-- <div class="carousel">
            <div class="carousel-images">
            <img src="<?= base_url()?>/public/assets/images/banner.png" alt="Image 1">
                <img src="<?= base_url()?>/public/assets/images/banner.png" alt="Image 2">
                <img src="<?= base_url()?>/public/assets/images/banner.png" alt="Image 3">
                <img src="<?= base_url()?>/public/assets/images/banner.png" alt="Image 4">
            </div>
            <button class="carousel-button prev">‹</button>
            <button class="carousel-button next">›</button>
            <div class="carousel-indicators">
                <span data-index="0" class="active"></span>
                <span data-index="1"></span>
                <span data-index="2"></span>
                <span data-index="3"></span>
            </div>
        </div> -->
        <!-- carousel -->

        <!-- study material -->
        <div class="header">
            <h3>Study Material</h3>
            <a href="<?= base_url('study-material')?>">
                <button class="see-all" id="see-all-material">See All ></button>
            </a>
        </div>
        <div class="section-container" id="study_materials">
        <!-- <div class="section-container"> -->
            <!-- <div class="section-item">
                <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 1" class="section-image">
                <div class="section-title">Title 1</div>
            </div>
            <div class="section-item">
                <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 2" class="section-image">
                <div class="section-title">Title 2</div>
            </div>
            <div class="section-item">
                <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 1" class="section-image">
                <div class="section-title">Title 3</div>
            </div>
            <div class="section-item">
                <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 2" class="section-image">
                <div class="section-title">Title 4</div>
            </div>
            <div class="section-item">
                <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 1" class="section-image">
                <div class="section-title">Title 5</div>
            </div>
            <div class="section-item">
                <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 2" class="section-image">
                <div class="section-title">Title 6</div>
            </div>
            <div class="section-item">
                <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 1" class="section-image">
                <div class="section-title">Title 7</div>
            </div>
            <div class="section-item">
                <img src="<?= base_url()?>/public/assets/images/pdfimage.png" alt="Description of Image 2" class="section-image">
                <div class="section-title">Title 8</div>
            </div> -->
            <!-- Add more sections as needed -->
        </div>
        <!-- study-material-->

         <!-- study material -->
         <div class="header">
            <h3>Video Material</h3>
            <a href="<?= base_url('live-classes')?>">
                <button class="see-all" id="see-all-material">See All ></button>
            </a>
        </div>
        <div class="section-container" id="video_materials">
        </div>

        <!-- test -->
        <div class="test-container">
            <div class="header">
                <h3>Your Test</h3>
                <!-- <a href="#"><button class="see-all" id="see-all-tests">See All ></button></a> -->
            </div>
            <div class="card-container" id="online_tests">
                <!-- <div class="test-card">
                    <div class="test-name">Test Card 1</div>
                    <div class="test-details">
                        <span>Detail 1</span>
                        <span>Detail 2</span>
                    </div>
                </div>
                <div class="test-card">
                    <div class="test-name">Test Card 2</div>
                    <div class="test-details">
                        <span>Detail 1</span>
                        <span>Detail 2</span>
                    </div>
                </div>
                <div class="test-card">
                    <div class="test-name">Test Card 2</div>
                    <div class="test-details">
                        <span>Detail 1</span>
                        <span>Detail 2</span>
                    </div>
                </div>
                <div class="test-card">
                    <div class="test-name">Test Card 2</div>
                    <div class="test-details">
                        <span>Detail 1</span>
                        <span>Detail 2</span>
                    </div>
                </div>
                <div class="test-card">
                    <div class="test-name">Test Card 2</div>
                    <div class="test-details">
                        <span>Detail 1</span>
                        <span>Detail 2</span>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- test -->

        <!-- popular paper -->
        <div class="header">
            <h3>Popular Paper</h3>
            <a href="<?= base_url('papers')?>"><button class="see-all" id="see-all-papers">See All ></button></a>
        </div>
        <!-- <div class="button-container">
            <button class="btn">All</button>
            <button class="btn">Graphic Design</button>
            <button class="btn">3D Design</button>
            <button class="btn">Arts & Crafts</button>
            <button class="btn">Photography</button>
            <button class="btn">Web Dev</button>
            <button class="btn">UI/UX Design</button>
        </div> -->
        <!-- popular paper -->
        <!-- card -->
        <div class="banner-container" id="banner-container">
            <!-- Static banner for reference -->
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
        <!-- card -->

        <!-- teacher -->
            <div class="header">
                <h3>Teachers</h3>
                <button class="see-all" id="see-all-material">See All ></button>
            </div>
            <div class="section-container" id="staff_data">
                <!-- <div class="section-item">
                    <img src="<?= base_url()?>/public/assets/images/1.png" alt="Description of Image 1" class="section-image">
                    <div class="section-title">Teacher 1</div>
                </div>
                <div class="section-item">
                    <img src="<?= base_url()?>/public/assets/images/2.png" alt="Description of Image 2" class="section-image">
                    <div class="section-title">Teacher 2</div>
                </div>
                <div class="section-item">
                    <img src="<?= base_url()?>/public/assets/images/1.png" alt="Description of Image 1" class="section-image">
                    <div class="section-title">Teacher 3</div>
                </div>
                <div class="section-item">
                    <img src="<?= base_url()?>/public/assets/images/2.png" alt="Description of Image 2" class="section-image">
                    <div class="section-title">Teacher 4</div>
                </div>
                <div class="section-item">
                    <img src="<?= base_url()?>/public/assets/images/1.png" alt="Description of Image 1" class="section-image">
                    <div class="section-title">Teacher 5</div>
                </div>
                <div class="section-item">
                    <img src="<?= base_url()?>/public/assets/images/2.png" alt="Description of Image 2" class="section-image">
                    <div class="section-title">Teacher 6</div>
                </div>
                <div class="section-item">
                    <img src="<?= base_url()?>/public/assets/images/1.png" alt="Description of Image 1" class="section-image">
                    <div class="section-title">Teacher 7</div>
                </div>
                <div class="section-item">
                    <img src="<?= base_url()?>/public/assets/images/2.png" alt="Description of Image 2" class="section-image">
                    <div class="section-title">Teacher 8</div>
                </div> -->
            
                <!-- Add more sections as needed -->
            </div>