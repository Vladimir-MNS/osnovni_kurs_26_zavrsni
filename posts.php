<?php 

include ("db.php");


if(isset($_GET['did'])){
    $did = $_GET['did'];
    $sql = "DELETE FROM comments WHERE post_id='$did'";
    $statement = $connection->prepare($sql);
    $statement->execute();

    $sql = "DELETE FROM posts WHERE id='$did'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    header("posts.php");
}

$sqlGetPosts = "SELECT * FROM posts";
$statement = $connection->prepare($sqlGetPosts);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$allPosts = $statement->fetchAll();

$orderedPosts = array_reverse($allPosts);

$validationError = '';


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

<div class="row">

    <div class="col-sm-8 blog-main">
        <?php foreach ($orderedPosts as $post) { ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="singlepost.php?id=<?php echo $post['id']?>"><?php echo $post['title'] ?></a></h2>
            <p class="blog-post-meta"><?php echo date($post['created_at']); ?> by <a href="#"><?php echo $post['author']; ?></a></p>

            <p><?php echo $post['body']; ?></p>
        </div><!-- /.blog-post -->
    
        <?php } ?>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->

    <?php include('sidebar.php'); ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php'); ?>
</body>
</html>