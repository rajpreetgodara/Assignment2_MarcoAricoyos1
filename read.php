<?php
// Include the database connection file
require_once "config.php";

// Initialize variable for record details
$productname = $quantity = $price = "";

// Check if ID parameter is provided in the URL
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Prepare a select statement
    $sql = "SELECT * FROM products WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Store result
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                // Fetch result row as an associative array
                $row = mysqli_fetch_assoc($result);

                // Retrieve individual field values
                $productname = $row["productname"];
                $quantity = $row["quantity"];
                $price = $row["price"];
            } else{
                // Record with the provided ID does not exist
                echo "No record found with that ID.";
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
            exit();
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>View Record</h1>
            </div>
            <div class="form-group">
                <label>Productname</label>
                <p><?php echo $productname; ?></p>
            </div>
           
            <div class="form-group">
                <label>Quantity</label>
                <p><?php echo $quantity; ?></p>
            </div>
            <div class="form-group">
                <label>Price</label>
                <p><?php echo $price; ?></p>
            </div>
            <p><a href="index.php" class="btn btn-primary">Back</a></p>
        </div>
    </div>        
</div>
</body>
</html>
