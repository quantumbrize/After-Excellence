    <!-- <script src="<?= base_url()?>/public/assets/js/index.js"></script> -->
    <script src="<?= base_url()?>/public/assets/js/study.js"></script>

    <script src="<?= base_url()?>/public/assets/js/scripts.js"></script>
    <script src="<?= base_url()?>/public/assets/js/test.js"></script>

  <?php
        if (!empty ($footer_asset_link)) {
            foreach ($footer_asset_link as $link) {
                echo "<script src='" . base_url() . 'public/' . $link . "'></script>";
            }
        }
        if (!empty ($footer_link)) {
            foreach ($footer_link as $link) {
                require_once ('js/' . $link);
            }
        }
    ?>
</body>

</html>