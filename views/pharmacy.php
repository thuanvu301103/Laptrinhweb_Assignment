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
  while($row = $storesList->fetch_assoc()){
    array_push($listRow,$row);
  }
?>

<head>

    <title>DrugStore</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        let map;
        let maker;
        let lattitude = <?php echo $listRow[0]["latitude"]; ?>;
        let longitude = <?php echo $listRow[0]["longitude"]; ?>;
        function initMap() {
            var phar = { lat: parseFloat(lattitude), lng: parseFloat(longitude)}
            map = new google.maps.Map(document.getElementById("map"), {
                center: phar,
                zoom: 18,
            });
            marker = new google.maps.Marker({
                position: phar,
                map: map
            });
        }
        function newLocation(newLat,newLng)
        {   
          map.setCenter({
              lat : parseFloat(newLat),
              lng : parseFloat(newLng)
          });
          marker = new google.maps.Marker({
              position: { lat: parseFloat(newLat), lng: parseFloat(newLng)},
              map: map
          });
        }
    </script>

    <style>
      .map-body{
        padding: 15px;
      }
      .buttonMap{
        min-width: 250px;
      }
    </style>
</head>

<body>
<<<<<<< HEAD
    <header>
        <?php include "header.php";?>
    </header>
=======
    
    <?php include "header.php";?>
    <div style="height: 500px;">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="height: 500px;">
                <div class="carousel-item active">
                    <img src="../assets/banner1.jpg" class="d-block cimage" alt="image 1">
                    <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                        <h5>Sự đa dạng về kiểu mẫu</h5>
                        <p>Với hàng trăm mẫu mã khác nhau đến từ các nhà sản xuất thời trang nổi tiếng.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/banner2.jpg" class="d-block cimage" alt="image 2">
                    <div class="carousel-caption d-none d-md-block text-white bg-dark bg-opacity-50">
                        <h5>Sự đa dạng về màu sắc</h5>
                        <p>Đa dạng về màu sắc khác nhau đến từ các nhà sản xuất thời trang nổi tiếng. Thỏa sức lựa chọn</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/banner3.jpg" class="d-block cimage" alt="image 2">
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

    <div class="row py-4 justify-content-center">
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
    
>>>>>>> 106572dc3de2fa22f7b5d5721591b10f50cf2f93
    <div class="map-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="btn-group-vertical">
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn1">ShopCo1</button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn2">ShopCo2</button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn3">ShopCo3</button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn4"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn5"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn6"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn7"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn8"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn9"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn10"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn11"></button>
            <button type="button" class="btn btn-secondary btn-sm buttonMap" id="btn12"></button>
          </div>
        </div>
        <div class="col-sm-10">
          <body>
            <div id="map" style="width: 100%; height: 500px;"></div>
          </body>
        </div>
      </div>
    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <footer>
        <?php include "footer.php" ?>
    </footer>
    <script>
      $(document).ready(function ()
      {
        $("#btn1").on('click', function ()
        {
          let lattitude = <?php echo $listRow[0]["latitude"]; ?>;
          let longitude = <?php echo $listRow[0]["longitude"]; ?>;
          newLocation(lattitude,longitude);
        });

        $("#btn2").on('click', function ()
        {
          let lattitude = <?php echo $listRow[1]["latitude"]; ?>;
          let longitude = <?php echo $listRow[1]["longitude"]; ?>;
          newLocation(lattitude,longitude);
        });

        $("#btn3").on('click', function ()
        {
          let lattitude = <?php echo $listRow[2]["latitude"]; ?>;
          let longitude = <?php echo $listRow[2]["longitude"]; ?>;
          newLocation(lattitude,longitude);
        });

      });
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHvHZYM62M9i_8v1MWvS2dkAvovUpEltA&callback=initMap"     
    ></script>
    </main>
</html>