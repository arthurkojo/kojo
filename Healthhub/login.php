<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM patients WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            echo "Login successful!";
            session_start();
            $_SESSION["patient_id"] = $row["id"];
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No account found!";
    }

    $conn->close();
}
?>
