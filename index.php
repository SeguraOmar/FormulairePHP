<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clean_input($_POST["name"]);
    $first_name = clean_input($_POST["first_name"]);
    $email = clean_input($_POST["email"]);
    $dob = clean_input($_POST["dob"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

   
    if (!preg_match("/^[A-Za-z]+$/", $name) || !preg_match("/^[A-Za-z]+$/", $first_name)) {
        die("Le nom et le prénom doivent contenir uniquement des lettres.");
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Format de courriel invalide.");
    }


    // Validate password
    if (strlen($password) < 8 || $password !== $confirm_password) {
        die("Le mot de passe doit contenir au moins 8 caractères et les mots de passe doivent correspondre.");
    }

   
    echo "Name: $name<br>";
    echo "First Name: $first_name<br>";
    echo "Email: $email<br>";
    echo "Date of Birth: $dob<br>";
    echo "Password: $password<br>";
}

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

