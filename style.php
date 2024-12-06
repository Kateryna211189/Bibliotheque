<?php
header ('Content-Type: text/css');
$image_path = "image/img.jpg";

?>
body {
    background-image: url("<?php echo $image_path ?>");
    background-size: cover;
    background-repeat: no-repeat;           
}

footer{
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 50px;
    background-color: #333;
    color: #fff;
}
.form-label mt-4{
    color: black;
}