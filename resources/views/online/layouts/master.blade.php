<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Online İşlemler')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template2')}}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{asset('template2')}}/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="{{asset('template2')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{asset('template2')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('template2')}}/assets/css/app.css">
    <link rel="shortcut icon" href="{{asset('template')}}/assets/img/favicon.png" type="image/x-icon">
    <style>
        body::-webkit-scrollbar {
            background-color: #fff;
            width: 16px;
        }

        body::-webkit-scrollbar-track {
            background-color: #fff;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #babac0;
            border-radius: 16px;
            border: 4px solid #fff;
        }

        body::-webkit-scrollbar-button {
            display:none;
        }
    </style>
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="{{route('dashboard')}}"><img src="{{asset('images')}}/aker.png" style="width: 90px; height: 70px;" alt="Logo" srcset="">
                            <div style="font-size: 18px; float: right; display: flex; justify-content: space-between;  padding-top: 21px;">
                                <p style="color: #F28123;">Online&nbsp</p><p style="color: black;">İşlemler</p>
                            </div>
                        </a>

                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item active ">
                        <a href="index.html" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Anasayfa</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Components</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="component-alert.html">Alert</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-badge.html">Badge</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-breadcrumb.html">Breadcrumb</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-button.html">Button</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-card.html">Card</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-carousel.html">Carousel</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-dropdown.html">Dropdown</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-list-group.html">List Group</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-modal.html">Modal</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-navs.html">Navs</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-pagination.html">Pagination</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-progress.html">Progress</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-spinner.html">Spinner</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="component-tooltip.html">Tooltip</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Extra Components</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="extra-component-avatar.html">Avatar</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="extra-component-sweetalert.html">Sweet Alert</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="extra-component-toastify.html">Toastify</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="extra-component-rating.html">Rating</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="extra-component-divider.html">Divider</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span>Layouts</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="layout-default.html">Default Layout</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="layout-vertical-1-column.html">1 Column</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="layout-horizontal.html">Horizontal Menu</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title">Forms &amp; Tables</li>

                    <li class="sidebar-item  ">
                        <a href="form-layout.html" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Form Layout</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-pen-fill"></i>
                            <span>Form Editor</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="form-editor-quill.html">Quill</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-editor-ckeditor.html">CKEditor</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-editor-summernote.html">Summernote</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-editor-tinymce.html">TinyMCE</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="table.html" class='sidebar-link'>
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span>Table</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="table-datatable.html" class='sidebar-link'>
                            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            <span>Datatable</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>@yield('title-page')</h3>
        </div>
        <div class="page-content">
            <section class="row">
               @yield('content')
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; Aker Asansör</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="{{route('dashboard')}}">Furkan, Muhammed, Yunus</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
@yield('js')
<script src="{{asset('template2')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('template2')}}/assets/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('template2')}}/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="{{asset('template2')}}/assets/js/pages/dashboard.js"></script>

<script src="{{asset('template2')}}/assets/js/main.js"></script>
</body>

</html>
