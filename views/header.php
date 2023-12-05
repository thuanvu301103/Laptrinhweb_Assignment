<header class="flex-row h-25 w-100 gap-5 justify-content-center bg-white d-flex align-items-center p-2">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <div class="fs-2" style="font-weight: 900;">
    <a href="/" class="text-decoration-none text-dark">Shop.co</a>
  </div>
  <div class="d-flex flex-row gap-2 overflow-x-hidden align-items-center">
    <button type="button" class="fw-bold bg-white btn-light btn fw-medium">Shop</button>
    <button type="button" class="fw-bold bg-white btn-light btn fw-medium">On Sale</button>
    <button type="button" class="fw-bold bg-white btn-light btn fw-medium">New Arrivals</button>
    <button type="button" class="fw-bold bg-white btn-light btn fw-medium">Brands</button>
  </div>
  <div class="flex-row gap-2 align-items-center">
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
    <button type="button" title="Cart" class="bg-white btn-light btn fw-medium">
      <!-- cart icon button -->
      <iconify-icon icon="mdi:cart" color="black" width="30" height="30"></iconify-icon>
    </button>
    <!-- account icon button -->
    <button type="button" title="Account" class="bg-white btn-light btn fw-medium">
      <iconify-icon icon="mdi:account" color="black" width="30" height="30"></iconify-icon>
    </button>
  </div>
  <script>
    $(document).ready(function() {
      $('.search-box input[type="text"]').on("keyup input", function() {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if (inputVal.length) {
          $.get("../controllers/search.controller.php", {
            term: inputVal
          }).done(function(data) {
            // Display the returned data in browser
            resultDropdown.html(data);
          });
        } else {
          resultDropdown.empty();
        }
      });

      // Set search input value on click of result item
      $(document).on("click", ".result p", function() {
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
      });
    });
  </script>
</header>