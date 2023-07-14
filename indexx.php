<?php

$conn = mysqli_connect('localhost','root','','formuser') or die('connection failed');

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
      echo '<script>alert("Thank you for contacting us!! we will get you back soon!!!!!");</script>';
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complete Responsive Personal Portfolio Website Design</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

   <!-- aos css link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- header section starts  -->

<header class="header">

   <div id="menu-btn" class="fas fa-bars"></div>

   <a href="#home" class="logo">Portfolio</a>

   <nav class="navbar">
      <a href="#home" class="active">home</a>
      <a href="#about">about</a>
      <a href="#services">services</a>
      <a href="#portfolio">portfolio</a>
      <a href="#contact">contact</a>
      <a href="./session/register_form.php">register</a>
   </nav>

   <div class="follow">
      <a href="https://www.facebook.com/bishal.timsina.2002/" class="fab fa-facebook-f"></a>
      <a href="https://twitter.com/BishalT232" class="fab fa-twitter"></a>
      <a href="https://www.instagram.com/a_pocalyps_e/" class="fab fa-instagram"></a>
      <a href="https://www.linkedin.com/in/bishal-timsina-aa381b263/" class="fab fa-linkedin"></a>
      <a href="https://github.com/bishal78441" class="fab fa-github"></a>
   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="image" data-aos="fade-right">
      <img src="images/profile.jpg" alt="">
   </div>

   <div class="content">
      <h3 data-aos="fade-up">hi, i am <span>Mr. Bishal Timsina</span> </h3>
      <span data-aos="fade-up">web designer & developer</span>
      <p data-aos="fade-up">
        Welcome to my website! I'm deeply passionate about cybersecurity and ethical hacking. With a keen eye for detail and a drive for continuous learning, I strive to apply my skills in practical IT settings. I am dedicated to expanding my knowledge, collaborating with professionals, and working towards the betterment of organizations and humanity. Let's make the digital world a safer place together.</p>
      <a data-aos="fade-up" href="#about" class="btn">about me</a>
   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <h1 class="heading" data-aos="fade-up"> <span>biography</span> </h1>

   <div class="biography">

      <p data-aos="fade-up"> I am an ardent advocate of cybersecurity and ethical hacking, driven by an unwavering passion for this field. With a meticulous attention to detail, I am constantly honing my skills and staying updated with the ever-evolving landscape of technology. My unwavering commitment to continuous learning allows me to navigate this dynamic industry effectively. I am dedicated to applying my expertise in practical IT technologies, leveraging my extensive experience for the betterment of organizations and, ultimately, humanity as a whole. By seeking opportunities to collaborate with like-minded professionals, I aim to further expand my knowledge and contribute to the advancement of cybersecurity.</p>

      <div class="bio">
         <h3 data-aos="zoom-in"> <span>name : </span> Bishal Timsina </h3>
         <h3 data-aos="zoom-in"> <span>email : </span> timsinabishal232@gmail.com </h3>
         <h3 data-aos="zoom-in"> <span>address : </span> Dillibazar, Kathmandu </h3>
         <h3 data-aos="zoom-in"> <span>phone : </span> +977 9806053220 </h3>
         <h3 data-aos="zoom-in"> <span>age : </span> 20 years </h3>
         <h3 data-aos="zoom-in"> <span>experience : </span> 2+ years </h3>
      </div>

      <a href="#" class="btn" data-aos="fade-up">download CV</a>

   </div>
   
   <div class="skills" data-aos="fade-up">

      <h1 class="heading"> <span>skills</span> </h1>

      <div class="progress">
         <div class="bar" data-aos="fade-left"> <h3><span>HTML</span> <span>95%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>CSS</span> <span>80%</span></h3> </div>
         <div class="bar" data-aos="fade-left"> <h3><span>JavaScript</span> <span>85%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>PHP</span> <span>80%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>Kali Linux</span> <span>90%</span></h3> </div>
         <div class="bar" data-aos="fade-left"> <h3><span>Network Security</span> <span>75%</span></h3> </div>
         <div class="bar" data-aos="fade-left"> <h3><span>Vulnerability Assessment</span> <span>80%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>Security Tools</span> <span>95%</span></h3> </div>
         <div class="bar" data-aos="fade-left"> <h3><span>Scripting (Python, Bash)</span> <span>80%</span></h3> </div>
      </div>
      </div>

   </div>

   <div class="edu-exp">

      <h1 class="heading" data-aos="fade-up"> <span>education & experience</span> </h1>

      <div class="row">

         <div class="box-container">

            <h3 class="title" data-aos="fade-right">education</h3>

            <div class="box" data-aos="fade-right">
               <span>( 2019 - 2020 )</span>
               <h3>schooling</h3>
               <p>Mechi English Boarding School</p>
               <p>GPA: 3.95</p>
            </div>

            <div class="box" data-aos="fade-right">
               <span>( 2020 - 2022 )</span>
               <h3>High School</h3>
               <p>Southwestern State College</p>
               <p>Stream: Science</p>
               <p>GPA: 3.53</p>
            </div>

            <div class="box" data-aos="fade-right">
               <span>( 2022 - Ongoing )</span>
               <h3>Bachlore</h3>
               <p>BSC (hons.) Ethical Hacking and CyberSecurity</p>
               <p>Softwarica College of IT and E-commerce</p>
            </div>


         </div>

         <div class="box-container">

            <h3 class="title" data-aos="fade-left">experience</h3>

            <div class="box" data-aos="fade-left">
               <span>( 2076 BS)</span>
               <h3>Teaching staff</h3>
               <p>Vidhya Bardan School</p>
               <p> Primary level</p>
            </div>

            <div class="box" data-aos="fade-left">
               <span>( 2077)</span>
               <h3>Teaching staff</h3>
               <p>Mechi English Boarding School</p>
               <p> Secondary Level</p>
            </div>

            <div class="box" data-aos="fade-left">
               <span>( 2078 )</span>
               <h3>Taxpayer Service Officer</h3>
               <p>Front Desk Agent</p>
            </div>

         </div>

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading" data-aos="fade-up"> <span>services</span> </h1>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-code"></i>
         <h3>web development</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-paint-brush"></i>
         <h3>graphic design</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fab fa-bootstrap"></i>
         <h3>bootstrap</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-chart-line"></i>
         <h3>seo marketing</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-bullhorn"></i>
         <h3>digital marketing</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fab fa-wordpress"></i>
         <h3>wordpress</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, placeat veritatis accusantium nostrum rem ipsa.</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

   <h1 class="heading" data-aos="fade-up"> <span>portfolio</span> </h1>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
         <img src="images/img-1.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-2.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-3.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-4.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-5.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-6.jpg" alt="">
         <h3>web development</h3>
         <span>( 2020 - 2022 )</span>
      </div>

   </div>

</section>

<!-- portfolio section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h1 class="heading" data-aos="fade-up"> <span>contact me</span> </h1>

   <form action="" method="post">
      <div class="flex">
         <input data-aos="fade-right" type="text" name="name" placeholder="enter your name" class="box" required>
         <input data-aos="fade-left" type="email" name="email" placeholder="enter your email" class="box" required>
      </div>
      <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box" required>
      <textarea data-aos="fade-up" name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
      <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btn">
   </form>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-phone"></i>
         <h3>phone</h3>
         <p>+977-9806053220</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-envelope"></i>
         <h3>email</h3>
         <p>timsinabishal232@gmail.com</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-map-marker-alt"></i>
         <h3>address</h3>
         <p>Dillibazar, Kathmandu - 44605</p>
      </div>

   </div>
   

</section>

<!-- contact section ends -->

<div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>Mr. Bishal Timsina</span> </div>












<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- aos js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>
   
</body>
</html>