<?php
include "header.php";
?>

<section>
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="utf_block_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 contact_area">
          <h3>Leave a Message</h3>
          <form method="POST" action="#" id="contactForm" name="contactForm" onsubmit="return validateContact(this)">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control form-control-name" name="name" id="name" type="text" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control form-control-email" name="email" id="email" type="text">
                </div>
              </div>
			  <div class="col-md-6">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" class="form-control form-control-phone" onkeypress="if(this.value.length==10) return false;" name="phone" id="phone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Subject</label>
                  <input class="form-control form-control-subject" name="subject" id="subject" >
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Message</label>
              <textarea class="form-control form-control-message" name="message" id="message" rows="10"></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-primary solid blank bg-title-green" type="submit">Send Message</button>
            </div>
          </form>
        </div>
        
        <div class="col-lg-4 col-md-12 contact_detail_area">
          <div class="sidebar utf_sidebar_right">
            <div class="widget">
                <h3 class="utf_block_title"><span class="bg-title-green">Office Address</span></h3>
                <ul class="contct_detail_list">
				  <li><i class="fa fa-home"></i>Lorem ipsum dolor sit amet, consecte adipiscing elit Maecenas in pulvinar neque Nulla finibus lobortis.</li>
				  <li><i class="fa fa-phone"></i> <a href="#">(+12) 34567 890 123</a></li>
				  <li><i class="fa fa-envelope-o"></i> <a href="#">mail@example.com</a></li>
				  <li><i class="fa fa-info-circle"></i> <a href="#">www.yourdomain.com</a></li>	
				</ul>
            </div>
			
            <div class="widget">
              <h3 class="utf_block_title"><span class="bg-title-orange">Follow Us</span></h3>
              <ul class="social-icon">
                <li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </section>



















<?php
include "footer.php";
?>