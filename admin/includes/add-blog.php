<?php
    require "dbh.php";

    if (isset($_POST['submit-blog'])) {
        $title = $_POST['blog-title'];
        $metaTitle = $_POST['blog-meta-title'];
        $blogCategoryId  = $_POST['blog-category'];
        $blogSummary = $_POST['blog-summary'];
        $blogContent = $_POST['blog-content'];
        $blogTags = $_POST['blog-tags'];
        $blogPath = $_POST['blog-path'];
        $homePagePlacement = $_POST['blog-home-page-placement'];

        $date = date("Y-m-d");
        $time = date("H:i:s");

        if (empty($title)) {
            formError("emptytitle");
        } else if (empty($blogCategoryId)) {
            formError("emptycategory");
        } else if (empty($blogSummary)) {
            formError("emptysummary");
        } else if (empty($blogContent)) {
            formError("emptycontent");
        } else if (empty($blogTags)) {
            formError("emptytags");
        } else if (empty($blogPath)) {
            formError("emptypath");
        }

        // Chech if blog path have any spaces
        if (strpos($blogPath, " ") !== false) {
            formError("pathcontainsspaces");
        }

        if (empty($homePagePlacement)) {
            $homePagePlacement = 0;
        }
        // Checking if there are a blog with the same title and it does not deleted
        $sqlCheckBlogTitle = "SELECT v_post_title FROM blog_post WHERE v_post_title = '$title' AND f_post_status != '2'";
        $queryCheckBlogTitle = mysqli_query($conn, $sqlCheckBlogTitle);

        $sqlCheckBlogPath= "SELECT v_post_path FROM blog_post WHERE v_post_path = '$blogPath' AND f_post_status != '2'";
        $queryCheckBlogPath = mysqli_query($conn, $sqlCheckBlogPath);

        if (mysqli_num_rows($queryCheckBlogTitle) > 0) {
            formError("titlebeingused");
        } else if (mysqli_num_rows($queryCheckBlogPath) > 0) {
            formError("pathbeingused");
        }

        if ($homePagePlacement != 0) {
            $sqlCheckBlogHomePagePlacement = "SELECT * FROM blog_post WHERE n_home_page_placement = '$homePagePlacement' AND f_post_status != '2'";
            $queryCheckBlogHomePagePlacement = mysqli_query($conn, $sqlCheckBlogHomePagePlacement);

            if (mysqli_num_rows($queryCheckBlogHomePagePlacement) > 0) {
                $sqlUpdateHomeBlogHomePagePlacement = "UPDATE blog_post SET n_home_page_placement = '0' WHERE n_home_page_placement = '$homePagePlacement' AND f_post_status != '2'";

                if (!mysqli_query($conn, $sqlUpdateHomeBlogHomePagePlacement)) {
                    formError("homepageplacementerror");
                }
            }
        }

        $sqlAddBlog = "INSERT INTO blog_post (n_category_id, v_post_title, v_post_meta_title, v_post_path, v_post_summary, v_post_content,
                        n_home_page_placement, f_post_status, d_date_created, d_time_created) VALUES ('$blogCategoryId', '$title', '$metaTitle', '$blogPath', '$blogSummary', '$blogContent', '$homePagePlacement', '1', '$date', '$time')";

        if (mysqli_query($conn, $sqlAddBlog)) {
            mysqli_close($conn);
            header("Location: ../blogs.php?addblog=success");
            exit();
        } else {
            formError("sqlerror");
        }

    } else {
        header("Location: ../index.php");
        exit();
    }

    function formError($errorCode) {
        header("Location: ../write-a-blog.php?addblog=".$errorCode);
        exit();
    }

?>