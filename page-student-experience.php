<?php
/* Template Name: Student experience */
get_header();
?>

<!-- ============================================================ HERO -->
<section class="hero hero--page">
  <div class="hero__bg">
    <img src="<?php echo esc_url( uottawa_asset( 'img/007bc2f82e5e246d911896471b7b9f9f39c57034.jpg' ) ); ?>" alt="">
  </div>

  <div class="container">
    <div class="hero__card">
      <h1 class="hero__title">Online student experience</h1>
      <div class="hero__text">
        <p>uOttawa Online is built for people who are already busy living their lives.</p>
        <p>You'll stay connected to expert faculty, dedicated advisors and classmates while studying on a schedule that fits around your career, your family and your goals.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================ FACT STRIP -->
<section class="section facts-section">
  <div class="container">
    <ul class="facts">
      <li>100% online</li>
      <li>Same respected uOttawa degree</li>
      <li>Dedicated student support</li>
      <li>300,000 alumni worldwide</li>
      <li>U15 research university</li>
      <li>Faculty-led programs</li>
    </ul>
  </div>
</section>

<!-- ============================================================ WHY STUDENTS CHOOSE -->
<section class="section reasons">
  <div class="container">
    <h2 class="section-title">Why students choose uOttawa Online</h2>
    <p class="lede">Studying here connects your professional goals to the education of one of Canada&rsquo;s leading research universities.</p>

    <div class="reasons-icon-grid">
      <article class="reason-icon">
        <img class="reason-icon__img" src="<?php echo esc_url( uottawa_asset( 'icons/icon-research.svg' ) ); ?>" width="62" height="62" alt="">
        <h4>U15 research university</h4>
        <p>uOttawa is part of Canada&rsquo;s U15 group of leading research-intensive universities.</p>
      </article>

      <article class="reason-icon">
        <img class="reason-icon__img" src="<?php echo esc_url( uottawa_asset( 'icons/icon-network.svg' ) ); ?>" width="61" height="61" alt="">
        <h4>A network with reach</h4>
        <p>uOttawa's location at the centre of Canadian public, civic and policy life shapes the programs you study and the networks you build.</p>
      </article>

      <article class="reason-icon">
        <img class="reason-icon__img" src="<?php echo esc_url( uottawa_asset( 'icons/icon-teacher.svg' ) ); ?>" width="61" height="61" alt="">
        <h4>Faculty-led</h4>
        <p>Every program is shaped by a Faculty with a distinct perspective on its discipline.</p>
      </article>

      <article class="reason-icon">
        <img class="reason-icon__img" src="<?php echo esc_url( uottawa_asset( 'icons/icon-excellence.svg' ) ); ?>" width="48" height="48" alt="">
        <h4>Values-driven learning</h4>
        <p>Programs are guided by academic excellence, integrity, equity and collaboration.</p>
      </article>

      <article class="reason-icon">
        <img class="reason-icon__img" src="<?php echo esc_url( uottawa_asset( 'icons/icon-connected.svg' ) ); ?>" width="58" height="58" alt="">
        <h4>Stay connected</h4>
        <p>Engage with faculty and classmates through discussion boards, group work and interactive assignments.</p>
      </article>

      <article class="reason-icon">
        <img class="reason-icon__img" src="<?php echo esc_url( uottawa_asset( 'icons/icon-schedule.svg' ) ); ?>" width="58" height="58" alt="">
        <h4>Learn on your schedule</h4>
        <p>Access coursework online in a format built for working professionals and busy students.</p>
      </article>
    </div>

    <a class="btn btn--red btn--pill" href="#" style="margin-top:clamp(28px,2.4vw,46px)">Request info</a>
  </div>
</section>

