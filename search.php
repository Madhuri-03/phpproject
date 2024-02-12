<!-- search.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #dae7f5;
        }
        .container {
            margin-top: 50px;
        }
        th, td {
            text-align: center;
        }
        img {
            max-width: 40px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Search Results</h2>

        <?php
        include("form1.php");

        if (isset($_GET['search'])) {
            $search = $_GET['search'];

            // Perform a search query based on the entered name
            $sql = "SELECT * FROM stud WHERE name LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="table table-hover">';
                echo '<thead class="thead-dark">';
                echo '<tr><th>Id</th><th>Name</th><th>Password</th><th>Confirm Password</th><th>Address</th><th>Gender</th><th>DOB</th><th>Email</th><th>Phone</th><th>Photo</th><th>Edit</th><th>Delete</th></tr>';
                echo '</thead><tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["id"].'</td>';
                    echo '<td>' . $row["name"] . '</td>';
                    echo '<td>' . $row["password"] . '</td>';
                    echo '<td>' . $row["conpassword"] . '</td>';
                    echo '<td>' . $row["address"] . '</td>';
                    echo '<td>' . $row["gender"] . '</td>';
                    echo '<td>' . $row["dob"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["phone"] . '</td>';
                    echo '<td><img src="' . $row["photo"] . '" alt="Student Photo" style="max-width: 40px;"></td>';
                    echo "<td><a href='edit.php?id=" . $row["id"] ."'><img src='images.png' alt='Edit' width='20' height='20'></a></td>";
                    echo '<td><a href="delete.php?id=' . $row["id"] . '" onclick="return confirm(\'Are you sure you want to delete?\')"><img src="delete.png" alt="Delete" width="30" height="30"></a></td>';
                    echo '</tr>';
                }

                echo '</tbody></table>';
            } else {
                echo '<p>No records found</p>';
            }
        } else {
            echo '<p>No search query entered</p>';
        }

        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
