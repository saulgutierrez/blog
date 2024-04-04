<?php
    require "admin/includes/dbh.php";

    if (isset($_REQUEST['blog'])) {
        $blogPath = $_REQUEST['blog']; // Get the path, and that we're going to use to get the row from our database
        // Getting the path of our blogs
        $sqlGetBlog = "SELECT * FROM blog_post WHERE v_post_path = '$blogPath' AND f_post_status = '1'";
        $queryGetBlog = mysqli_query($conn, $sqlGetBlog);

        if ($rowGetBlog = mysqli_fetch_assoc($queryGetBlog)) {
            $blogPostId = $rowGetBlog['n_blog_post_id'];
            $blogCategoryId = $rowGetBlog['n_category_id'];
            $blogTitle = $rowGetBlog['v_post_title'];
            $blogMetaTitle = $rowGetBlog['v_post_meta_title'];
            $blogContent = $rowGetBlog['v_post_content'];
            $blogMainImgUrl = $rowGetBlog['v_main_image_url'];
            $blogCreationDate = $rowGetBlog['d_date_created'];
        } else {
            header('Location: index.php');
            exit();
        }

        $sqlGetCategory = "SELECT * FROM blog_category WHERE n_category_id = '$blogCategoryId'";
        $queryGetCategory = mysqli_query($conn, $sqlGetCategory);

        if ($rowGetCategory = mysqli_fetch_assoc($queryGetCategory)) {
            $categoryTitle = $rowGetCategory['v_category_title'];
            $blogCategoryPath = $rowGetCategory['v_category_path'];
        }

        $sqlGetTags = "SELECT * FROM blog_tags WHERE n_blog_post_id = '$blogPostId'";
        $queryGetTags = mysqli_query($conn, $sqlGetTags);

        if ($rowGetTags = mysqli_fetch_assoc($queryGetTags)) {
            $blogTags = $rowGetTags['v_tag'];
            # Create an array with all tags in it
            $blogTagsArr = explode(",", $blogTags);
        }
    }
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Saul's Blog | <?php echo $blogMetaTitle; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body id="top">


    <!-- preloader
    ================================================== -->
    <div id="preloader"> 
    	<div id="loader"></div>
    </div>

    <?php include "header-opaque.php"; ?>

    <!-- content
    ================================================== -->
    <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry format-standard">

                    <div class="s-content__media">
                        <div class="s-content__post-thumb">
                            <img src="<?php echo $blogMainImgUrl;?>" 
                                 srcset="<?php echo $blogMainImgUrl;?> 2100w, 
                                         <?php echo $blogMainImgUrl;?> 1050w, 
                                         <?php echo $blogMainImgUrl;?> 525w" sizes="(max-width: 2100px) 100vw, 2100px" alt="">
                        </div>
                    </div> <!-- end s-content__media -->

                    <div class="s-content__entry-header">
                        <h1 class="s-content__title s-content__title--post"><?php echo $blogTitle; ?></h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__entry-content">
                            <?php echo $blogContent;?>
                        </div> <!-- end s-entry__entry-content -->

                        <div class="s-content__entry-meta">

                            <div class="entry-author meta-blk">
                                <div class="author-avatar">
                                    <img class="avatar" src="images/saul.jpg" alt="">
                                </div>
                                <div class="byline">
                                    <span class="bytext">Posted By</span>
                                    <a href="#0">Saul Gutierrez</a>
                                </div>
                            </div>

                            <div class="meta-bottom">
                                
                                <div class="entry-cat-links meta-blk">
                                    <div class="cat-links">
                                        <span>In</span> 
                                        <a href="categories.php?group=<?php echo $blogCategoryPath; ?>"><?php echo $categoryTitle; ?></a>
                                    </div>

                                    <span>On</span>
                                    <!-- Returns the date in specific format -->
                                    <?php echo date("M j, Y", strtotime($blogCreationDate)); ?>
                                </div>

                                <div class="entry-tags meta-blk">
                                    <span class="tagtext">Tags</span>
                                    <?php
                                    # Count get the lenght of the array where our tags are stored
                                    for ($i = 0; $i < count($blogTagsArr); $i++) {
                                        if (!empty($blogTagsArr[$i])) { # Checkimg of array is not empty
                                            // Show all tags and search for a query when click on any tag
                                            echo "<a href='search.php?query=".$blogTagsArr[$i]."'>".$blogTagsArr[$i]."</a>";
                                        }
                                    }

                                    ?>
                                </div>

                            </div>

                        </div> <!-- s-content__entry-meta -->

                        <div class="s-content__pagenav">

                            <?php

                            $sqlGetPreviousBlog = "SELECT * FROM blog_post WHERE n_blog_post_id = (SELECT max(n_blog_post_id) FROM blog_post WHERE n_blog_post_id < '".$blogPostId."') AND f_post_status = '1'";

                            $queryGetPreviousBlog = mysqli_query($conn, $sqlGetPreviousBlog);

                            $sqlGetNextBlog = "SELECT * FROM blog_post WHERE n_blog_post_id = (SELECT min(n_blog_post_id) FROM blog_post WHERE n_blog_post_id > '".$blogPostId."') AND f_post_status = '1'";

                            $queryGetNextBlog = mysqli_query($conn, $sqlGetNextBlog);

                            if ($rowGetPreviousBlog = mysqli_fetch_assoc($queryGetPreviousBlog)) {
                                $previousBlogName = $rowGetPreviousBlog['v_post_title'];
                                $previousBlogPath = $rowGetPreviousBlog['v_post_path'];

                                echo "<div class='prev-nav'>
                                            <a href='single-blog.php?blog=".$previousBlogPath."' rel='prev'>
                                                <span>Previous</span>
                                                ".$previousBlogName." 
                                            </a>
                                        </div>";
                            }

                            if ($rowGetNextBlog = mysqli_fetch_assoc($queryGetNextBlog)) {
                                $nextBlogName = $rowGetNextBlog['v_post_title'];
                                $nextBlogPath = $rowGetNextBlog['v_post_path'];

                                echo "<div class='prev-nav'>
                                            <a href='single-blog.php?blog=".$nextBlogPath."' rel='prev'>
                                                <span>Next</span>
                                                ".$nextBlogName." 
                                            </a>
                                        </div>";
                            }

                            ?>
                         </div> <!-- end s-content__pagenav -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->

        <?php

        $sqlGetAllComments = "SELECT * FROM blog_comments WHERE n_blog_post_id = '$blogPostId'";
        $queryGetAllComments = mysqli_query($conn, $sqlGetAllComments);
        $numComments = mysqli_num_rows($queryGetAllComments);

        ?>

        <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="column large-12">

                    <h3><?php echo $numComments; ?> Comments</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">

                        <?php

                        # Check the comments belong to this blog and it's also gonna check if it's the parent comment
                        $sqlGetComments = "SELECT * FROM blog_comments WHERE n_blog_post_id = '$blogPostId' AND n_blog_comment_parent_id = '0' ORDER BY d_date_created ASC";
                        $queryGetComments = mysqli_query($conn, $sqlGetComments);

                        while ($rowComments = mysqli_fetch_assoc($queryGetComments)) {
                            $commentId = $rowComments['n_blog_comment_id'];
                            $commentAuthor = $rowComments['v_comment_author'];
                            $comment = $rowComments['v_comment'];
                            $commentDate = $rowComments['d_date_created'];

                            // Check if there are any replies to the main comment
                            $sqlCheckCommentChildren = "SELECT * FROM blog_comments WHERE n_blog_comment_parent_id = '$commentId' ORDER BY d_date_created ASC";
                            $queryCheckCommentChildren = mysqli_query($conn, $sqlCheckCommentChildren);
                            $numCommentChildren = mysqli_num_rows($queryCheckCommentChildren);

                            // If there are no replies, only shows up the main comment and the reply button
                            if ($numCommentChildren == 0) {
                                ?>
                                    <li class="depth-1 comment">
                                        <div class="comment__content">
                                            <div class="comment__info">
                                                <input type="hidden" id="comment-author-<?php echo $commentId; ?>" value="<?php echo $commentAuthor; ?>">
                                                <div class="comment__author"><?php echo $commentAuthor; ?></div>
                                                <div class="comment__meta">
                                                    <div class="comment__time"><?php echo date("M j, Y", strtotime($commentDate));?></div>
                                                    <div class="comment__reply">
                                                        <a class="comment-reply-link" href="#replay-comment-section" onclick="prepareReplay('<?php echo $commentId; ?>');">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment__text">
                                            <p><?php echo $comment;?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php

                            }
                            else { // Else list the replies and it's metadata
                                ?>
                                <!-- Have replies inline -->
                                <li class="thread-alt depth-1 comment">
                                    <div class="comment__content">
                                        <div class="comment__info">
                                            <input type="hidden" id="comment-author-<?php echo $commentId; ?>" value="<?php echo $commentAuthor; ?>">
                                            <div class="comment__author"><?php echo $commentAuthor; ?></div>
                                            <div class="comment__meta">
                                                <div class="comment__time"><?php echo date("M j, Y", strtotime($commentDate));?></div>
                                                <div class="comment__reply">
                                                    <a class="comment-reply-link" href="#replay-comment-section" onclick="prepareReplay('<?php echo $commentId; ?>');">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment__text">
                                        <p><?php echo $comment;?></p>
                                        </div>
                                    </div>
                                <?php

                                while ($rowCommentChildren = mysqli_fetch_assoc($queryCheckCommentChildren)) {
                                    $commentIdChild = $rowCommentChildren['n_blog_comment_id'];
                                    $commentAuthorChild = $rowCommentChildren['v_comment_author'];
                                    $commentChild = $rowCommentChildren['v_comment'];
                                    $commentDateChild = $rowCommentChildren['d_date_created'];

                                    echo "<ul class='children'>
                                                <li class='depth-2 comment'>
                                                    <div class='comment__content'>
                                                        <div class='comment__info'>
                                                            <div class='comment__author'>".$commentAuthorChild."</div>
                                            
                                                            <div class='comment__meta'>
                                                                <div class='comment__time'>".date("M j, Y", strtotime($commentDateChild))."</div>
                                                            </div>
                                                        </div>
                                                        <div class='comment__text'>
                                                            <p>$commentChild</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>";
                                }
                            }
                        }
                        ?>

                        </li>
                    </ol>
                    <!-- END commentlist -->

                </div> <!-- end col-full -->
            </div> <!-- end comments -->


            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="column">

                    <h3>
                    Add Comment 
                    <span>Your email address will not be published.</span>
                    </h3>

                    <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                        <fieldset>

                            <div class="form-field">
                                <input name="cName" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
                            </div>

                            <div class="form-field">
                                <input name="cEmail" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
                            </div>

                            <div class="form-field">
                                <input name="cWebsite" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website" value="" type="text">
                            </div>

                            <div class="message form-field">
                                <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
                            </div>

                            <br>
                            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">

                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->


    </section> <!-- end s-content -->

    <?php include "footer.php";?>

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>