<?php 

$sqlLatestPosts = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
$statement = $connection->prepare($sqlLatestPosts);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$latestPosts = $statement->fetchAll();
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Latest Posts</h4>
                <ol class="list-unstyled">
                    <?php foreach($latestPosts as $latestPost) { ?>
                    <li><a href="singlepost.php?id=<?php echo $latestPost['id']?>"><?php echo $latestPost['title'] ?></a></li>
                    <?php } ?>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->