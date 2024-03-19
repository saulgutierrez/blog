<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>
        <?php 
            require "admin/includes/dbh.php";
            $query = "SELECT * FROM blog_post";
            $result = mysqli_query($conn, $query);
            echo mysqli_num_rows($result); // should get 0 as the output there aren't any rows in blog_post yet
        ?>
    </title>
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

    <?php include "header.php"; ?>

    <!-- hero
    ================================================== -->
    <section id="hero" class="s-hero">

        <div class="s-hero__slider">

            <div class="s-hero__slide">

                <div class="s-hero__slide-bg" style="background-image: url('images/slide1-bg-3000.jpg');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="cat-links">
                                <a href="#0">Lifestyle</a>
                                <a href="#0">Design</a>
                            </span>
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="#0">Jonathan Doe</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="#0">
                                Tips and Ideas to Help You Start Freelancing.
                            </a>
                        </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->

            <div class="s-hero__slide">

                <div class="s-hero__slide-bg" style="background-image: url('images/slide2-bg-3000.jpg');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="cat-links">
                                <a href="#0">Work</a>
                            </span>
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="#0">Juan Dela Cruz</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="#0">
                                Minimalism: The Art of Keeping It Simple.
                            </a>
                        </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->

            <div class="s-hero__slide"">

                <div class="s-hero__slide-bg" style="background-image: url('images/slide3-bg-3000.jpg');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="cat-links">
                                <a href="#0">Health</a>
                                <a href="#0">Lifestyle</a>
                            </span>
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="#0">Jane Doe</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="#0">
                                10 Reasons Why Being in Nature Is Good For You.
                            </a>
                        </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->

        </div> <!-- end s-hero__slider -->

        <div class="s-hero__social hide-on-mobile-small">
            <p>Follow</p>
            <span></span>
            <ul class="s-hero__social-icons">
                <li><a href="https://facebook.com"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://instagram.com"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://youtube.com"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div> <!-- end s-hero__social -->

        <div class="nav-arrows s-hero__nav-arrows">
            <button class="s-hero__arrow-prev">
                <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M1.5 7.5l4-4m-4 4l4 4m-4-4H14" stroke="currentColor"></path></svg>
            </button>
            <button class="s-hero__arrow-next">
               <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor"></path></svg>
            </button>
        </div> <!-- end s-hero__arrows -->

    </section> <!-- end s-hero -->


    <!-- content
    ================================================== -->
    <section class="s-content s-content--no-top-padding">


        <!-- masonry
        ================================================== -->
        <div class="s-bricks">

            <div class="masonry">
                <div class="bricks-wrapper h-group">

                    <div class="grid-sizer"></div>

                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/macbook-600.jpg" 
                                     srcset="images/thumbs/masonry/macbook-600.jpg 1x, images/thumbs/masonry/macbook-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="https://www.dreamhost.com/r.cgi?287326">Need Web Hosting for Your Websites?</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="https://www.dreamhost.com/r.cgi?287326">StyleShout</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="https://www.dreamhost.com/r.cgi?287326">Site Partner</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Need hosting? We would highly recommend DreamHost.
                                Enjoy 100% in-house support, guaranteed performance and uptime, 1-click installs, and a super-intuitive control panel to make managing your websites and projects easy.
                                </p>
                            </div>
                            <a class="entry__more-link" href="https://www.dreamhost.com/r.cgi?287326">Learn More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->

                    <article class="brick entry" data-aos="fade-up">
        
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/woodcraft-600.jpg" 
                                     srcset="images/thumbs/masonry/woodcraft-600.jpg 1x, images/thumbs/masonry/woodcraft-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
        
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">Just a Normal Simple Blog Post.</a></h1>
        
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Naruto Uzumaki</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Design</a> 
                                        <a href="#">Photography</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
        
                    </article> <!-- end entry -->
    
                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/tulips-600.jpg" 
                                     srcset="images/thumbs/masonry/tulips-600.jpg 1x, images/thumbs/masonry/tulips-1200.jpg 2x" alt="">
                            </a>
                        </div>  <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">10 Interesting Facts About Caffeine.</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Shikamaru Nara</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Health</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->

                    <article class="brick entry" data-aos="fade-up">
        
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/grayscale-600.jpg" 
                                     srcset="images/thumbs/masonry/grayscale-600.jpg 1x, images/thumbs/masonry/grayscale-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
        
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">5  Grayscale Coloring Techniques.</a></h1>

                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Susuke Uchiha</a>
                                        </span>
                                    </span>
                                    <span class="cat-links">
                                        <a href="#">Design</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                        
                    </article> <!-- end article -->

                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/walk-600.jpg" 
                                     srcset="images/thumbs/masonry/walk-600.jpg 1x, images/thumbs/masonry/walk-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">Using Repetition and Patterns in Photography.</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Naruto Uzumaki</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Work</a> 
                                        <a href="#">Lifestyle</a>
                                    </span>
                                </div>
                                
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->
    
                    <article class="brick entry" data-aos="fade-up">
            
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/jump-600.jpg" 
                                     srcset="images/thumbs/masonry/jump-600.jpg 1x, images/thumbs/masonry/jump-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
            
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">Create Meaningful Family Moments.</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Naruto Uzumaki</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Family</a>
                                        <a href="#">Relationship</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                            
                    </article> <!-- end article -->
    
                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/real-600.jpg" 
                                     srcset="images/thumbs/masonry/real-600.jpg 1x, images/thumbs/masonry/real-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">How We Live Is What Makes Us Real.</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Naruto Uzumaki</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Travel</a> 
                                        <a href="#">Vacation</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->
    
                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/lamp-600.jpg" 
                                     srcset="images/thumbs/masonry/lamp-600.jpg 1x, images/thumbs/masonry/lamp-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">Symmetry In Modern Design.</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Kakakshi Hatake</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Design</a> 
                                        <a href="#">Photography</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->

                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/clock-600.jpg" 
                                     srcset="images/thumbs/masonry/clock-600.jpg 1x, images/thumbs/masonry/clock-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">10 Tips for Managing Time Effectively.</a></h1>
    
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">John Doe</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Lifestyle</a>
                                        <a href="#">Work</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->

                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/beetle-600.jpg" 
                                     srcset="images/thumbs/masonry/beetle-600.jpg 1x, images/thumbs/masonry/beetle-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">Throwback To The Good Old Days.</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Sakura Haruno</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Lifestyle</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->

                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/phone-and-keyboard-600.jpg" 
                                     srcset="images/thumbs/masonry/phone-and-keyboard-600.jpg 1x, images/thumbs/masonry/phone-and-keyboard-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">3 Reasons to Keep Your Workplace Tidy.</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Sakura Haruno</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Work</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->

                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/thumbs/masonry/seashore-600.jpg" 
                                     srcset="images/thumbs/masonry/seashore-600.jpg 1x, images/thumbs/masonry/seashore-1200.jpg 2x" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="single-standard.html">What The Beach Does to Your Brain.</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#0">Naruto Uzumaki</a>
                                    </span>
                                </span>
                                    <span class="cat-links">
                                        <a href="#">Health</a> 
                                        <a href="#">Vacation</a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                                </p>
                            </div>
                            <a class="entry__more-link" href="#0">Read More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->

                </div> <!-- end brick-wrapper -->

            </div> <!-- end masonry -->

            <div class="row">
                <div class="column large-12">
                    <nav class="pgn">
                        <ul>
                            <li>
                                <span class="pgn__prev" href="#0">
                                    Prev
                                </span>
                            </li>
                            <li><a class="pgn__num" href="#0">1</a></li>
                            <li><span class="pgn__num current">2</span></li>
                            <li><a class="pgn__num" href="#0">3</a></li>
                            <li><a class="pgn__num" href="#0">4</a></li>
                            <li><a class="pgn__num" href="#0">5</a></li>
                            <li><span class="pgn__num dots">…</span></li>
                            <li><a class="pgn__num" href="#0">8</a></li>
                            <li>
                                <span class="pgn__next" href="#0">
                                    Next
                                </span>
                            </li>
                        </ul>
                    </nav> <!-- end pgn -->
                </div> <!-- end column -->
            </div> <!-- end row -->

        </div> <!-- end s-bricks -->

    </section> <!-- end s-content -->

    <?php include "footer.php";?>

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>