<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed:" . $conn->connect_error);
}

if (isset($_POST['save'])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"]; // Add this line to get the confirm password
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $photo = $_POST["photo"];

    if ($password !== $confirmpassword) 
    {
        echo "<script>alert('Password and Confirm Password must match'); window.location.href = 'form.html';</script>";
    } 
    else 
    {
        // Hash the password before storing it in the database
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO stud (name, password, conpassword, address, gender, dob, email, phone, photo) 
                VALUES ('$name', '$password', '$confirmpassword', '$address', '$gender', '$dob', '$email', '$phone', '$photo')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Registration Successful! Data inserted into table.");</script>';
            echo '<script>window.location.href = "http://localhost/disp.php";</script>';
            die;
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
}

?>
