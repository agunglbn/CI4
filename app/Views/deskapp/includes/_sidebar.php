<div class="left-side-bar">
    <div class="brand-logo">
        <a href="<?php echo base_url('deskapp/dashboard'); ?>">
            <img src="<?php echo base_url(); ?>/assets/vendors/images/logohkbphitam.svg" alt="" class="dark-logo">
            <img src="<?php echo base_url(); ?>/assets/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <li>
                    <a href="<?php echo base_url('users'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <?php if (in_groups('parataon')) : ?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy ti-package"></span><span class="mtext">Parataon</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('/inventory'); ?>">Data Parataon</a></li>
                        <li><a href="<?php echo base_url('/users/financeParataon'); ?>">Finance</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (in_groups('diakonia')) : ?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy ti-server"></span><span class="mtext">Diakonia</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('/admin/jemaat'); ?>">Data Jemaat</a></li>
                        <li><a href="<?php echo base_url('/financeDiakon'); ?>">Administrasi</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy fa fa-group"></span><span class="mtext">Naposo</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/tables/basic'); ?>">Data Naposo</a></li>
                        <li><a href="<?php echo base_url('deskapp/tables/datatable'); ?>">Administrasi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy fa fa-group"></span><span class="mtext">Remaja</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/tables/basic'); ?>">Data Remaja</a></li>
                        <li><a href="<?php echo base_url('deskapp/tables/datatable'); ?>">Administrasi</a></li>
                    </ul>
                </li> -->

                <?php if (in_groups('admin')) : ?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon icon-copy ti-server"></span><span class="mtext">Diakonia</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('/admin/jemaat'); ?>">Data Jemaat</a></li>
                        <li><a href="<?php echo base_url('/admin/kas'); ?>">Administrasi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-book1"></span><span class="mtext">Informasi</span>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo base_url('admin/berita'); ?>" class="dropdown-toggle no-arrow">
                                Berita
                            </a></li>
                        <li><a href="<?php echo base_url('admin/gallery'); ?>">Galerry</a></li>
                        <li><a href="<?php echo base_url('admin/stensilan'); ?>">Stensilan</a></li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="<?php echo base_url('admin/berita'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-book1"></span><span class="mtext">Berita</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo base_url('program'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-notepad"></span><span class="mtext">Program Kerja</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('Kas'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-money-1"></span><span class="mtext">Keuangan</span> </a>
                </li>


                <li>
                    <a href="<?php echo base_url('admin'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-add-user"></span><span class="mtext">User Management</span>
                    </a>
                </li>

                <?php endif; ?>
                <!-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Forms</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/forms/basic'); ?>">Form Basic</a></li>
                        <li><a href="<?php echo base_url('deskapp/forms/advance'); ?>">Advanced Components</a></li>
                        <li><a href="<?php echo base_url('deskapp/forms/wizard') ?>">Form Wizard</a></li>
                        <li><a href="<?php echo base_url('deskapp/forms/html5Editor'); ?>">HTML5 Editor</a></li>
                        <li><a href="<?php echo base_url('deskapp/forms/pickers'); ?>">Form Pickers</a></li>
                        <li><a href="<?php echo base_url('deskapp/forms/imageCropper'); ?>">Image Cropper</a></li>
                        <li><a href="<?php echo base_url('deskapp/forms/imageDropZone'); ?>">Image Dropzone</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span><span class="mtext">Tables</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/tables/basic'); ?>">Basic Tables</a></li>
                        <li><a href="<?php echo base_url('deskapp/tables/datatable'); ?>">DataTables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('deskapp/calendar'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Calendar</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-apartment"></span><span class="mtext"> UI Elements </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/ui/buttons'); ?>">Buttons</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/cards'); ?>">Cards</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/cardsHover'); ?>">Cards Hover</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/modals'); ?>">Modals</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/tabs'); ?>">Tabs</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/tooltip') ?>">Tooltip &amp; Popover</a></li>

                        <li><a href="<?php echo base_url('deskapp/ui/sweetAlert'); ?>">Sweet Alert</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/notification'); ?>">Notification</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/timeline'); ?>">Timeline</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/progressbar'); ?>">Progressbar</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/typography'); ?>">Typography</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/listgroup'); ?>">List group</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/rangeSlider'); ?>">Range slider</a></li>
                        <li><a href="<?php echo base_url('deskapp/ui/carousel'); ?>">Carousel</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-paint-brush"></span><span class="mtext">Icons</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/icons/fontawesome'); ?>">FontAwesome Icons</a></li>
                        <li><a href="<?php echo base_url('deskapp/icons/foundation'); ?>">Foundation Icons</a></li>
                        <li><a href="<?php echo base_url('deskapp/icons/ionicons'); ?>">Ionicons Icons</a></li>
                        <li><a href="<?php echo base_url('deskapp/icons/themify'); ?>">Themify Icons</a></li>
                        <li><a href="<?php echo base_url('deskapp/icons/custom'); ?>">Custom Icons</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-analytics-21"></span><span class="mtext">Charts</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/charts/highchart'); ?>">Highchart</a></li>
                        <li><a href="<?php echo base_url('deskapp/charts/knobchart'); ?>">jQuery Knob</a></li>
                        <li><a href="<?php echo base_url('deskapp/charts/jvectormap'); ?>">jvectormap</a></li>
                        <li><a href="<?php echo base_url('deskapp/charts/apexcharts'); ?>">Apexcharts</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Additional Pages</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/Additionalpages/videoplayer'); ?>">Video Player</a>
                        </li>
                        <li><a href="<?php echo base_url('deskapp/Additionalpages/login'); ?>">Login</a></li>
                        <li><a href="<?php echo base_url('deskapp/Additionalpages/forgot_password'); ?>">Forgot
                                Password</a></li>
                        <li><a href="<?php echo base_url('deskapp/Additionalpages/reset_password'); ?>">Reset
                                Password</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-browser2"></span><span class="mtext">Error Pages</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/error/error_400'); ?>">400</a></li>
                        <li><a href="<?php echo base_url('deskapp/error/error_403'); ?>">403</a></li>
                        <li><a href="<?php echo base_url('deskapp/error/error_404'); ?>">404</a></li>
                        <li><a href="<?php echo base_url('deskapp/error/error_500'); ?>">500</a></li>
                        <li><a href="<?php echo base_url('deskapp/error/error_503'); ?>">503</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-copy"></span><span class="mtext">Extra Pages</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/extrapages/blank'); ?>">Blank</a></li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/contact_directory'); ?>">Contact
                                Directory</a></li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/blog'); ?>">Blog</a></li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/blog_detail'); ?>">Blog Detail</a></li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/product'); ?>">Product</a></li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/product_detail'); ?>">Product Detail</a>
                        </li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/faq'); ?>">FAQ</a></li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/profile'); ?>">Profile</a></li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/gallery'); ?>">Gallery</a></li>
                        <li><a href="<?php echo base_url('deskapp/extrapages/pricing'); ?>">Pricing Tables</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-list3"></span><span class="mtext">Multi Level Menu</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="javascript:;">Level 1</a></li>
                        <li><a href="javascript:;">Level 1</a></li>
                        <li><a href="javascript:;">Level 1</a></li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-plug"></span><span class="mtext">Level 2</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="javascript:;">Level 2</a></li>
                                <li><a href="javascript:;">Level 2</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;">Level 1</a></li>
                        <li><a href="javascript:;">Level 1</a></li>
                        <li><a href="javascript:;">Level 1</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('deskapp/sitemap'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-diagram"></span><span class="mtext">Sitemap</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('deskapp/chat/'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-chat3"></span><span class="mtext">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('deskapp/invoice/'); ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-invoice"></span><span class="mtext">Invoice</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <div class="sidebar-small-cap">Extra</div>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit-2"></span><span class="mtext">Documentation</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url('deskapp/docs/introduction'); ?>">Introduction</a></li>
                        <li><a href="<?php echo base_url('deskapp/docs/getting_started'); ?>">Getting Started</a></li>
                        <li><a href="<?php echo base_url('deskapp/docs/color_settings'); ?>">Color Settings</a></li>
                        <li><a href="<?php echo base_url('deskapp/docs/third_party_plugins'); ?>">Third Party
                                Plugins</a></li>
                    </ul>
                </li>
                <li>
                    <a href="https://dropways.github.io/deskapp-free-single-page-website-template/" target="_blank"
                        class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-paper-plane1"></span>
                        <span class="mtext">Landing Page <img
                                src="<?php echo base_url(); ?>/assets/vendors/images/coming-soon.png" alt=""
                                width="25"></span>
                    </a>
                </li>-->
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>