<!-- ============================================================ FLEXIBLE DAY -->
<section class="section day" id="day">
  <div class="container">
    <h2 class="section-title">A flexible day, your way</h2>
    <p class="lede">Wondering how this fits into a week that&rsquo;s already full? Here&rsquo;s how our students can make it work.</p>

    <div class="day-row">
      <article class="day-card">
        <h4>The working professional</h4>
        <dl class="day-list">
          <dt>7:15 a.m.</dt>
          <dd>15 minutes with a recorded lecture before the day starts.</dd>
          <dt>12:15 p.m.</dt>
          <dd>A quiz or short exercise, closed out before lunch ends.</dd>
          <dt>3:00 p.m.</dt>
          <dd>Grab a coffee and attend the instructor's virtual office hours to check in about a difficult concept.</dd>
          <dt>One evening a week.</dt>
          <dd>Enough uninterrupted time set aside to read and complete assignments.</dd>
        </dl>
      </article>
      <div class="day-media">
        <img src="<?php echo esc_url( uottawa_asset( 'img/3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg' ) ); ?>" alt="">
      </div>
    </div>

    <div class="day-row day-row--reverse">
      <article class="day-card">
        <h4>The parent managing life and work</h4>
        <dl class="day-list">
          <dt>School drop-off.</dt>
          <dd>Course notes pulled up on a phone, five minutes at a time.</dd>
          <dt>Nap time.</dt>
          <dd>The one predictable window in the day, used for the heaviest task on the list. It could be a group meeting or a pre-arranged time with your instructor.</dd>
          <dt>After children's bedtime</dt>
          <dd>Quiet concentration time, done at the kitchen table.</dd>
        </dl>
      </article>
      <div class="day-media">
        <img src="<?php echo esc_url( uottawa_asset( 'img/ec6f254c02d7b4af1e49d4a14a837ca24d7ebcbb.jpg' ) ); ?>" alt="">
      </div>
    </div>

    <div class="day-row">
      <div class="day-col">
        <article class="day-card">
          <h4>The lifelong learner</h4>
          <dl class="day-list">
            <dt>Friday afternoon.</dt>
            <dd>Check in with student success advisor about how it's going.</dd>
            <dt>Saturday morning.</dt>
            <dd>Coffee and the week's material, at an unhurried pace.</dd>
            <dt>Sunday afternoon.</dt>
            <dd>A longer block, set aside to complete an assignment.</dd>
          </dl>
        </article>
      </div>
      <div class="day-media">
        <img src="<?php echo esc_url( uottawa_asset( 'img/37a62cab214313cb1ec754ace570845aadd6deb8.jpg' ) ); ?>" alt="">
      </div>
    </div>
  </div>
</section>

<!-- ============================================================ WHAT MATTERS MOST -->
<section class="section matters-section">
  <div class="container">
    <h2 class="section-title">What matters most as you consider your next step</h2>

    <div class="matters">
      <div>
        <h3>Time</h3>
        <p>Every program is designed for learners who already bring previous learning or professional experience, so your time goes toward what's ahead. There's no campus to commute to, and no fixed lecture hour dictating your day.</p>
      </div>
      <div>
        <h3>Return on investment</h3>
        <p>A degree is a long-term investment, and it deserves to be weighed as one. A uOttawa credential carries the standing of a university with a 175-year academic history and faculty recognized around the world for their research; the kind of reputation employers, licensing bodies, and other graduate programs already know.</p>
      </div>
      <div>
        <h3>Credential portability</h3>
        <p>Eligible prior learning counts toward your program and your University of Ottawa degree, which employers and graduate programs highly regard.</p>
      </div>
      <div>
        <h3>Learning experience</h3>
        <p>uOttawa Online programs are taught by uOttawa faculty and meet the same academic standards as our on-campus programs. You'll learn alongside a cohort of working professionals and returning learners, bringing their own experience into every discussion.</p>
      </div>
      <div>
        <h3>Fit with life</h3>
        <p>uOttawa Online was shaped around the realities you're already navigating: work, family, and often distance from Ottawa itself. There's no relocation required, and no assumption that your calendar is empty. Just a program built to sit alongside the life you're already living.</p>
      </div>
    </div>

    <a class="btn btn--red btn--pill" href="#" style="margin-top:clamp(28px,2.4vw,46px)">Request more info</a>
  </div>
</section>

