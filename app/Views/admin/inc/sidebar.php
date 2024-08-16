<?php

// echo "<pre>";
// print_r($_SESSION[SES_STAFF_ACCESS]);
// die();
?>

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?=base_url()?>public/assets_admin/images/logo.jpg" alt="" height="80">
            </span>
            <span class="logo-lg">
                <img src="<?=base_url()?>public/assets_admin/images/logo.jpg" alt="" height="80">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?=base_url()?>public/assets_admin/images/logo.jpg" alt="" height="80">
            </span>
            <span class="logo-lg">
                <img src="<?=base_url()?>public/assets_admin/images/logo.jpg" alt="" height="80">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user"
                    src="<?= base_url() ?>public/assets_admin/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                            class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                            class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i
                    class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                    class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i
                    class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance :
                    <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span
                    class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                    class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                    class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock
                    screen</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i
                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                    data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
              <!--  <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('dashboard', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link menu-link <?= isset($sidebar['dashboard']) ? 'active' : '' ?>"
                            href="<?= base_url('admin') ?>">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                        </a>
                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link menu-link <?= isset($sidebar['dashboard']) ? 'active' : '' ?>"
                                href="<?= base_url('admin') ?>">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                            </a>
                        </li>
                    <?php
                }
                ?>-->

                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('banners', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['banners']) ? 'active' : '' ?>"
                            href="#sidebarBanner" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['banners']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarBanner">
                            <i class="ri-archive-line"></i>
                            <span>Banners</span>
                        </a>
                        <div class="<?= isset($sidebar['banners']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarBanner">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/banners') ?>" class="nav-link">
                                        All Banner
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/banners/add') ?>" class="nav-link">
                                        Add Banner
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['banners']) ? 'active' : '' ?>"
                                href="#sidebarBanner" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['banners']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarBanner">
                                <i class="ri-archive-line"></i>
                                <span>Banners</span>
                            </a>
                            <div class="<?= isset($sidebar['banners']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarBanner">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/banners') ?>" class="nav-link">
                                            All Banner
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/banners/add') ?>" class="nav-link">
                                            Add Banner
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?>







                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('cities', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['cities']) ? 'active' : '' ?>"
                            href="#sidebarCities" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['cities']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarCities">
                            <i class="ri-building-4-line"></i>
                            <span>Cities</span>
                        </a>
                        <div class="<?= isset($sidebar['cities']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarCities">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/cities') ?>" class="nav-link">
                                        All Cities
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/cities/add') ?>" class="nav-link">
                                        Add Cities
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['cities']) ? 'active' : '' ?>"
                                href="#sidebarCities" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['cities']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarCities">
                                <i class="ri-building-4-line"></i>
                                <span>Cities</span>
                            </a>
                            <div class="<?= isset($sidebar['cities']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarCities">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/cities') ?>" class="nav-link">
                                            All Cities
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/cities/add') ?>" class="nav-link">
                                            Add Cities
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?> -->




                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('centres', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['centres']) ? 'active' : '' ?>"
                            href="#sidebarCentres" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['centres']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarCentres">
                            <i class="ri-home-office-line"></i>
                            <span>Centres</span>
                        </a>
                        <div class="<?= isset($sidebar['centres']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarCentres">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/centres') ?>" class="nav-link">
                                        All Centres
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/centres/add') ?>" class="nav-link">
                                        Add Centre
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['centres']) ? 'active' : '' ?>"
                                href="#sidebarCentres" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['centres']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarCentres">
                                <i class="ri-home-office-line"></i>
                                <span>Centres</span>
                            </a>
                            <div class="<?= isset($sidebar['centres']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarCentres">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/centres') ?>" class="nav-link">
                                            All Centres
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/centres/add') ?>" class="nav-link">
                                            Add Centres
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?> -->




















                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('promotion_card', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link menu-link <?= isset($sidebar['promotion_card']) ? 'active' : '' ?>"
                            href="<?= base_url('admin/promotion-card') ?>">
                            <i class="ri-apps-line"></i></i> <span data-key="t-widgets">Promotion Card</span>
                        </a>
                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link menu-link <?= isset($sidebar['promotion_card']) ? 'active' : '' ?>"
                                href="<?= base_url('admin/promotion-card') ?>">
                                <i class="ri-apps-line"></i></i> <span data-key="t-widgets">Promotion Card</span>
                            </a>
                        </li>
                    <?php
                }
                ?> -->

                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('categories', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link menu-link <?= isset($sidebar['categories']) ? 'active' : '' ?>"
                            href="<?= base_url('admin/categories') ?>">
                            <i class="bx bx-category"></i> <span data-key="t-widgets">Categories</span>
                        </a>
                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link menu-link <?= isset($sidebar['categories']) ? 'active' : '' ?>"
                                href="<?= base_url('admin/categories') ?>">
                                <i class="bx bx-category"></i> <span data-key="t-widgets">Categories</span>
                            </a>
                        </li>
                    <?php
                }
                ?>




















                
                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('classes_branches', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link menu-link <?= isset($sidebar['classes_branches']) ? 'active' : '' ?>"
                            href="<?= base_url('admin/categories') ?>">
                            <i class="ri-git-merge-line"></i> <span data-key="t-widgets">Classes & Branches</span>
                        </a>
                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link menu-link <?= isset($sidebar['classes_branches']) ? 'active' : '' ?>"
                                href="<?= base_url('admin/classes-branches') ?>">
                                <i class="ri-git-merge-line"></i> <span data-key="t-widgets">Classes & Branches</span>
                            </a>
                        </li>
                    <?php
                }
                ?> -->

                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('classes_branches', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['classes_branches']) ? 'active' : '' ?>"
                            href="#sidebarClassAndBranches" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['classes_branches']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarClassAndBranches">
                            <!-- <i class="ri-archive-line"></i> -->
                            <i class="ri-git-merge-line"></i>
                            <span>Classes & Branches</span>
                        </a>
                        <div class="<?= isset($sidebar['classes_branches']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarClassAndBranches">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/lclasses-branches') ?>" class="nav-link">
                                        All Classes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/classes-branches/add') ?>" class="nav-link">
                                        Add Class & Branches
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['classes_branches']) ? 'active' : '' ?>"
                                href="#sidebarClassAndBranches" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['classes_branches']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarClassAndBranches">
                                <!-- <i class="ri-archive-line"></i> -->
                                <i class="ri-git-merge-line"></i>
                                <span>Classes & Branches</span>
                            </a>
                            <div class="<?= isset($sidebar['classes_branches']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarClassAndBranches">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/classes-branches') ?>" class="nav-link">
                                            All Classes
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/classes-branches/add') ?>" class="nav-link">
                                            Add Class & Branches
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?>

                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('popular_papers', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['popular_papers']) ? 'active' : '' ?>"
                            href="#sidebarPopularPapers" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['popular_papers']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarPopularPapers">
                            <!-- <i class="ri-archive-line"></i> -->
                            <i class="ri-pass-pending-line"></i>
                            <span>Popular Papers</span>
                        </a>
                        <div class="<?= isset($sidebar['popular_papers']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarPopularPapers">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/popular-papers') ?>" class="nav-link">
                                        All Popular
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/add/popular-papers') ?>" class="nav-link">
                                        Add Popular Papers
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['popular_papers']) ? 'active' : '' ?>"
                                href="#sidebarPopularPapers" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['popular_papers']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarPopularPapers">
                                <!-- <i class="ri-archive-line"></i> -->
                                <i class="ri-pass-pending-line"></i>
                                <span>Popular Papers</span>
                            </a>
                            <div class="<?= isset($sidebar['popular_papers']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarPopularPapers">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/popular-papers') ?>" class="nav-link">
                                            All Popular Papers
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/add/popular-papers') ?>" class="nav-link">
                                        Add Popular Papers
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?>


                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('study_materials', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['study_materials']) ? 'active' : '' ?>"
                            href="#sidebarStudyMaterials" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['study_materials']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarStudyMaterials">
                            <!-- <i class="ri-archive-line"></i> -->
                            <i class="ri-pass-pending-line"></i>
                            <span>Study Materials</span>
                        </a>
                        <div class="<?= isset($sidebar['study_materials']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarStudyMaterials">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/study-materials') ?>" class="nav-link">
                                        All Study Materials
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/add/study-materials') ?>" class="nav-link">
                                        Add Study Materials
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['study_materials']) ? 'active' : '' ?>"
                                href="#sidebarStudyMaterials" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['study_materials']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarStudyMaterials">
                                <!-- <i class="ri-archive-line"></i> -->
                                <i class="ri-pass-pending-line"></i>
                                <span>Study Materials</span>
                            </a>
                            <div class="<?= isset($sidebar['study_materials']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarStudyMaterials">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/study-materials') ?>" class="nav-link">
                                            All Study Materials
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/add/study-materials') ?>" class="nav-link">
                                        Add Study Materials
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?>





























                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('products', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['products']) ? 'active' : '' ?>"
                            href="#sidebarProduct" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['products']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarProduct">
                            <i class="ri-book-read-line"></i>
                            <span>Courses</span>
                        </a>
                        <div class="<?= isset($sidebar['products']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarProduct">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/product/list') ?>" class="nav-link">
                                        All Courses
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/product/add') ?>" class="nav-link">
                                        Add Course
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['products']) ? 'active' : '' ?>"
                                href="#sidebarProduct" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['products']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarProduct">
                                <i class="ri-book-read-line"></i>
                                <span>Courses</span>
                            </a>
                            <div class="<?= isset($sidebar['products']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarProduct">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/product/list') ?>" class="nav-link">
                                            All Courses
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/product/add') ?>" class="nav-link">
                                            Add Course
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?> -->

                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('live_classes', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['live_classes']) ? 'active' : '' ?>"
                            href="#sidebarLivClasses" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['live_classes']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarLivClasses">
                            <!-- <i class="ri-archive-line"></i> -->
                            <i class="ri-live-line"></i>
                            <span>Live Classe</span>
                        </a>
                        <div class="<?= isset($sidebar['live_classes']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarLivClasses">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/live-classes/links') ?>" class="nav-link">
                                        All Links
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/live-classes/add') ?>" class="nav-link">
                                        Add Class Link
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['live_classes']) ? 'active' : '' ?>"
                                href="#sidebarLivClasses" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['live_classes']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarLivClasses">
                                <!-- <i class="ri-archive-line"></i> -->
                                <i class="ri-live-line"></i>
                                <span>Video Materials</span>
                            </a>
                            <div class="<?= isset($sidebar['live_classes']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarLivClasses">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/live-classes/links') ?>" class="nav-link">
                                            All Links
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/live-classes/add') ?>" class="nav-link">
                                            Add Video Materials Link
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?>

                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('test', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['test_create']) ? 'active' : '' ?>"
                            href="#sidebarTests" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['test_create']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarTests">
                            <!-- <i class="ri-archive-line"></i> -->
                            <i class="ri-ball-pen-fill"></i>
                            <span>Tests</span>
                        </a>
                        <div class="<?= isset($sidebar['test_create']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarTests">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/test/list') ?>" class="nav-link">
                                        All Tests
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/test/create') ?>" class="nav-link">
                                        Create Test
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/check/answers') ?>" class="nav-link">
                                        Check Answers
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?= base_url('/admin/check/answers/anonymous') ?>" class="nav-link">
                                        Check Answers Anonymous
                                    </a>
                                </li> -->
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['test_create']) ? 'active' : '' ?>"
                                href="#sidebarTests" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['test_create']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarTests">
                                <!-- <i class="ri-archive-line"></i> -->
                                <i class="ri-ball-pen-fill"></i>
                                <span>Tests</span>
                            </a>
                            <div class="<?= isset($sidebar['test_create']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarTests">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/test/list') ?>" class="nav-link">
                                            All Tests
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/test/create') ?>" class="nav-link">
                                            Create Test
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/check/answers') ?>" class="nav-link">
                                            Check Answers
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="<?= base_url('/admin/check/answers/anonymous') ?>" class="nav-link">
                                            Check Answers Anonymous
                                        </a>
                                    </li> -->
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?>

                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('create_form_admit', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['create_form_admit']) ? 'active' : '' ?>"
                            href="#sidebarCreateFormAdmit" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['create_form_admit']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarCreateFormAdmit">
                            <i class="ri-pass-pending-line"></i>
                            <span>Admit Data</span>
                        </a>
                        <div class="<?= isset($sidebar['create_form_admit']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarCreateFormAdmit">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/create/admit-form') ?>" class="nav-link">
                                        Admit Form
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/user/admit') ?>" class="nav-link">
                                        User Response
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['create_form_admit']) ? 'active' : '' ?>"
                                href="#sidebarCreateFormAdmit" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['create_form_admit']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarCreateFormAdmit">
                                <i class="ri-pass-pending-line"></i>
                                <span>Admit Data</span>
                            </a>
                            <div class="<?= isset($sidebar['create_form_admit']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarCreateFormAdmit">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/create/admit-form') ?>" class="nav-link">
                                            Admit Form
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/user/admit') ?>" class="nav-link">
                                            User Response
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?> -->





                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('create_result', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['create_result']) ? 'active' : '' ?>"
                            href="#sidebarCreateResult" data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['create_result']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarCreateResult">
                            <i class="ri-pass-pending-line"></i>
                            <span>Results</span>
                        </a>
                        <div class="<?= isset($sidebar['create_result']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarCreateResult">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/results') ?>" class="nav-link">
                                        Alll Result
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/create/result') ?>" class="nav-link">
                                        Create Results
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['create_result']) ? 'active' : '' ?>"
                                href="#sidebarCreateResult" data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['create_result']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarCreateResult">
                                <i class="ri-pass-pending-line"></i>
                                <span>Results</span>
                            </a>
                            <div class="<?= isset($sidebar['create_result']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarCreateResult">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/results') ?>" class="nav-link">
                                            All Result
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/create/result') ?>" class="nav-link">
                                            Create Results
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?> -->

                





















                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('orders', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['orders']) ? 'active' : '' ?>" href="#sidebarOrder"
                            data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['orders']) ? 'true' : 'false' ?>"
                            aria-controls="sidebarOrder">
                            <i class="ri ri-survey-line"></i> <span data-key="t-widgets">Orders</span>
                        </a>
                        <div class="<?= isset($sidebar['orders']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarOrder">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= base_url('admin/orders') ?>">
                                        <span>All Orders</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?= base_url('admin/orders/returns') ?>">
                                        <span>Returns</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['orders']) ? 'active' : '' ?>" href="#sidebarOrder"
                                data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['orders']) ? 'true' : 'false' ?>"
                                aria-controls="sidebarOrder">
                                <i class="ri ri-survey-line"></i> <span data-key="t-widgets">Orders</span>
                            </a>
                            <div class="<?= isset($sidebar['orders']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarOrder">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?= base_url('admin/orders') ?>">
                                            <span>All Orders</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?= base_url('admin/orders/returns') ?>">
                                            <span>Returns</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?> -->

                <!-- <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('discounts', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link menu-link <?= isset($sidebar['discounts']) ? 'active' : '' ?>"
                            href="<?= base_url('admin/discounts') ?>">
                            <i class="ri ri-price-tag-line"></i> <span data-key="t-widgets">Discounts</span>
                        </a>
                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link menu-link <?= isset($sidebar['discounts']) ? 'active' : '' ?>"
                                href="<?= base_url('admin/discounts') ?>">
                                <i class="ri ri-price-tag-line"></i> <span data-key="t-widgets">Discounts</span>
                            </a>
                        </li>
                    <?php
                }
                ?> -->


                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('users', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?= isset($sidebar['users']) ? 'active' : '' ?>" href="#sidebarUser"
                            data-bs-toggle="collapse" role="button"
                            aria-expanded="<?= isset($sidebar['users']) ? 'true' : 'false' ?>" aria-controls="sidebarUser">
                            <i class="bx bx-user"></i>
                            <span>Users</span>
                        </a>
                        <div class="<?= isset($sidebar['users']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarUser">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/users/staff') ?>" class="nav-link">
                                        Teachers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/users/students') ?>" class="nav-link">
                                        Students
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link <?= isset($sidebar['users']) ? 'active' : '' ?>" href="#sidebarUser"
                                data-bs-toggle="collapse" role="button"
                                aria-expanded="<?= isset($sidebar['users']) ? 'true' : 'false' ?>" aria-controls="sidebarUser">
                                <i class="bx bx-user"></i>
                                <span>Users</span>
                            </a>
                            <div class="<?= isset($sidebar['users']) ? '' : 'collapse' ?> menu-dropdown" id="sidebarUser">
                                <ul class="nav nav-sm flex-column">
                                    <!-- <li class="nav-item">
                                        <a href="<?= base_url('/admin/users/customers') ?>" class="nav-link">
                                            Customers
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/users/vendors') ?>" class="nav-link">
                                            Vendors
                                        </a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/users/staff') ?>" class="nav-link">
                                            Teachers
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/admin/users/students') ?>" class="nav-link">
                                            Students
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                    <?php
                }
                ?>

                <?php
                if (isset($_SESSION[SES_STAFF_USER_ID]) && in_array('messages', $_SESSION[SES_STAFF_ACCESS])) {
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link menu-link <?= isset($sidebar['messages']) ? 'active' : '' ?>"
                            href="<?= base_url('admin/messages') ?>">
                            <i class="ri-message-2-line"></i> <span data-key="t-widgets">Messages</span>
                        </a>
                    </li>
                    <?php
                } else if (isset($_SESSION[SES_ADMIN_USER_ID])) {
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link menu-link <?= isset($sidebar['messages']) ? 'active' : '' ?>"
                                href="<?= base_url('admin/messages') ?>">
                                <i class="ri-message-2-line"></i> <span data-key="t-widgets">Messages</span>
                            </a>
                        </li>
                    <?php
                }
                ?>










            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">