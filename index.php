<?php
require_once("Product.php");
require_once("Cart.php");
require_once("CartItem.php");

$product1=new product(1,"iphone",2500,5000);
$product2=new product(2,"sumsung",400,3200);
$product3=new product(3,"opoo",200,2000);

$cart=new Cart();
$carItem1=$cart->addProduct($product1,1);
$carItem2=$product2->addToCart($cart,1);
echo "Number Of Item in Cart :".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL;


echo "Total Price Of Item :".PHP_EOL;
echo $cart->getTotalSum().PHP_EOL;

$carItem2->increaseQuantity(); 
$carItem2->increaseQuantity(); 

echo "Number Of Items In cart :".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL;

echo "Total Price of Items In Cart : ".PHP_EOL;
echo $cart->getTotalSum();


$cart->removeProduct( $product2);

echo "Number Of Items In cart :".PHP_EOL;
echo $cart->getTotalQuantity().PHP_EOL;
 

?>