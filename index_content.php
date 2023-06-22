 <!-- main content starts -->
 <!-- clearfix  -->
 <main>
     <script src="JS/slides.js"></script>


     <!-- slideshow starts -->
     <section class="slides">
         <img name="slideimg">
     </section>
     <!-- slideshow ends -->

     <!-- about section starts -->
     <section class="about-us" id="about-us">
         <div class="coverimage">
             <img src="media/foodpic.jpg" alt="coverimage">
         </div>
         <div class="aboutdata">
             <h3 class="sectiontitle">About Us</h3>
             <h4 class="sectionsubtitle">Tradition since 1953</h4>
             <br>
             <p>
                 With a legacy of more than 60 years and being associated with the royal family since the inception
                 of the Haveli back in 1954, We have maintained the authenticity of the cuisines. Cuisine Haveli is
                 just a class apart!!
                 The stunning Durbar Hall, Jade Room and massive 101-seater dining hall bedecked with Belgian
                 chandeliers, and assorted gardens and terraces lend royal decadence to celebratory events and
                 elegance to business meetings. Enjoy afternoon tea on the Jade Terrace, like the Nizam did many
                 years ago.
             </p>
         </div>
     </section>
     <!-- about section ends -->
     <!-- gallery section starts -->
     <section class="gallery" id="gallery">
         <h3 class="sectiontitle">Gallery</h3>

         <div class="galleryitem">
             <a href="media/desserts.jpg" target="_blank"><img src="media/desserts.jpg"></a>
             <div class="desc"></div>
         </div>

         <div class="galleryitem">
             <a href="slides/tf.jpg" target="_blank"><img src="slides/tf.jpg"></a>
             <div class="desc"></div>
         </div>

         <div class="galleryitem">
             <a href="slides/tf1.jpg" target="_blank"><img src="slides/tf1.jpg"></a>
             <div class="desc"></div>
         </div>

         <div class="galleryitem">
             <a href="media/biriyani.jpg" target="_blank"><img src="media/biryani.jpg"></a>
             <div class="desc"></div>
         </div>

         <div class="galleryitem">
             <a href="media/chickencheesefries.jpg" target="_blank"><img src="media/chickencheesefries.jpg"></a>
             <div class="desc"></div>
         </div>



         <div class="clearfix"></div>
     </section>
     <!-- gallery section ends -->
     <section class="contact" id="contact">
         <h3 class="sectiontitle">Contact Us</h3>

         <ul class="contactslist">
             <img src="iconset/email.png" alt="" width="18px" height="18px">
             <li> <a href="mailto:vd@vishaldhatrika.me">E-Mail: vd@vishaldhatrika.me
                 </a></li><br>
             <img src="iconset/phone.png" alt="" width="18px" height="18px">
             <li><a href="tel:+1 (123) 456-7890">Mobile:
                     +1 (123) 456-7890</a></li><br>
             <img src="iconset/pin.png" alt="" width="18px" height="18px">
             <li>
                 <a href="https://goo.gl/maps/K4NzgoUmhoa2CF6TA">
                     <address class="addrline">MLR Institute of Technology, Dundigal Police Station Road,
                         Hyderabad – 500 043, Telangana, India.</address>
                 </a>
             </li><br>
         </ul>
         <style>
             .map {
                 width: 70vw;
             }
         </style>
         <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4640.050703613447!2d78.43922231530043!3d17.595235901407435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb8efb41b8ffd1%3A0x8946847af8ab7a7e!2sMLR%20Institute%20of%20Technology%20%7C%20Best%20engineering%20college%20in%20Hyderabad%20and%20Telangana!5e1!3m2!1sen!2sin!4v1629920939662!5m2!1sen!2sin" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
     </section>
 </main>
 <!-- main content ends -->

 <?php include('partials-front/footer.php'); ?>