<!-- ============================================================ WHAT YOU'LL GRADUATE WITH -->
<section class="section outcomes">
  <div class="container">
    <h2 class="section-title">What you'll graduate with</h2>

    <div class="outcomes-grid">
      <article class="outcome">
        <div class="outcome__media"><img src="<?php echo esc_url( uottawa_asset( 'img/1db0caf7dba8f8cfcd2ab1b78c55589d2203dad2.jpg' ) ); ?>" alt=""></div>
        <div class="outcome__body">
          <h4>Universal recognition</h4>
          <p>A uOttawa credential recognized nationally and internationally, identical to its on-campus counterpart.</p>
        </div>
      </article>

      <article class="outcome">
        <div class="outcome__media"><img src="<?php echo esc_url( uottawa_asset( 'img/9755731fb6ea8b22a9d25e00c68d1d505c1bfdbb.jpg' ) ); ?>" alt=""></div>
        <div class="outcome__body">
          <h4>Career integration</h4>
          <p>A degree completed alongside a career rather than in place of it, meaning graduates carry both the credential and the work experience employers value.</p>
        </div>
      </article>

      <article class="outcome">
        <div class="outcome__media"><img src="<?php echo esc_url( uottawa_asset( 'img/07662f640130e427d17ab41521cec900d86b8ee3.jpg' ) ); ?>" alt=""></div>
        <div class="outcome__body">
          <h4>Expanded opportunities</h4>
          <p>Eligibility for graduate study, professional certifications, and pathways that prior credentials alone may not unlock.</p>
        </div>
      </article>

      <article class="outcome">
        <div class="outcome__media"><img src="<?php echo esc_url( uottawa_asset( 'img/3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg' ) ); ?>" alt=""></div>
        <div class="outcome__body">
          <h4>Global network</h4>
          <p>Membership in a uOttawa alumni community of more than 280,000 across Canada and the world.</p>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ============================================================ A TEAM IN YOUR CORNER -->
<section class="section support">
  <div class="container">
    <h2 class="section-title">A team in your corner</h2>
    <p class="lede">Your dedicated student success advisor guides you every step of the way, so you get the individual attention you need to succeed inside and outside the classroom.</p>

    <ul class="support-grid">
      <li>
        <h3>Academic advising</h3>
        <p>Tailored to your career goals.</p>
      </li>
      <li>
        <h3>Financial guidance</h3>
        <p>To help plan for program costs.</p>
      </li>
      <li>
        <h3>Student success support</h3>
        <p>To help you stay on track from start to finish.</p>
      </li>
    </ul>
  </div>
</section>

<!-- ============================================================ PROGRAMS -->
<section class="section programs" id="programs">
  <div class="container">
    <h2 class="section-title">Find the program that fits your goals</h2>

    <article class="program-card">
      <h4>Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated)</h4>
      <p>For college diploma graduates with 3+ years of work experience who want to build on that foundation with a uOttawa degree. Bring your diploma; we'll recognize it through transfer credit and build the rest of your degree around your working life.</p>
      <a class="btn btn--red btn--program" href="#">Explore the program</a>
    </article>
  </div>
</section>

<!-- ============================================================ FAQ -->
<section class="section faq">
  <div class="container">
    <h2 class="section-title">Frequently asked questions</h2>

    <div class="faq-list">
      <div class="faq-item is-open">
        <button class="faq-item__q" type="button" aria-expanded="true">
          <span class="faq-item__marker">&#9660;</span>
          <span>What is the online student experience like at uOttawa?</span>
        </button>
        <div class="faq-item__a">
          <p>The online student experience is designed to be flexible, structured and connected. You'll access coursework online, engage with faculty and classmates, and complete assignments through discussions and applied projects.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-item__q" type="button" aria-expanded="false">
          <span class="faq-item__marker">&#9658;</span>
          <span>Are uOttawa Online programs fully online?</span>
        </button>
        <div class="faq-item__a"><p>Yes. Programs listed as 100% online can be completed without coming to campus.</p></div>
      </div>

      <div class="faq-item">
        <button class="faq-item__q" type="button" aria-expanded="false">
          <span class="faq-item__marker">&#9658;</span>
          <span>What support is available to online students?</span>
        </button>
        <div class="faq-item__a"><p>A dedicated student success advisor, academic advising, and financial guidance, from your first question through to graduation.</p></div>
      </div>

      <div class="faq-item">
        <button class="faq-item__q" type="button" aria-expanded="false">
          <span class="faq-item__marker">&#9658;</span>
          <span>Can I work while studying online?</span>
        </button>
        <div class="faq-item__a"><p>Yes. uOttawa Online is built around learners who are already working.</p></div>
      </div>

      <div class="faq-item">
        <button class="faq-item__q" type="button" aria-expanded="false">
          <span class="faq-item__marker">&#9658;</span>
          <span>Do I need to attend classes at set times?</span>
        </button>
        <div class="faq-item__a"><p>No. Coursework is available online so you can study on a schedule that fits your week.</p></div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
