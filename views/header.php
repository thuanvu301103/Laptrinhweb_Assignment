
<header class="flex-row h-25 w-100 gap-5 justify-content-between bg-white d-flex align-items-center p-2">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <div class="fs-2" style="font-weight: 900;">
    <a href="/index.php/home" class="text-decoration-none text-dark">Shop.co</a>
  </div>
  <div class="flex-row gap-2 align-items-center w-25">
    <!-- search bar -->
    <form class="m-0">
      <label class="d-flex flex-row gap-1 bg-body-secondary rounded-pill align-items-center px-2">
        <span class="visually-hidden">Search</span>
        <iconify-icon icon="mdi:magnify" color="black" width="30" height="30"></iconify-icon>
        <input class="search-box form-control bg-transparent border-0" type="search" placeholder="Search" aria-label="Search">
      </label>
    </form>
  </div>
  <div class="flex-row gap-2 align-items-center flex-nowrap d-flex">
    <!-- login icon button -->
    <a href="/index.php/login" title="Login" class="bg-white btn-light btn fw-medium d-flex justify-content-center align-items-center">
      <iconify-icon icon="mdi:login" color="black" width="30" height="30"></iconify-icon>
    </a>
     <!-- logout icon button -->
    <a href="/controllers/logout.php" title="Logout" class="bg-white btn-light btn fw-medium d-flex justify-content-center align-items-center">
      <iconify-icon icon="mdi:logout" color="black" width="30" height="30"></iconify-icon>
    </a>
    <!-- cart icon button -->
    <a href="<?php if(isset($_SESSION['id'])) {echo "./cart?userid=".$_SESSION['id'];}?>" title="Cart" class="bg-white btn-light btn fw-medium d-flex justify-content-center align-items-center">
 
      <iconify-icon icon="mdi:cart" color="black" width="30" height="30"></iconify-icon>
    </a>
    <!-- account icon button -->
    <a href="<?php if(isset($_SESSION['id'])) {echo "./profile?userid=".$_SESSION['id'];} else { echo "./login";} ?>" title="Account" class="bg-white btn-light btn fw-medium d-flex justify-content-center align-items-center">
      <iconify-icon icon="mdi:account" color="black" width="30" height="30"></iconify-icon>
    </a>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
  $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("../controllers/search.controller.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result p", function(){
          $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
          $(this).parent(".result").empty();
      });
  });
  </script>
</header>
  