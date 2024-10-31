<style>
    .video-container {
        width: 100%;
        max-width: 360px;
        margin: auto;
        font-family: Arial, sans-serif;
        color: #333;
    }

    .video-wrapper {
        position: relative;
        width: 100%;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
        background: #000;
    }

    .video-player {
        width: 100%;
        border-radius: 20px 20px 0 0;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.6);
        cursor: pointer;
        transition: opacity 0.3s;
    }

    .play-icon {
        width: 50px;
        height: 50px;
        opacity: 0.9;
    }

    .overlay:hover {
        opacity: 0.8;
    }

    .video-details {
        padding: 15px;
        background: #f9f9f9;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .video-details h4 {
        font-size: 1.1em;
        margin-bottom: 5px;
        color: #000;
    }

    .video-details p {
        font-size: 0.9em;
        color: #666;
    }

    .read-more {
        color: #0066cc;
        text-decoration: none;
        font-weight: bold;
    }
</style>

<div class="video-container">
    <div class="video-wrapper">
        <video id="myVideo" class="video-player" poster="thumbnail.jpg">
            <source src="video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="overlay" onclick="togglePlay()">
            <img src="https://cdn3.iconfinder.com/data/icons/iconic-1/32/play_alt-512.png" class="play-icon"
                alt="Play Icon">
        </div>
    </div>
    <div class="video-details">
        <h4 id="video-title">Loading...</h4>
        <br>
        <p><strong>Description</strong></p>
        <p id="video-description">Please wait while the description loads.</p>
    </div>
</div>

<script>

    // Function to toggle video play/pause
    function togglePlay() {
        const video = document.getElementById("myVideo");
        const overlay = document.querySelector(".overlay");

        if (video.paused) {
            video.play();
            overlay.style.display = "none";
            video.setAttribute("controls", ""); // Show controls
        } else {
            video.pause();
            overlay.style.display = "flex";
            video.removeAttribute("controls"); // Hide controls
        }
    }

    document.getElementById("myVideo").addEventListener("pause", () => {
        document.querySelector(".overlay").style.display = "flex";
    });

    // Fetch video details from API
    function fetchVideoDetails() {
        const urlParams = new URLSearchParams(window.location.search);
        const classId = urlParams.get('id'); // Get the id parameter from URL
        fetch("<?= base_url('/api/live-classes') ?>")  // Replace with your actual API endpoint
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Find the class that matches the classId
                const videoData = data.data.find(item => item.live_class_id === classId);

                if (videoData) {
                    // Update the video title, description, and video source
                    document.getElementById("video-title").textContent = videoData.title;
                    document.getElementById("video-description").innerHTML = videoData.description;
                    document.getElementById("myVideo").src = ` <?= base_url() . 'public/uploads/video_material_video/' ?>${videoData.video}`; // Set the video source
                } else {
                    document.getElementById("video-title").textContent = "Video not found";
                    document.getElementById("video-description").textContent = "Unable to find the requested video.";
                }
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
                document.getElementById("video-title").textContent = "Error loading video details";
                document.getElementById("video-description").textContent = "Unable to fetch video description.";
            });
    }

    // Call fetchVideoDetails on page load
    document.addEventListener("DOMContentLoaded", fetchVideoDetails);
</script>