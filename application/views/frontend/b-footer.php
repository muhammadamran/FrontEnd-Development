<footer>
  <div class="footer-area section-bg">
    <div class="container">
      <div class="footer-top footer-padding">
        <div class="row d-flex justify-content-between">
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
            <div class="single-footer-caption mb-50">
              <div class="footer-logo">
                <a href="index.php"><img src="<?= base_url('assets/frontend/one/assets/img/logo/logo2_footer.png');?>" class="lingkaran-footer" alt=""></a>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
            <div class="single-footer-caption mb-50">
              <div class="footer-tittle">
                <h4>About SCDB</h4>
                <div class="footer-pera">
                  <p class="info1">Lorem igpsum doldfor sit amet, adipiscing elit, sed do eiusmod tempor cergelit rgh. </p>
                  <p class="info1">Lorem ipsum dolor sit amet, adipiscing elit.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
            <div class="single-footer-caption mb-50">
              <div class="footer-number mb-50">
                <h4><span>INSTITUT PEMERINTAHAN</span><br>DALAM NEGERI</h4>
                <p>scdb@gmail.com</p>
              </div>
              <!-- Form -->
              <div class="footer-form">
                <div id="mc_embed_signup">
                  <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                    <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                    <div class="form-icon">
                      <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                        Send
                      </button>
                    </div>
                    <div class="mt-10 info"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-xl-9 col-lg-8">
            <div class="footer-copy-right">
              <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Institut Pemerintahan Dalam Negeri 
                <i class="fa fa-heart" aria-hidden="true"></i> by 
                <a href="https://scdb.ac.id" target="_blank">SCDB FrontEnd</a>
              </p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4">
            <div class="footer-social f-right">
              <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="https://www.scdb.ac.id" target="_blank"><i class="fas fa-globe"></i></a>
              <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div id="back-top" >
  <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>
<script type="text/javascript">
    var aText = new Array(
    "Hello, saat ini kamu sedang berada di website Smart Campus Database System. Anda dapat melihat Grafik tentang: OM-SPAN, P.O.K, S.A.S dan Pegawai. Anda juga dapat melihat galeri kami, jelajahi website kami untuk mendapatkan informasi yang anda butuhkan.",
    "",
    " Powered by ",
    "Institut Pemerintahan Dalam Negeri",
    " Kementrian Dalam Negeri R.I."
    );
    var iSpeed = 50;
    var iIndex = 0;
    var iArrLength = aText[0].length;
    var iScrollAt = 20;

    var iTextPos = 0;
    var sContents = "";
    var iRow;

    function typewriter() {
    sContents = " ";
    iRow = Math.max(0, iIndex - iScrollAt);
    var destination = document.getElementById("typedtext");

    while (iRow < iIndex) {
    sContents += aText[iRow++] + "<br />";
    }
    destination.innerHTML =
    sContents + aText[iIndex].substring(0, iTextPos) + "_";
    if (iTextPos++ == iArrLength) {
    iTextPos = 0;
    iIndex++;
    if (iIndex != aText.length) {
    iArrLength = aText[iIndex].length;
    setTimeout("typewriter()", 500);
    }
    } else {
    setTimeout("typewriter()", iSpeed);
    }
    }
    typewriter();
</script>
<script type="text/javascript">
    var aTextdua = new Array(
    "Research in the smart campus area is still growing, where every researcher defines the concept of smart campus with a less thorough perspective that has not been conical in the same conception of the concept. In this paper, we summarize the existing condition of smart campus development in term of features, supported technologies, and applications were built using systematic literature review (SLR) as the standard methodology used to solve any problems by tracing the results of previous research. The problems declared in SLR are commonly called as research question (RQ). To achieve that goal, we define some RQs related to that scope and clarify each question by tracing previous research papers which are indexed in reputable journal databases such as IEEE Xplore, Scopus, Springerlink, and ScienceDirect."
    );
    var iSpeed = 50;
    var iIndex = 0;
    var iArrLength = aTextdua[0].length;
    var iScrollAt = 20;

    var iTextPos = 0;
    var sContents = "";
    var iRow;

    function typewriterdua() {
    sContents = " ";
    iRow = Math.max(0, iIndex - iScrollAt);
    var destination = document.getElementById("typedtextdua");

    while (iRow < iIndex) {
        sContents += aTextdua[iRow++] + "<br />";
    }
    destination.innerHTML =
    sContents + aTextdua[iIndex].substring(0, iTextPos) + "_";
    if (iTextPos++ == iArrLength) {
        iTextPos = 0;
        iIndex++;
        if (iIndex != aTextdua.length) {
        iArrLength = aTextdua[iIndex].length;
        setTimeout("typewriterdua()", 500);
        }
    } else {
        setTimeout("typewriterdua()", iSpeed);
    }
    }
    typewriterdua();
