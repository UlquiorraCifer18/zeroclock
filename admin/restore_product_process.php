<?php

require_once("../db.php");
$product_id=$_GET['product_id'];

$id = $product_id;

$result=mysqli_query($con,"select * from products_archive where product_id='$id'")or die ("query 1 incorrect.....");

while(list($product_id,$product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_image2,$product_image3,$product_image4,$product_keywords)=mysqli_fetch_array($result))
{
mysqli_query($con,"INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_keywords`) 
VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_image2','$product_image3','$product_image4','$product_keywords')")
or die ("query incorrect");
}

mysqli_query($con,"delete from products_archive where product_id='$id'")or die("query is incorrect...");
header("location: productlist.php");
?>