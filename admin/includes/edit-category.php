<?php
    require "dbh.php";
    // If edit button is clicked
    if (isset($_POST['edit-category-button'])) {
        $id = $_POST['category-id'];
        $name = $_POST['edit-category-name'];
        $metaTitle = $_POST['edit-category-meta-title'];
        $categoryPath = $_POST['edit-category-path'];
        // Using id to identify the row tha we need update
        $sqlEditCategory = "UPDATE blog_category SET v_category_title = '$name', v_category_meta_title = '$metaTitle',
        v_category_path  = '$categoryPath' WHERE n_category_id = '$id'";

        if(mysqli_query($conn, $sqlEditCategory)) {
            mysqli_close($conn);
            header('Location: ../blog-category.php?editcategory=success');
            exit();
        } else {
            header('Location: ../blog-category.php?editcategory=error');
            exit();
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
?>