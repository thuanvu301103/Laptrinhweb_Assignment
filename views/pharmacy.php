<?php
include '../controllers/pharmacy.controller.php';
?>
<!doctype html>
<html lang="en" class="h-100">

<?php
$stores = new PharmacyController();
$storesList = $stores->getListPharmacy();
// $row = $pharmacyList->fetch_assoc();
$listRow = array();
while ($row = $storesList->fetch_assoc()) {
    array_push($listRow, $row);
}
?>

<head>

    <title>About Us</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



    <script>
        let map;
        let maker;
        let lattitude = <?php echo $listRow[0]["latitude"]; ?>;
        let longitude = <?php echo $listRow[0]["longitude"]; ?>;

        function initMap() {
            var phar = {
                lat: parseFloat(lattitude),
                lng: parseFloat(longitude)
            }
            map = new google.maps.Map(document.getElementById("map"), {
                center: phar,
                zoom: 18,
            });
            marker = new google.maps.Marker({
                position: phar,
                map: map
            });
        }

        function newLocation(newLat, newLng) {
            map.setCenter({
                lat: parseFloat(newLat),
                lng: parseFloat(newLng)
            });
            marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(newLat),
                    lng: parseFloat(newLng)
                },
                map: map
            });
        }
    </script>

    <style>
        .cimage {
            width: 100%;
            height: 500px;
            object-fit: cover;
            opacity: 0.8;
        }

        p {
            text-align: justify;
        }
    </style>

</head>

