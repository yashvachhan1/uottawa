<?php
/* Template Name: Contact */
get_header();
?>

<!-- ============================================================ CONNECT WITH OUR TEAM -->
<section class="section contact">
  <div class="container">

    <div class="contact-row">
      <div>
        <h1 class="section-title">Connect with our team</h1>

        <div class="contact-points">
          <div>
            <h3>Ask questions</h3>
            <p>Get answers to your questions about our programs, student experience, and graduate outcomes.</p>
          </div>
          <div>
            <h3>Discuss your background</h3>
            <p>See how your existing post-secondary credits can count toward your degree.</p>
          </div>
          <div>
            <h3>Talk admissions</h3>
            <p>Learn more about admission requirements, application deadlines and next steps.</p>
          </div>
        </div>
      </div>

      <!-- Enquiry form -->
      <form class="enquiry" action="#" method="post">
        <p class="enquiry__title">Take the next step to getting your degree.</p>

        <div class="enquiry__grid">
          <div class="enquiry__field">
            <label for="first-name">First name</label>
            <input type="text" id="first-name" name="first-name" autocomplete="given-name" required>
          </div>

          <div class="enquiry__field">
            <label for="last-name">Last name</label>
            <input type="text" id="last-name" name="last-name" autocomplete="family-name" required>
          </div>

          <div class="enquiry__field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" autocomplete="email" required>
          </div>

          <div class="enquiry__field">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" autocomplete="tel">
          </div>

          <div class="enquiry__field enquiry__field--wide">
            <label for="province">Province</label>
            <select id="province" name="province">
              <option value="">Select a province</option>
              <option>Alberta</option>
              <option>British Columbia</option>
              <option>Manitoba</option>
              <option>New Brunswick</option>
              <option>Newfoundland and Labrador</option>
              <option>Northwest Territories</option>
              <option>Nova Scotia</option>
              <option>Nunavut</option>
              <option>Ontario</option>
              <option>Prince Edward Island</option>
              <option>Quebec</option>
              <option>Saskatchewan</option>
              <option>Yukon</option>
              <option>Outside Canada</option>
            </select>
          </div>

          <div class="enquiry__field enquiry__field--wide">
            <label for="credential">College credential</label>
            <select id="credential" name="credential">
              <option value="">Select a credential</option>
              <option>College diploma</option>
              <option>Advanced diploma</option>
              <option>Certificate</option>
              <option>Bachelor&rsquo;s degree</option>
              <option>Other</option>
            </select>
          </div>

          <div class="enquiry__field enquiry__field--wide">
            <label for="start">Preferred start</label>
            <select id="start" name="start">
              <option value="">Select a term</option>
              <option>Fall</option>
              <option>Winter</option>
              <option>Spring/Summer</option>
            </select>
          </div>
        </div>

        <button class="btn enquiry__submit" type="submit">Submit</button>

        <p class="enquiry__note">By submitting this form, you agree to be contacted by uOttawa Online or its representatives about this program.</p>
      </form>
    </div>

    <div class="contact-row">
      <div>
        <h2 class="section-title">General inquiries</h2>
        <p class="contact-lead">Our team is here to answer questions and connect you with the resources you need.</p>

        <div class="contact-links">
          <span class="contact-link">
            <img src="<?php echo esc_url( uottawa_asset( 'icons/icon-email.svg' ) ); ?>" width="73" height="73" alt="">
            <a href="mailto:admissions@online.uottawa.ca">admissions@online.uottawa.ca</a>
          </span>
          <span class="contact-link contact-link--sm">
            <img src="<?php echo esc_url( uottawa_asset( 'icons/icon-phone.svg' ) ); ?>" width="41" height="41" alt="">
            <a href="tel:+16133177079">+1 (613) 317-7079</a>
          </span>
        </div>
      </div>

      <div>
        <h2 class="section-title">Ready to apply?</h2>
        <p class="contact-lead">Follow the link below to get started.</p>

        <div class="contact-links">
          <span class="contact-link contact-link--check">
            <img src="<?php echo esc_url( uottawa_asset( 'icons/icon-check.svg' ) ); ?>" width="53" height="53" alt="">
            <a href="https://www.uottawa.ca/study/applying-uottawa" target="_blank" rel="noopener">Apply today</a>
          </span>
        </div>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
