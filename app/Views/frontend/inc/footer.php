<style>
     @media (max-width: 426px) {
        .nav-link {
            display: block;
            padding: 10px 0;
            text-align: center;
            font-size: 10px;
            text-decoration: none;
            color: #757575;
            font-weight: bold;
        }
    }
</style>
<div class="teacher-container">
            <nav class="navbar">
                <ul>
                    <li><a href="<?= base_url()?>" class="nav-link"><i class="fas fa-home"></i>HOME</a></li>
                    <li><a href="<?= base_url('study-material')?>" class="nav-link"><i class="fas fa-book"></i>MATERIAL</a></li>
                    <li><a href="<?= base_url('teachers')?>" class="nav-link"><i class="fas fa-file-alt"></i>TEACHERS</a></li>
                    <li><a href="<?= base_url('all-tests')?>" class="nav-link"><i class="fas fa-tasks"></i>ASSIGNMENT</a></li>
                    <li><a href="<?= base_url('user/account')?>" class="nav-link"><i class="fas fa-user"></i>PROFILE</a></li>
                </ul>
            </nav>
        </div>
        <!-- <footer>
            <br>
            <br>
            <br>
            <br>
        </footer> -->