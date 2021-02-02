<?php
$error = [];
$maxSize = 3072;
$extensions = array('.png', '.gif', '.jpg', '.jpeg');

if(isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
    $file = $_FILES['file'];

    if(in_array($file['type'], $extensions)) {
        if((int)$file['size'] <= $maxSize) {
            move_uploaded_file($file['tmp_name'], 'upload/' . $file['name']);
        }
        else {
            $error[] = "La taille du fichier est trop grande (max 3 mo)";
        }

    }
    else {
        $error[] = "Le type de fichier n'est pas valide";
    }
}
else {
    $error[] = "Il s'est produit une erreur lors de l'upload";
}