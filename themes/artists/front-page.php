<?php get_header('home'); ?>
<main class="main">
<?php 
get_template_part( 'template-parts/artists/section', 'hero' ); 
?>
<!-- ABOUT SECTION -->
<section id="about" class="contact section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>About</h2>
    <p>Color Pallette, an online haven for artists, art enthusiasts, and everyone who finds joy in the beauty of painted expressions.
                 Our website is a collaborative space created by a diverse group of painting artists who are united by a shared passion for creativity and color. 
                Here, we celebrate the myriad ways in which art can capture the essence of life, evoke emotions, and inspire change.
    </p>
  </div><!-- End Section Title -->
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="info-item d-flex flex-column justify-content-center align-items-center p-3 text-center" data-aos="fade-up" data-aos-delay="200">
          <h3>Our Vision</h3>
          <p>At Color Pallette, we envision a world where art is accessible to all, where creativity flourishes without boundaries, 
                and where every artist has the opportunity to share their unique perspective. We believe that art has the power to connect people, 
                transcend cultural barriers, and bring about a deeper understanding of the human experience.
          </p>
        </div>
      </div><!-- End Info Item -->
      <div class="col-lg-6 col-md-6">
        <div class="info-item d-flex flex-column justify-content-center align-items-center p-3 text-center" data-aos="fade-up" data-aos-delay="300">
          <h3>Our Mission</h3>
          <p>Our mission is to provide a platform where artists can showcase their work, engage with a supportive community, and grow their creative practice. 
                We aim to foster an inclusive environment that encourages artistic exploration and innovation, 
                offering resources and inspiration for both emerging and established artists.
          </p>
        </div>
      </div><!-- End Info Item -->
    </div>
  </div>
</section><!-- /Aboutn -->
<!--WHAT WE OFFER-->
<section id="we-offer" class="buy-tickets section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>What We Offer</h2>
    <p>Experience the magic of perfectly harmonized colors, meticulously crafted to enhance your art and elevate your work to new heights. 
      Let us be your trusted partner in your creative journey, offering the tools you need to make your masterpieces truly shine.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4 pricing-item p-5" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-4 d-flex align-items-center justify-content-center">
        <h3>Artist Galleries<br></h3>
      </div>
      <div class="col-lg-8 d-flex align-items-center justify-content-center">
        <p>Explore the diverse portfolios of our member artists, featuring a wide range of styles, 
              techniques, and mediums. Each gallery provides insight into the artist's journey and creative process.
        </p>
      </div>
    </div><!-- End Pricing Item -->

    <div class="row gy-4 pricing-item featured mt-4 p-5" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-8 d-flex align-items-center justify-content-center">
        <p>Join conversations with fellow artists and art lovers. Share tips, seek advice, and discuss the latest trends and challenges in the art world.</p>
      </div>
      <div class="col-lg-4 d-flex align-items-center justify-content-center">
        <h3>Community Forums</h3>
      </div>
    </div><!-- End Pricing Item -->

    <div class="row gy-4 pricing-item mt-4 p-5" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-4 d-flex align-items-center justify-content-center">
        <h3>Workshops and Tutorials</h3>
      </div>
      <div class="col-lg-8 d-flex align-items-center justify-content-center">
        <p>Enhance your skills with our curated selection of workshops and tutorials, led by experienced artists. 
              Whether you're a beginner or a seasoned painter, there's always something new to learn.
        </p>
      </div>
    </div><!-- End Pricing Item -->
    <div class="row gy-4 pricing-item featured mt-4 p-5" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-8 d-flex align-items-center justify-content-center">
        <p>Find recommendations for the best art supplies and read reviews from artists who have tested them. 
            Make informed decisions about the materials that will bring your vision to life.
        </p>
      </div>
      <div class="col-lg-4 d-flex align-items-center justify-content-center">
        <h3>Art Supplies and Reviews</h3>
      </div>
    </div><!-- End Pricing Item -->
    <div class="row gy-4 pricing-item mt-4 p-5" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-4 d-flex align-items-center justify-content-center">
        <h3>Events and Exhibitions</h3>
      </div>
      <div class="col-lg-8 d-flex align-items-center justify-content-center">
        <p>Stay up-to-date with upcoming art events, exhibitions, and competitions. Participate in community challenges and showcase your work to a broader audience.</p>
      </div>
    </div><!-- End Pricing Item -->
  </div>
</section><!-- /WHAT we offer -->
<!--ARTISTS-->

<section id="categories" class="sponsors section">
<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Featured Categories</h2>
  <p>Explore the diverse range of artistic expressions and mediums showcased by our talented artists.</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row g-0 clients-wrap">
  <?php
$terms = get_terms(array(
  'taxonomy' => 'type-of-work',
  'hide_empty' => false,
));
foreach ($terms as $term) { 
  $term_img = get_field('category_image', $term);
  if ($term_img) { ?>
    <div class="col-xl-3 col-md-4 client-logo text-center">
      <img src="<?php echo $term_img['url']; ?>" class="img-fluid" alt="<?php echo $term->name; ?>">
      <div class="group-name pb-3">
        <h3><?php echo $term->name; ?></h3>
      </div>
    </div><!-- End Client Item -->
  <?php } else { ?>
    <div class="col-xl-3 col-md-4 client-logo text-center">
      <div class="group-name pb-3">
        <h3><?php echo $term->name; ?></h3>
      </div>
    </div><!-- End Client Item -->
  <?php }
}
?>

  </div>
</div>
</section><!-- /Sponsors Section -->
</main> 
<?php get_footer('home');?>