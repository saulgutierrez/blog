<?php
    require "includes/dbh.php";
    session_start();

    if (isset($_REQUEST['blogid'])) {
        $blogId = $_REQUEST['blogid'];

        if (empty($blogId)) {
            header("Location: blogs.php");
            exit();
        }

        // If blogId isn't empty
        $_SESSION['editBlogId'] = $_REQUEST['blogid'];

        $sqlGetBlogDetails = "SELECT * FROM blog_post WHERE n_blog_post_id = '$blogId'";
        $queryGetBlogDetails = mysqli_query($conn, $sqlGetBlogDetails);

        if ($rowGetBlogDetails = mysqli_fetch_assoc($queryGetBlogDetails)) {
            $_SESSION['editTitle'] = $rowGetBlogDetails['v_post_title'];
            $_SESSION['editMetaTitle'] = $rowGetBlogDetails['v_post_meta_title'];
            $_SESSION['editCategoryId'] = $rowGetBlogDetails['n_category_id'];
            $_SESSION['editSummary'] = $rowGetBlogDetails['v_post_summary'];
            $_SESSION['editContent'] = $rowGetBlogDetails['v_post_content'];
            $_SESSION['editPath'] = $rowGetBlogDetails['v_post_path'];
            $_SESSION['editHomePagePlacement'] = $rowGetBlogDetails['n_home_page_placement'];
        } else {
            header('Location: blogs.php');
            exit();
        }

        $sqlGetBlogTags = "SELECT * FROM blog_tags WHERE n_blog_post_id = '$blogId'";
        $queryGetBlogTags = mysqli_query($conn, $sqlGetBlogTags);
        if ($rowGetBlogTags = mysqli_fetch_assoc($queryGetBlogTags)) {
            $_SESSION['editTags'] = $rowGetBlogTags['v_tag'];
        }

    } else if (isset($_SESSION['editBlogId'])) {

    } else {
        header("Location: blogs.php");
        exit();
    }

    $sqlGetImages = "SELECT * FROM blog_post WHERE n_blog_post_id = '".$_SESSION['editBlogId']."'";
    $queryGetImages = mysqli_query($conn, $sqlGetImages);
    if ($rowGetImages = mysqli_fetch_assoc($queryGetImages)) {
        $mainImgUrl = $rowGetImages['v_main_image_url'];
        $altImgUrl = $rowGetImages['v_alt_image_url'];
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- Summernote -->
   <link href='summernote/summernote.min.css' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">

        <?php include "header.php"; include "sidebar.php";?>

        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Edit Blog Post
                        </h1>
                    </div>
                </div>

                <?php

                if (isset($_REQUEST['updateblog'])) {
                    if($_REQUEST['updateblog'] == "emptytitle") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please add a blog title.</div>";
                    }
                    else if($_REQUEST['updateblog'] == "emptycategory") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please select a blog category.</div>";
                    }
                    else if ($_REQUEST['updateblog'] == "emptysummary") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please enter a blog summary.</div>";
                    }
                    else if ($_REQUEST['updateblog'] == "emptycontent") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please add blog content.</div>";
                    } 
                    else if ($_REQUEST['updateblog'] == "emptytags") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please add some blog tags.</div>";
                    }
                    else if ($_REQUEST['updateblog'] == "emptypath") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please add a blog path.</div>";
                    }
                    else if ($_REQUEST['updateblog' == "sqlerror"]) {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please try again.</div>";
                    }
                    else if ($_REQUEST['updateblog' == "pathcontainsspaces"]) {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please do not add any spaces in the blog path.</div>";
                    }
                    else if ($_REQUEST['updateblog'] == "emptymainimage") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please upload a main image.</div>";
                    }
                    else if ($_REQUEST['updateblog'] == "emptyaltimage") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please upload an alternate image</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "mainimageerror") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please upload another main image</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "altimageerror") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Please upload another alternate image</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "invalidtypemainimage") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Main image -> Upload only jpg, jpeg, png, gif, bmp images.</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "invalidtypealtimage") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Alt image -> Upload only jpg, jpeg, png, gif, bmp images.</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "erroruploadedmainimage") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Main image -> There was an error while uploading. Please try again later.</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "erroruploadedaltimage") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>Alt image -> There was an error while uploading. Please try again later.</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "titlebeingused") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>The title is being used in another blog. Try picking a different title.</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "pathbeingused") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>The blog path is being used in another blog. Try picking a different bloh path.</div>";
                    }
                    else if ($_REQUEST['updateblog'] = "homepageplacementerror") {
                        echo "<div class='alert alert-danger'><strong>Error! </strong>An unexpected error occurred while try to set the homepage placement. Please try again</div>";
                    }
                }

                ?>

              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit <?php echo $_SESSION['editTitle']; ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Submit images and files-->
                                    <form role="form" method="POST" action="includes/update-blog.php" enctype="multipart/form-data">
                                        <!-- We use id as a search key, to find the field we gonna want to change int to update-blog file -->
                                        <!-- And send it as a hidden value -->
                                        <input type="hidden" name="blog-id" value="<?php echo $blogId; ?>">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <!-- Prefilled fields -->
                                            <input class="form-control" name="blog-title" value="<?php echo $_SESSION['editTitle'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" name="blog-meta-title" value="<?php echo $_SESSION['editMetaTitle'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Category</label>
                                            <select class="form-control" name="blog-category">
                                                <option value="">Select a category</option>
                                                <?php
                                                    $sqlCategories = "SELECT * FROM blog_category";
                                                    $queryCategories = mysqli_query($conn, $sqlCategories);
                                                    // Fetching all blog categories from database
                                                    while($rowCategories = mysqli_fetch_assoc($queryCategories)) {
                                                        $cId = $rowCategories['n_category_id'];
                                                        $cName = $rowCategories['v_category_title'];
                                                        
                                                        // Put the previous category default selected
                                                        if ($_SESSION['editCategoryId'] == $cId) {
                                                            echo "<option value='".$cId."' selected=''>".$cName."</option>";        
                                                        } else {
                                                            echo "<option value='".$cId."'>".$cName."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Update Main Image</label>
                                            <input type="file" name="main-blog-image" id="main-blog-image">
                                            <?php
                                                if (!empty($mainImgUrl)) {
                                                    // Showing a popup when stores the last session image saved
                                                    echo "<p style='font-size:inherit;'><a href='' data-toggle='modal' data-target='#main-image' class='popup-button' style='margin-top:10px;'>View Existing Image</a></p>";
                                                }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Update Alternate Image</label>
                                            <input type="file" name="alt-blog-image" id="alt-blog-image">
                                            <?php
                                                if (!empty($mainImgUrl)) {
                                                    // Showing a popup when stores the last session image saved
                                                    echo "<p style='font-size:inherit;'><a href='' data-toggle='modal' data-target='#alt-image' class='popup-button' style='margin-top:10px;'>View Existing Image</a></p>";
                                                }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Summary</label>
                                            <textarea class="form-control" rows="3" name="blog-summary"><?php echo $_SESSION['editSummary'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Content</label>
                                            <textarea class="form-control" rows="3" name="blog-content" id="summernote"><?php echo $_SESSION['editContent'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Tags (separated by comma)</label>
                                            <input class="form-control" name="blog-tags" value="<?php echo $_SESSION['editTags'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Blog Path</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">www.myblog.com</span>
                                                <input type="text" class="form-control" name="blog-path" value="<?php echo $_SESSION['editPath'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Home Page Placement</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline1" value="1" <?php if (isset($_SESSION['editHomePagePlacement'])) { if($_SESSION['editHomePagePlacement'] == 1) {echo "checked=''";} }?> >1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline2" value="2" <?php if (isset($_SESSION['editHomePagePlacement'])) { if($_SESSION['editHomePagePlacement'] == 2) {echo "checked=''";} }?> >2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline3" value="3" <?php if (isset($_SESSION['editHomePagePlacement'])) { if($_SESSION['editHomePagePlacement'] == 3) {echo "checked=''";} }?> >3
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="submit-edit-blog">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

                            <?php
                                if (!empty($mainImgUrl)) {
                            ?>

                            <div class="modal fade" id="main-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Main Image</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $mainImgUrl; ?>" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            ?>

                            <?php
                                if (!empty($altImgUrl)) {
                            ?>

                            <div class="modal fade" id="alt-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Alt Image</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $altImgUrl; ?>" style="max-width: 100%; height: auto;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            ?>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<?php include "footer.php";?>
			</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <!-- Summernote -->
    <script src="summernote/summernote.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null,
            focus: false
        });
    });       
    </script>
</body>
</html>
