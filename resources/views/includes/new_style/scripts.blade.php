<script type="text/javascript" src="{{asset('js/new_js/aos.js')}}"></script>
<script type="text/javascript" src="{{asset('js/new_js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/new_js/glightbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/new_js/swiper-bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/new_js/isotope.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/new_js/validate.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
</script>

<!-- script-for-menu -->
<script>
    $("span.menu").click(function () {
            $(" ul.navig").slideToggle("slow", function () {});
        });
</script>
<!-- script-for-menu End-->
