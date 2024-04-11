<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Error</h2>
            <div class="alert alert-danger" role="alert">
                <?php
                if (isset($_GET["message"]) && !empty(trim($_GET["message"]))) {
                    echo htmlspecialchars($_GET["message"]);
                } else {
                    echo "An error occurred.";
                }
                ?>
            </div>
            <a href="index.php" class="btn btn-primary">Return to Landing Page</a>
        </div>
    </div>
</div>
</body>
</html>
