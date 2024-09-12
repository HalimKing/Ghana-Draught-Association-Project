<?php  

if(isset( $_POST["upload"] )) {
    echo "in";

    print_r($_FILES["filename"]);
}



?>