<body style="background-color: #F2F0F1;">
    <div class="sticky-top">
        <?php include "header.php"; ?>
    </div>
    <div style="height: 500px;">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="height: 500px;">
                <div class="carousel-item active">
                    <img src="../assets/background/banner_1.jpg" class="d-block cimage" alt="image 1">
                    <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                        <h5>Sự đa dạng về kiểu mẫu</h5>
                        <p>Với hàng trăm mẫu mã khác nhau đến từ các nhà sản xuất thời trang nổi tiếng.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/background/banner_2.jpg" class="d-block cimage" alt="image 2">
                    <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                        <h5>Sự đa dạng về màu sắc</h5>
                        <p>Đa dạng về màu sắc khác nhau đến từ các nhà sản xuất thời trang nổi tiếng. Thỏa sức lựa chọn</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/background/banner_3.jpg" class="d-block cimage" alt="image 2">
                    <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                        <h5>Đa dang về độ tuổi</h5>
                        <p>Hàng trăm lựa chọn cho các độ tuổi khác nhau.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="row py-4 justify-content-center">
        <div class="d-flex justify-content-center col-lg-3 m-2">
            <div class="p-0 m-0 text-center">
                <h2 class="fw-bolder text-dark">200+</h2>
                <div class="text-secondary" style="font-size: 0.8rem;">International Brands</div>
            </div>
        </div>
        <div class="d-flex justify-content-center col-lg-3 m-2 border-start border-3">
            <div class="p-0 m-0 text-center">
                <h2 class="fw-bolder text-dark">2,000+</h2>
                <div class="text-secondary" style="font-size: 0.8rem;">High-Quality Products</div>
            </div>
        </div>
        <div class="d-flex justify-content-center col-lg-3 m-2 border-start border-3">
            <div class="p-0 m-0 text-center">
                <h2 class="fw-bolder text-dark">30,000+</h2>
                <div class="text-secondary" style="font-size: 0.8rem;">Happy Customers</div>
            </div>
        </div>
    </div>

    <div class="row py-4 px-5 justify-content-center">
        <div class="d-flex flex-column justify-content-center col-lg-10 m-2">
            <h1 class="p-0 m-0 text-center fw-bolder text-dark">About Us</h1>
            <div class="text-secondary" style="font-size: 1rem;">
                <p>Chào mừng bạn đến với cửa hàng thời trang của chúng tôi - nơi mang đến cho bạn trải nghiệm mua sắm độc đáo và phong cách.
                    Chúng tôi tự hào là điểm đến lý tưởng cho những người yêu thời trang, nơi bạn có thể khám phá những xu hướng mới nhất và
                    tìm kiếm những chiếc trang phục phản ánh đẳng cấp và cá nhân.</p>
                <p>Chúng tôi không chỉ là một cửa hàng, mà còn là điểm gặp gỡ của những người sành điệu và đam mê thời trang. Với sự đa dạng về kiểu dáng,
                    chất liệu và màu sắc, chúng tôi cam kết đáp ứng mọi nhu cầu của bạn từ bộ sưu tập hàng ngày đến những bữa tiệc quan trọng.</p>
                <p>Chất lượng là ưu tiên hàng đầu của chúng tôi. Chúng tôi luôn lựa chọn những sản phẩm chất lượng cao từ các nhãn hiệu uy
                    tín để mang đến cho bạn sự thoải mái và tự tin mỗi khi diện trang phục của chúng tôi.</p>
                <p>Không chỉ là nơi mua sắm, cửa hàng thời trang của chúng tôi còn là không gian sáng tạo và tận hưởng nghệ thuật thời trang.
                    Chúng tôi tin rằng mỗi chiếc áo, mỗi chiếc quần là một tác phẩm nghệ thuật riêng, là cách bạn diễn đạt cái tôi và phong cách riêng của mình.</p>
                <p>Hãy đồng hành cùng chúng tôi trên hành trình khám phá thế giới thời trang, nơi cái đẹp không chỉ xuất phát từ trang phục mà còn từ cách bạn
                    tỏa sáng và biểu đạt bản thân. Cảm ơn bạn đã chọn chúng tôi, chúng tôi mong muốn bạn sẽ tận hưởng mỗi khoảnh khắc của trải nghiệm mua sắm tại
                    cửa hàng thời trang của chúng tôi.</p>
            </div>
        </div>
        <!--div class="d-flex flex-column justify-content-center col-lg-5 m-2 border-start border-3">
            <h2 class="p-0 m-0 text-center fw-bolder text-dark">Contact Us</h2>
            <div class="text-secondary" style="font-size: 1rem;">
            <ul class="list-unstyled">
                <li>
                    <i class="fas fa-map-marker-alt"></i> 123 Main Street, Cityville
                </li>
                <li>
                    <i class="fas fa-phone"></i> +1 (555) 123-4567
                </li>
                <li>
                    <i class="fas fa-envelope"></i> info@example.com
                </li>
                <li>
                    <i class="fab fa-facebook"></i> <a href="https://www.facebook.com/example" target="_blank">Facebook</a>
                </li>
                <li>
                    <i class="fab fa-instagram"></i> <a href="https://www.instagram.com/example" target="_blank">Instagram</a>
                </li>
                <!-- Thêm các mạng xã hội khác tương tự -->
        </ul>

    </div>
    </div-->
    </div>

    <div class="fs-1 fw-bolder text-center">
        Our store system
    </div>

    <div class="map-body">
        <div class="row w-100">
            <div class="col-sm-2 p-0 m-0">
                <div class="btn-group-vertical w-100 h-100">
                    <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn1">Shop.co Chùa Bộc, Đống Đa</button>
                    <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn2">Shop.co Ocean Park</button>
                    <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn3">Shop.co AEON Hà Đông</button>
                </div>
            </div>
            <div class="col-sm-10 p-0 m-0">
                <div class="p-0 w-100" id="map" style="height: 500px;"></div>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>
    <script>
        $(document).ready(function() {
            $("#btn1").on('click', function() {
                let lattitude = <?php echo $listRow[0]["latitude"]; ?>;
                let longitude = <?php echo $listRow[0]["longitude"]; ?>;
                newLocation(lattitude, longitude);
            });

            $("#btn2").on('click', function() {
                let lattitude = <?php echo $listRow[1]["latitude"]; ?>;
                let longitude = <?php echo $listRow[1]["longitude"]; ?>;
                newLocation(lattitude, longitude);
            });

            $("#btn3").on('click', function() {
                let lattitude = <?php echo $listRow[2]["latitude"]; ?>;
                let longitude = <?php echo $listRow[2]["longitude"]; ?>;
                newLocation(lattitude, longitude);
            });
        });
    </script>

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHvHZYM62M9i_8v1MWvS2dkAvovUpEltA&callback=initMap"></script>
</body>

</html>