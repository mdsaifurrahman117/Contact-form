<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="Favicon.png" type="image/x-icon">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
                     rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
                     crossorigin="anonymous">
            <title>PHP Form</title>
</head>
<body class="mb-5">
<header>
            <nav class="navbar bg-dark">
                        <div class="container d-flex justify-content-center align-item-center">
                                    <a class="navbar-brand" href="#"> <img src="Logo.png"></a>
                        </div>
            </nav>
</header>
<!-- database -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "contact db";

$DB_connect = mysqli_connect ($servername , $username , $password , $database);
if ($DB_connect -> connect_error) {
  die ("Connection failed : " . $DB_connect -> connect_error);
};

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = " INSERT INTO `contact` (`Name`, `Email`, `Messages`) VALUES ('$name', '$email', '$message')" ;
$result = mysqli_query ($DB_connect , $sql);
if ($result) {
  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> You should check in on some of those fields below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> ' ;
}
?>

    <!-- error script -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && (empty($name) || empty($email) || empty($message))) {
        echo '<div class="alert alert-warning alert-dismissible fade show text-center rounded-0" role="alert">
                            Please fill in all the required fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
    }
    ?>

<div class="container">
<form action="Form.php" method="post" class="w-50 m-auto mt-4">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Message</label>
  <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Submit</button>
</form>
</div>


            <!-- Script -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
                          integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
                          crossorigin="anonymous" 
                          referrerpolicy="no-referrer">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
                          integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
                          crossorigin="anonymous">
              </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" 
                          integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" 
                          crossorigin="anonymous">
              </script>
</body>
</html>