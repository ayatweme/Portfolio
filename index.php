<?php include('includes/connect.php'); 

$rowMeta = $database->get_info('user_meta_tags', $_SESSION['user_id']);
$rowHeader = $database->get_info('header', $_SESSION['user_id']);
$rowAbout = $database->get_info('about', $_SESSION['user_id']);
$rowEducation=$database->getTableList('education');
$rowExperience=$database->getTableList('experience');
$rowProject=$database->getTableList('projects');
$rowFooter=$database->get_info('footer', $_SESSION['user_id']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aya - Portfolio</title>
    <meta name="author" content="<?php echo $rowMeta['author'] ?>">
    <meta name="profession" content="<?php echo $rowMeta['profession'] ?>">
    <meta name="twitter" content="<?php echo $rowMeta['twitter'] ?>">
    <meta name="linkedin" content="<?php echo $rowMeta['linkedin'] ?>">

    <meta name="email" content="<?php echo $rowMeta['email'] ?>">
    <meta name="description" content="<?php echo $rowMeta['description'] ?>">
    <meta name="tags" content="<?php echo $rowMeta['tags'] ?>">
    <meta name="keywords" content="<?php echo $rowMeta['keywords'] ?>">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body class="theme-a">
    <!-- Preloader -->
    <div class="preloader">
        <h1 class="color"><?php echo $rowMeta['author'] ?></h1>
    </div>
    <!-- Navbar -->
    <nav>
        <div class="logo">
            <img src="<?php echo "admin-panel/img/".$rowFooter['logo']; ?>" class="logo-img" alt="logo">

        </div>
        <ul class="nav-links">
            <li><a href="#objective">Objective</a></li>
            <li><a href="#qualification">Qualification</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><button id="themeToggleBtn" class="download-button"> Theme</button></li>

        </ul>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>

    <!-- Main Content Sections -->
    <section class="section theme-a " id="header">
        <div class="hero-banner">
            <div class="hero-banner-text">
                <div class="text-container">
                    <h1>
                        Hi there!

                    </h1>
                    <span class="color" id="text">I'm <?php echo $rowHeader['name'];?></span>
                </div><br>

                <p> <?php echo $rowHeader['summary'];?> </p><br>
                <h2><?php echo $rowHeader['profession'];?></h2><br>

                <br><br>
                <div class="button-container">
                    <a href="<?php echo "admin-panel/img/".$rowHeader['cv'];?>" target="_blank"
                        class="download-button">Download CV</a>
                </div>

            </div>
            <div class="hero-banner-image">
                <img src="<?php echo "admin-panel/img/".$rowHeader['photo'];?>" alt="my-Image"
                    class="img-radius theme-a">
            </div>
        </div>
    </section>
    <section id="objective" class="section theme-a ">
        <div class="container">
            <h1 class="section-title">About Me</h1>
            <div class="card left-card">
                <img src="aya.JPG" alt="Your Photo">
            </div>
            <div class="card right-card">
                <div class="text">
                    <h3>Hi , I'm <?php echo $rowHeader['name'];?>, Based in Jordan </h3><br>
                    <p><?php echo $rowAbout['summary'];?></p>

                    <br>
                    <?php 
                     $i=1;
                     $rowSkills=$database->get_SpecificList('skills','related_id',$rowHeader['id']);
                     foreach($rowSkills as $value){
                    ?>
                    <a href="#" class="hashtag-button theme-a"><?php echo $value->name; ?></a>
                    <?php } ?>
                    <!-- <a href="#" class="hashtag-button theme-a">PHP</a>
                    <a href="#" class="hashtag-button theme-a">JavaScript</a>
                    <a href="#" class="hashtag-button theme-a">HTML</a>
                    <a href="#" class="hashtag-button theme-a">CSS</a>
                    <a href="#" class="hashtag-button theme-a">Bootstrap</a>
                    <a href="#" class="hashtag-button theme-a">jQuery</a>
                    <a href="#" class="hashtag-button theme-a">MySQL</a>
                    <a href="#" class="hashtag-button theme-a">Wordpress</a> -->
                </div>
            </div>
        </div>
    </section>
    <section id="qualification" class="section theme-a ">
        <div class="container">
            <h2 class="section-title">Qualification</h2>
            <br>
            <div class="card left-card-qualification">
                <h3>Education</h3>
                <ul class="timeline">
                    <?php 
                    $i=1;
                    foreach($rowEducation as $valueEducation){
                    ?>
                    <li>
                        <h4><?php echo $valueEducation->institution; ?></h4>
                        <p><?php echo $valueEducation->study_field; ?>, <?php echo $valueEducation->graduation_year; ?>
                        </p>
                    </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="card right-card-qualification">
                <h3>Experience</h3>
                <ul class="timeline">
                    <?php 
                    $i=1;
                    foreach($rowExperience as $valueExperience){
                    ?>
                    <li>
                        <h4><?php echo $valueExperience->employer; ?></h4>
                        <p><?php echo $valueExperience->job; ?>, <?php if( $valueExperience->end_date == ''){
                                    echo 'Present';
                                }else{
                                    echo substr($valueExperience->end_date,0,4);
                                }; ?></p>
                    </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </section>


    <section id="projects" class="section theme-a ">
        <div class="container">
            <h2 class="section-title">Projects <br><span class="fs-14">All of these projects related to the
                    company</span></h2>
                    <?php 
                    $i=1;
                    foreach($rowProject as $valueProject){
                    ?>
            <div class="project-card">
                <div class="card">
                    <img src="<?php echo "admin-panel/img/".$valueProject->image; ?>" class="full-width-img" alt="project image" />

                    <h3><?php echo $valueProject->name; ?></h3>
                    <p><?php echo $valueProject->description; ?></p>
                </div>
            </div>
            <?php } ?>
            
           
            
        </div>
    </section>

    <section id="contact" class="section theme-a ">
        <div class="container">
            <h2 class="section-title">Contact Me</h2>

            <div class="contact-form">
                <form id="contact-form" action="process-form.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="download-button">Submit</button>

                </form>
            </div>
            <div class="contact-info">
                <div class="contact-card">
                    <h3>Phone:</h3>
                    <p><a href="tel:<?php echo $rowFooter['phone']; ?>"><?php echo $rowFooter['phone']; ?></a></p>
                </div>
                <div class="contact-card">
                    <h3>Email:</h3>
                    <p><a href="mailto:<?php echo $rowFooter['email']; ?>"><?php echo $rowFooter['email']; ?></a></p>
                </div>
            </div>

        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section left-section">
                <div class="logo">
                    <img src="<?php echo "admin-panel/img/".$rowFooter['logo']; ?>" class="logo-img-footer" alt="Logo" />
                </div>
            </div>
            <div class="footer-section middle-section">
                <p class="copyright">© 2023 <?php echo $rowMeta['author']; ?>. All Rights Reserved.</p>

            </div>
            <div class="footer-section right-section">

                <ul class="social-media">
                    <!-- <li><strong>Follow Me:</strong></li> -->
                    <li>
                        <a href="<?php echo $rowFooter['gitHub']; ?>" target="_blank">
                            <i class="fab fa-github fa-2x"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $rowMeta['linkedin']; ?>" target="_blank">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $rowMeta['twitter']; ?>" target="_blank">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </footer>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // Example jQuery code to toggle between themes
        $(document).ready(function () {
            // Function to toggle themes
            function toggleTheme() {
                // Toggle between theme-a and theme-b
                $('body').toggleClass('theme-a theme-b');

                $('.section').toggleClass('theme-a theme-b');
                $('.hashtag-button').toggleClass('theme-a theme-b');
                $('.img-radius').toggleClass('theme-a theme-b');

            }

            // Example: Toggle theme on button click
            $('#themeToggleBtn').click(function () {
                toggleTheme();
            });
        });
    </script>
</body>

</html>