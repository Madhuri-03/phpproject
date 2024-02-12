<?php
include("form1.php");
//$name = $address = $gender = $dob = $email = $phone = $photo = "";
if(isset($_GET['id'])) 
{
    $id = $_GET['id'];
     //echo $id;die;
    if(isset($_POST['submit'])) {
       
        $name = $_POST['name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_post['phone'];
    
        
        $sql = "UPDATE stud SET name='$name', address='$address', gender='$gender', dob='$dob', email='$email' WHERE id=$id";
        
        if ($conn->query($sql)===TRUE) 
        {

            echo '<script>alert("Record updated successfully");</script>';
            echo '<script>window.location.href = "http://localhost/disp.php";</script>';
            die;  
             //exit();
            
        } 
        else 
        {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    $sql_query = "SELECT * FROM stud WHERE id=$id";
    $result = mysqli_query($conn, $sql_query);

    

if ($result) 
{
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $address = $row['address'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $email = $row['email'];
        $phone = $row['phone'];
        
        
        
    } 
    else 
    {
        echo "Record not found";
    }
} 
else 
{
    echo "Error in query: " . mysqli_error($conn);
}

}
 else 
{
    echo "ID parameter is missing";
}

mysqli_close($conn);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <center>
    <div class="Main">
    <div class="box">
    <h2>Edit Form</h2>
    
    <form method="post">
        
        <label for="name" >Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required >
        <br>


        <label for="address">Address:</label>
        <input type="text" id="address" name="address"  value="<?php echo $address; ?>"  required>
        <br>
           <label>Gender:</label>
           <input type="radio" name="gender" id="male" value="Male" <?php echo ($gender == 'Male') ? 'checked' : ''; ?> required>
           <span id="male">Male</span>
           <input type="radio" name="gender" id="female" value="Female" <?php echo ($gender == 'Female') ? 'checked' : ''; ?> required>
           <span id="female">Female</span>
           <input type="radio" name="gender" id="other" value="Other" <?php echo ($gender == 'Other') ? 'checked' : ''; ?> required>
           <span id="other">Other</span>
           <br>

         <label for="dob">DOB:</label>
         <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>
         <br>
    
         <label for="email">Email ID:</label>
         <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
         <br>
         
         <label for="phone">Phone:</label>
         <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" value="<?php echo $phone; ?>" required>

         <br>


        

         <button type="submit" name="submit" class="button button1" value="Update">Update Details</button>


    </form>
    <script src="script.js"></script>
    </div>
    </div>
</center>
</body>
</html>