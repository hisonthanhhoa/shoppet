<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop thú cưng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="layouts/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
</head>

<body>
<div class="pyro"><div class="before"></div><div class="after"></div></div>

    <div class="container">
        <div class="row mb-5">
            <div class="menu">
                <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-warning">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="../images/file logo Son.png" style="height: 50px;" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php?c=dashboard&a=index">Trang chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Thú cưng
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php
                                        $query = "SELECT * FROM quan_li_loai_san_pham WHERE is_phu_kien = 0";
                                        $rs = mysqli_query($conn, $query);


                                        while ($each = mysqli_fetch_array($rs)) {
                                        ?>

                                            <li><a class="dropdown-item" href="#"><?= $each['ten_loai_san_pham'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Phụ kiện</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dịch vụ
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Spa </a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Chăm sóc hộ</a></li>

                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Giới thiệu</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav">

                                <?php if (isset($_SESSION['dang-nhap'])) { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Xin chào, <?php echo $_SESSION['dang-nhap']['ten-dang-nhap'] ?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <form action="?c=dashboard&a=logout" method="post"><button type="submit" class="btn btn-danger">Đăng Xuất</button></form>
                                        </ul>

                                    <?php } else { ?>
                                    <li class="nav-item"> <a class="nav-link btn btn-outline-primary" aria-current="page" href="index.php?c=dashboard&a=dang_nhap">Đăng nhập</a></li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-outline-primary " aria-current="page" href="index.php?c=dashboard&a=dang_ky">Đăng Ký</a>
                                    </li>
                                <?php } ?>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-danger" aria-current="page" href="index.php?c=gio_hang&a=xem_gio_hang"> Giỏ Hàng <span class="badge badge-pill badge-warning bg-danger"><?= isset($_SESSION['gio_hang']) ? $_SESSION['gio_hang']['tong_san_pham'] : 0 ?></span></a>
                                </li>
                            </ul>

                            <form class="d-flex" action="index.php" method="GET">
                                <input class="form-control me-2" type="search" name="tim_kiem" placeholder="bạn cần tìm gì nào..." aria-label="Search">
                                <button class="btn btn-outline-danger bg-dảk" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row mt-5">
            <div class="banner mt-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://lh3.googleusercontent.com/j8TX75NFw3evmP8cMscgM3bSGIqW9V9pOjWc4xnAARjFIkZTag8oPVW1oWs3w7oK-otiDcpzeGtj01J87fAvtH8RiiiaoIj8ngM_LIqB7gewJHt0mBMMO0tkvHMD_YP2w_Z0U1ZXuxiqz9H8gDwv20HdaWj17zKgKFia7jZiMYy78Wh6EfCxb3HFoMoHEHBoUZBUg69ktJehZW99dIN6NQgGWxkZ26zYegpaP1JQNKhtOPiUldVxJG0gf5pyLsQdtG8Hc9ckfOyf2Fk4Fz7IabnkvbknU9JK9wrjY1G89hDIOcJQ5c9ZqHaFFLfEOiXgWQSvAjB75hy0TSAx6LTCR2ynhTqrNeZXmF7cAuW2V2bdlyioRCJUy8_FwdQ9uS--pxNIXwvuFM8bLgXxNN6QnSkR9Vzpjn-S4wyzvqQWGCLL4CStYQtb8iqN32HxJ6XwNL1Ev58Ax1Y0izc1Mnv5PVL2A-eM0X7MNSofHbH6j4SQuN6-VXlLaMm1S0hYkrcuKhw6Zy6UB3-bWq0e9XniVNjATFcpj6m3fW5DyjQyfxCz1ECt_pgvAxC0kGJnqfCHo28F2HCqQSNpTzotxJrnA5AnR3GW8MR49h8XiLAdcZUnaoOO0S7h7rieVnn2JpiBN9f93JfbKB8nlJpf4VzSlPvYhXGS_5I=w1259-h708-no" width="100%" height="300px" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://previews.123rf.com/images/photodeti/photodeti1809/photodeti180900126/107756896-group-of-pets-together-over-white-banner-isolated-on-white-background-.jpg" width="100%" height="300px" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://petparadise.com.vn/wp-content/uploads/2020/04/banner-01-1.jpg" width="100%" height="300px" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <img src="../images/banner-left.png?v=2" data-width="0" style="position: fixed; left: 49.5px; top: 120px;">
        <img src="../images/banner-right.png?v=2" data-width="0" style="position: fixed; right: 49.5px; top: 120px;">
                <p id="time" class="text-danger"></p>
        <?= @$content ?>

        <div class="footer bg-light">
            <!-- Footer -->
            <footer class="page-footer font-small mdb-color lighten-3 pt-4">
                <!-- Footer Links -->
                <div class="container text-center text-md-left">
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
                            <!-- Content -->
                            <h5 class="font-weight-bold text-uppercase mb-4">
                                Shop thú cưng
                            </h5>
                            <p>Niềm tin, chất lượng, phù hợp.</p>
                            <p>
                                Chúng tôi cam kết với khách hàng về chất lượng cũng như giá
                                cảm .
                            </p>
                            <p>Thank you !!</p>
                        </div>
                        <!-- Grid column -->

                        <hr class="clearfix w-100 d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
                            <!-- Links -->
                            <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

                            <ul class="list-unstyled">
                                <li>
                                    <p>
                                        <a href="#!">PROJECTS</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a href="#!">ABOUT US</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a href="#!">BLOG</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a href="#!">AWARDS</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <!-- Grid column -->

                        <hr class="clearfix w-100 d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
                            <!-- Contact details -->
                            <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

                            <ul class="list-unstyled">
                                <li>
                                    <p>
                                        <i class="fas fa-home mr-3"></i> 58 Triều Khúc, Thanh
                                        Xuân, Hà Nội
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fas fa-envelope mr-3"></i>
                                        shopthucung@gmail.com
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone mr-3"></i> +084 999999999</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-print mr-3"></i> 0123456789</p>
                                </li>
                            </ul>
                        </div>
                        <!-- Grid column -->

                        <hr class="clearfix w-100 d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 text-center mx-auto my-4">
                            <!-- Social buttons -->
                            <h5 class="font-weight-bold text-uppercase mb-4">
                                Follow Us
                            </h5>
                            <a href="https://fb.com/100009270018523" target="_blank"><i class="fab fa-facebook fa-2x" style="color: blue"></i></a>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
                <!-- Footer Links -->

                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">
                    © 2020 design by hs
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
    </div>

    </div>

    <script src="layouts/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>