<?php
session_start();
require_once('router.php');
include_once('controllers/login.controller.php');
include_once('controllers/register.controller.php');
include_once('controllers/productDetail.controller.php');
include_once('controllers/home.controller.php');
include_once('controllers/cart.controller.php');
include_once('controllers/profile.controller.php');
include_once('controllers/editProfile.controller.php');
include_once('controllers/admin.controller.php');
include_once('controllers/addproduct.controller.php');
include_once('controllers/editPassword.controller.php');
include_once('controllers/pharmacy.controller.php');
include_once('controllers/transaction.controller.php');

$router = new Router();
$router->addRoute('/home', function ($url) {
	$home = new HomeController();
	print_r($home->view());
});

$router->addRoute('/login', function ($url) {
	$login = new LoginController();
	print_r($login->view());
});

$router->addRoute('/register', function ($url) {
	$register = new RegisterController();
	print_r($register->view());
});

$router->addRoute('/editPassword', function ($url) {
	$editPassword = new EditPasswordController();
	print_r($editPassword->view($_SESSION['id']));
});

$router->addRoute('/editProfile', function ($url) {
	$editProfile = new EditProfileController();
	print_r($editProfile->view($_SESSION['id']));
});

$router->addRoute('/product_detail', function ($url) {
	$productdetail = new ProductDetailController();
	print_r($productdetail->view($_GET['id']));
});

$router->addRoute('/cart', function ($url) {
	$cart = new CartController();
	print_r($cart->view($_GET['userid']));
});

$router->addRoute('/transaction', function ($url) {
	$transaction = new TransactionController();
	print_r($transaction->view($_GET['userid']));
});

$router->addRoute('/admin', function ($url) {
	$admin = new AdminController();
	print_r($admin->view($_GET['userid']));
});

$router->addRoute('/profile', function ($url) {
	$profile = new ProfileController();
	print_r($profile->view($_GET['userid']));
});

$router->addRoute('/addproduct', function ($url) {
	$addproduct = new AddProductController();
	print_r($addproduct->view());
});

$router->addRoute('/map', function($url){
	$pharmacy = new PharmacyController();
	print_r($pharmacy->view());
});
$router->run();
