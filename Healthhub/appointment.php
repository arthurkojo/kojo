<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST["patient_id"];
    $doctor_name = $_POST["doctor_name"];
    $appointment_date = $_POST["appointment_date"];

    $sql = "INSERT INTO appointments (patient_id, doctor_name, appointment_date) 
            VALUES ('$patient_id', '$doctor_name', '$appointment_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
