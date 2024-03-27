<?php
    require "dbh.php";
    session_start();

    if (isset($_POST['submit-edit-blog'])) {

        $blogId = $_POST['blog-id'];
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
        $sqlCheckBlogTitle = "SELECT v_post_title FROM blog_post WHERE v_post_title = '$title' AND v_post_title != '$title' AND f_post_status != '2'";
        $queryCheckBlogTitle = mysqli_query($conn, $sqlCheckBlogTitle);

        $sqlCheckBlogPath= "SELECT v_post_path FROM blog_post WHERE v_post_path = '$blogPath' AND v_post_path != '$blogPath' AND f_post_status != '2'";
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

        // Getting the image input field and the image name
        $mainImgUrl = uploadImage($_FILES["main-blog-image"]["name"], "main-blog-image", "main", "v_main_image_url");
        $altImgUrl = uploadImage($_FILES["alt-blog-image"]["name"], "alt-blog-image", "alt", "v_alt_image_url");

        // Check if image was updated
        if ($mainImgUrl == "noupdate") {
            if ($altImgUrl == "noupdate") { // If main image was not changed and alt image also not change
                $sqlUpdateBlog = "UPDATE blog_post SET n_category_id = '$blogCategoryId', v_post_title = '$title', v_post_meta_title = '$metaTitle',
                v_post_path = '$blogPath', v_post_summary = '$blogSummary', v_post_content = '$blogContent',
                n_home_page_placement = '$homePagePlacement', d_date_updated = '$date',
                d_time_updated = '$time' WHERE n_blog_post_id = '$blogId'";
            }
            else { // If main image was not changed but alt image was changed
                $sqlUpdateBlog = "UPDATE blog_post SET n_category_id = '$blogCategoryId', v_post_title = '$title', v_post_meta_title = '$metaTitle',
                v_post_path = '$blogPath', v_post_summary = '$blogSummary', v_post_content = '$blogContent',
                v_alt_image_url = '$altImgUrl', n_home_page_placement = '$homePagePlacement', d_date_updated = '$date',
                d_time_updated = '$time' WHERE n_blog_post_id = '$blogId'";
            }
        }
        else if ($altImgUrl == "noupdate") {
            if ($mainImgUrl != "noupdate") {
                $sqlUpdateBlog = "UPDATE blog_post SET n_category_id = '$blogCategoryId', v_post_title = '$title', v_post_meta_title = '$metaTitle',
                v_post_path = '$blogPath', v_post_summary = '$blogSummary', v_post_content = '$blogContent', v_main_image_url = '$mainImgUrl',
                n_home_page_placement = '$homePagePlacement', d_date_updated = '$date',
                d_time_updated = '$time' WHERE n_blog_post_id = '$blogId'";
            }
        }
        else {
            $sqlUpdateBlog = "UPDATE blog_post SET n_category_id = '$blogCategoryId', v_post_title = '$title', v_post_meta_title = '$metaTitle',
            v_post_path = '$blogPath', v_post_summary = '$blogSummary', v_post_content = '$blogContent', v_main_image_url = '$mainImgUrl',
            v_alt_image_url = '$altImgUrl', n_home_page_placement = '$homePagePlacement', d_date_updated = '$date',
            d_time_updated = '$time' WHERE n_blog_post_id = '$blogId'";
        }

        if (mysqli_query($conn, $sqlUpdateBlog)) {
            formSuccess();
        } else {
            formError("sqlerror");
        }

    } else {
        header("Location: ../index.php");
        exit();
    }

    function formSuccess() {
        require "dbh.php";
        mysqli_close($conn);

        // Deleted sessions variable once our blog is added successfully
        unset($_SESSION['editBlogId']);
        unset($_SESSION['editTitle']);
        unset($_SESSION['editMetaTitle']);
        unset($_SESSION['editCategoryId']);
        unset($_SESSION['editSummary']);
        unset($_SESSION['editContent']);
        unset($_SESSION['editPath']);
        unset($_SESSION['editTags']);
        unset($_SESSION['editHomePagePlacement']);

        header("Location: ../blogs.php?updateblog=success");
        exit();
    }

    function formError($errorCode) {

        require "dbh.php";

        // Storing is session variables for autocomplete when error occurs
        $_SESSION['editTitle'] = $_POST['blog-title'];
        $_SESSION['editMetaTitle'] = $_POST['blog-meta-title'];
        $_SESSION['editCategoryId'] = $_POST['blog-category'];
        $_SESSION['editSummary'] = $_POST['blog-summary'];
        $_SESSION['editContent'] = $_POST['blog-content'];
        $_SESSION['editTags'] = $_POST['blog-tags'];
        $_SESSION['editPath'] = $_POST['blog-path'];
        $_SESSION['editHomePagePlacement'] = $_POST['blog-home-page-placement'];

        mysqli_close($conn);
        header("Location: ../edit-blog.php?updateblog=".$errorCode);
        exit();
    }

    function uploadImage($img, $imgName, $imgType, $imgDbColumn) {

        require "dbh.php";

        $imgUrl = "";
        $validExt = array("jpg", "png", "jpeg", "bmp", "gif");

        // If there is not image attached, they we gonna say empty image
        if ($img == "") {
            return "noupdate";
        } else {
            if ($_FILES[$imgName]["size"] <= 0) {
                formError($imgType."imageerror");
            } else { // Imge is valid
                $ext = strtolower(end(explode(".", $img))); // Get the extension of the image
                if (!in_array($ext, $validExt)) {
                    formError("invalidtype".$imgType."image");
                }

                // delete old image
                $blogId = $_POST['blog-id'];

                $sqlGetOldImage = "SELECT ".$imgDbColumn." FROM blog_post WHERE n_blog_post_id = '$blogId'";
                $queryGetOldImage = mysqli_query($conn, $sqlGetOldImage);

                if ($rowGetOldImage = mysqli_fetch_assoc($queryGetOldImage)) {
                    $oldImageURL = $rowGetOldImage[$imgDbColumn]; // Passing the column name
                }

                // If there is an image in the folder
                if (!empty($oldImageURL)) {
                    $oldImageURLArray = explode("/", $oldImageURL);
                    $oldImageName = end($oldImageURLArray); // Get the image name
                    $oldImagePath = "../images/blog-images/".$oldImageName;
                    unlink($oldImagePath); // Delete the file
                }
    
                $folder = "../images/blog-images/"; // Folder where all the images will be saved
                $imgNewName = rand(1000, 990000).'_'.time().'.'.$ext;
                $imgPath = $folder.$imgNewName;
    
                if (move_uploaded_file($_FILES[$imgName]['tmp_name'], $imgPath)) {
                    $imgUrl = "http://localhost/blog/admin/images/blog-images/".$imgNewName;
                } else {
                    formError("erroruploading".$imgType."image");
                }
            }
            return $imgUrl;
        }
    }

?>