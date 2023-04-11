<?php 

include_once("db.php");

$validationError = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $author = $_POST["author"];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $createdAt =  date('Y-m-d H:i:s', time());

    if(empty($author)) {
        $validationError = "Niste uneli ime autora";
    } else if (empty($title)){
        $validationError = "Niste uneli naslov";
    } else {  
        $sql = "INSERT INTO posts (
            title, author, body, created_at) 
        VALUES ('$author', '$title', '$body', '$createdAt')";
        $statement = $connection->prepare($sql);
        $statement->execute();
        header("Location:createpost.php");
        }
}

?>



<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">

    <link href="styles/styles.css" rel="stylesheet">
</head>


<body>
<main role="main" class="container">

<?php include ('header.php'); ?>

<div class="create-post-form">

    <div class="form">
        <form action="" method="POST">
            <label for="author">Author name:</label><br>
            <input type="text" id="author" name="author"><br>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="body">Body:</label><br>
            <input type="text" id="body" name="body"><br><br>
            <input type="submit" value="Submit">
        </form>
        <p class ="validation"> <?php echo $validationError ?></p>
    </div>
    <?php include('sidebar.php'); ?>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

</div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php'); ?>
</body>
</html>