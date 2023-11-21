<?php
session_start();

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wafauthsuite';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check the connection
if (!$con) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to retrieve user data based on the provided username
    $query = "SELECT id, username, email, password FROM accounts WHERE username = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($con, $query);
    
    // Check if the statement preparation succeeded
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $username);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Store the result so we can check if the account exists in the database.
            mysqli_stmt_store_result($stmt);

            // Check if data exists
            if (mysqli_stmt_num_rows($stmt) > 0) {
                // Bind the result variables
                mysqli_stmt_bind_result($stmt, $userID, $dbUsername, $dbEmail, $dbPassword);

                // Fetch the data
                mysqli_stmt_fetch($stmt);

                // Verify the password
                if (password_verify($password, $dbPassword)) {
                    // Password is correct
                    // Store username and email in session
                    $_SESSION['username'] = $dbUsername;
                    $_SESSION['email'] = $dbEmail;

                    // Close the statement
                    mysqli_stmt_close($stmt);
                } else {
                    // Incorrect password
                    echo '<script>alert("Incorrect password!");';
                    echo 'window.location.href = "login.html";</script>';
                }
            } else {
                // No data found for the given username
                echo '<script>';
                echo 'window.location.href = "login.html";</script>';
            }
        } else {
            // Handle the error
            echo '<script>alert("Error executing the statement: ' . mysqli_stmt_error($stmt) . '");</script>';

        }
    } else {
        // Handle the statement preparation error
        echo '<script>alert("Error preparing the statement! ' . mysqli_error($con) . '");</script>';
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="loggedin">
    <nav class="navtop">
        <div>
            <h1>Website Title</h1>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <h2>Profile Page</h2>
        <div>
            <p>Your account details are below:</p>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Not available'; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Not available'; ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
