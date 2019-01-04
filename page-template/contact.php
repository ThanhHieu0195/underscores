<?php /* Template Name: Contact Template */ ?>
    <?php get_header() ?>
    <?php if(isset($_GET['message'])): ?>
        <?php if ($_GET['message'] == 'success'): ?>
        <div class="flash-message">Thông tin liên hệ đã được gửi đến hệ thống</div>
        <?php endif; ?>
        <?php if ($_GET['message'] == 'error'): ?>
        <div class="flash-message">QUá trình sử lý gặp lỗi! chúng tôi sẽ kiểm tra sớm nhất.</div>
        <?php endif; ?>
    <?php endif; ?>
    
    <div class="block-content">
            <section class="banner_area">
            <div class="container">
                <div class="banner_text_inner">
                <h4>Contact Us</h4>
                <h5>Tell us about your story and your project</h5>
                </div>
            </div>
            </section>
            <div class="container contact_container">
            <div class="row">
                <div class="col">
                <!-- Breadcrumbs-->
                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
               <iframe
                  width="100%"
                  height="450"
                  frameborder="0" style="border:0"
                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyATg1qfDMrPMms8wIHZClQba7IFNtb6fxY
                    &q=Space+Needle,Seattle+WA" allowfullscreen>
                </iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 contact_col">
                <div class="contact_contents">
                    <h1>Contact Us</h1>
                    <p>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.</p>
                    <div>
                    <p>(800) 686-6688</p>
                    <p>info.deercreative@gmail.com</p>
                    </div>
                    <div>
                    <p>mm</p>
                    </div>
                    <div>
                    <p>Open hours: 8.00-18.00 Mon-Fri</p>
                    <p>Sunday: Closed</p>
                    </div>
                </div>
                <!-- Follow Us-->
                <div class="follow_us_contents">
                    <h1>Follow Us</h1>
                    <ul class="social d-flex flex-row">
                    <li><a href="#" style="background-color: #3a61c9"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #41a1f6"><i class="i fab fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #fb4343"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #8f6247"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                </div>
                <div class="col-lg-6 get_in_touch_col">
                <div class="get_in_touch_contents">
                    <h1>Get In Touch With Us!</h1>
                    <p>Fill out the form below to recieve a free and confidential.</p>
                    <form action="<?= admin_url('admin-ajax.php?action=front') ?>" method="POST">
                    <div>
                        <input type="hidden" name="method" value="sendContact">
                        <input name="contact[name]"  class="form_input input_name input_ph" id="input_name" type="text" name="name" placeholder="Name" required="required" data-error="Name is required.">
                        <input name="contact[email]" class="form_input input_email input_ph" id="input_email" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
                        <textarea name="contact[reason]" class="input_ph input_message" id="input_message" name="message" placeholder="Message" rows="3" required="" data-error="Please, write us a message."></textarea>
                    </div>
                    <div>
                        <button class="red_button message_submit_btn trans_300" id="review_submit" type="submit" value="Submit">send message</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
<?php get_footer() ?>