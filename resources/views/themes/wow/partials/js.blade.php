<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
{!! HTML::script('themes/'.$theme.'/js/bootstrap.min.js') !!}
{!! HTML::script('themes/'.$theme.'/js/scripts.js') !!}
{!! HTML::script('themes/'.$theme.'/js/modernizr.custom.57696.js') !!}
{!! HTML::script('themes/'.$theme.'/js/jquery-scrolltofixed-min.js') !!}
{!! HTML::script('themes/'.$theme.'/js/expand-nav.js') !!}
{!! HTML::script('themes/'.$theme.'/js/hammer.js') !!}

<!-- jQuery Popup Overlay -->
{!! HTML::script('themes/'.$theme.'/js/jquery.popupoverlay.js') !!}

<script type="text/javascript">
    $(document).ready(function() {
        // grab the initial top offset of the navigation
        var stickyNavTop = $('.stick').offset().top;
        var stickyOriginal = $('.stick');
        var stickyClone = stickyOriginal.clone().addClass('sticky');

        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function(){
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top

            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scrollTop > stickyNavTop) {
                //$('.stick').addClass('sticky');
                if(stickyClone.is(':hidden')) stickyClone.insertAfter(stickyOriginal);
                $('#menu-toggle').css({'position': 'fixed', 'top': '0', 'z-index': '9999'});
            } else {
                //$('.stick').removeClass('sticky');
                $('#menu-toggle').css({'position': 'static', 'top': '0', 'z-index': '9999'});
                stickyClone.remove();
            }
        };

        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function() {
            stickyNav();
        });

        // Menu toggle script:
        $(".menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");

        });
        $("#close-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        function detectIE() {
            var ua = window.navigator.userAgent;

            var msie = ua.indexOf('MSIE ');
            if (msie > 0) {
                // IE 10 or older => return version number
                return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
            }

            var trident = ua.indexOf('Trident/');
            if (trident > 0) {
                // IE 11 => return version number
                var rv = ua.indexOf('rv:');
                return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
            }

            var edge = ua.indexOf('Edge/');
            if (edge > 0) {
                // Edge (IE 12+) => return version number
                return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
            }

            // other browser
            return false;
        }

        if(detectIE()){
            $('.pr-image').css({'top':'1612px'});
        }
    });
</script>
