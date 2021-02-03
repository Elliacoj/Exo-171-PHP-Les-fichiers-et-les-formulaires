<?php
$error = 0;
$maxSize = 3072;
$extensions = array('.png', '.gif', '.jpg', '.jpeg');

if(isset($_POST['file'])) {
    $file = $_POST['file'];
    $info = pathinfo($file);

    if(in_array($info['extension'], $extensions)) {
        if((int)$file['size'] <= $maxSize) {
            move_uploaded_file($file['tmp_name'], 'upload/' . $file['name']);
        }
        else {
            $error = "La taille du fichier est trop grande (max 3 mo)";
        }

    }
    else {
        $error = "Le type de fichier n'est pas valide";
    }



    header("location: index.php?error=$error");
}
else {
    $error = "Il s'est produit une erreur lors de l'upload";


    header("location: index.php?error=$error");
}