</script>
<script type="text/javascript">
    var Flipper = (function () {
    var card = $(".card");
    var flipper = card.find(".card__flipper");
    var win = $(window);

    var flip = function () {
    var thisCard = $(this);
    var thisFlipper = thisCard.find(".card__flipper");
    var offset = thisCard.offset();
    var xc = win.width() / 2;
    var yc = win.height() / 2;
    var docScroll = $(document).scrollTop();
    var cardW = thisCard.outerWidth() / 2;
    var cardH = thisCard.height() / 2;

    var transX = xc - offset.left - cardW;
    var transY = docScroll + yc - offset.top - cardH;
    if (win.width() <= 700) transY = 0;

    if (card.hasClass("active")) unflip();

    thisCard.css({ "z-index": "3" }).addClass("active");

    thisFlipper
    .css({
    transform:
    "translate3d(" +
    transX +
    "px," +
    transY +
    "px, 0) rotateY(180deg) scale(1)",
    "-webkit-transform":
    "translate3d(" +
    transX +
    "px," +
    transY +
    "px, 0) rotateY(180deg) scale(1)",
    "-ms-transform":
    "translate3d(" +
    transX +
    "px," +
    transY +
    "px, 0) rotateY(180deg) scale(1)"
    })
    .addClass("active");

    return false;
    };

    var unflip = function (e) {
    card.css({ "z-index": "1" }).removeClass("active");
    flipper
    .css({
    transform: "nassets/frontend/one",
    "-webkit-transform": "nassets/frontend/one",
    "-ms-transform": "nassets/frontend/one"
    })
    .removeClass("active");
    };

    var bindActions = function () {
    card.on("click", flip);
    win.on("click", unflip);
    };

    var init = function () {
    bindActions();
    };

    return {
    init: init
    };
    })();
</script>
<script type="text/javascript">
    Flipper.init();
    var vid = document.getElementById("myVideo");
    function setPlaySpeed() { 
    vid.playbackRate = 0.2;
    } 
    </script>
    <script type="text/javascript">
    var SlideShow = (function () {
    function SlideShow (config) {
    if (!config) {
    config = {};
    }
    this.slideSelector = config.slideSelector;
    this.refreshInterval = config.refreshInterval || 10000;
    this.currentVisibleSlide = null;
    this.initialize();
    }
    var prototype = {
    constructor: SlideShow
    };
    prototype.initialize = function () {
    this.refresh();
    this.nextSlide();
    this.slideShowTimer = window.setInterval(this.nextSlide.bind(this), this.refreshInterval);
    }
    prototype.destroy = function () {
    if (this.slideShowTimer) {
    window.clearInterval(this.slideShowTimer);
    }
    }
    prototype.displaySlide = function (slide, show) {
    slide && (slide.style.display = show ? 'block' : 'nassets/frontend/one');
    }
    prototype.gotoSlide = function (index) {
    var slideToShow = this.slideElements[index];
    if (slideToShow) {
    if (this.currentVisibleSlide) {
    this.displaySlide(this.currentVisibleSlide, false);
    }
    this.displaySlide(slideToShow, true);
    this.currentVisibleSlide = slideToShow;
    }
    }
    prototype.nextSlide = function () {
    var currentVisibleSlide = this.currentVisibleSlide
    var nextSlideIndex;
    if (!currentVisibleSlide) {
    nextSlideIndex = 0;
    } else {
    currentVisibleSlide = this.slideElements.indexOf(currentVisibleSlide);
    nextSlideIndex = currentVisibleSlide + 1;
    if (nextSlideIndex > this.slideElements.length - 1) {
    nextSlideIndex = 0;
    }
    }
    console.log('Showing index: ', nextSlideIndex);
    this.gotoSlide(nextSlideIndex);
    }
    prototype.refresh = function () {
    var slideElements = document.querySelectorAll(this.slideSelector);
    this.slideElements = Array.prototype.slice.call(slideElements, 0);
    }
    SlideShow.prototype = prototype;
    return SlideShow;
    })();
    var slideShow = new SlideShow({
    slideSelector: '.slides'
    })
</script>
<script src="<?= base_url('assets/frontend/one/assets/js/vendor/modernizr-3.5.0.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/vendor/jquery-1.12.4.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/popper.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.slicknav.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/owl.carousel.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/slick.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/wow.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/animated.headline.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.magnific-popup.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/gijgo.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.nice-select.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.sticky.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.counterup.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/waypoints.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.countdown.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/contact.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.form.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.validate.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/mail-script.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/jquery.ajaxchimp.min.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/plugins.js');?>"></script>
<script src="<?= base_url('assets/frontend/one/assets/js/main.js');?>"></script>
</body>
</html>