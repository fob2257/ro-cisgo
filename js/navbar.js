var setNavbar = function () {
            if (window.pageYOffset > 200) {
                $('#navbar-cisgo').addClass('smallnav');
                $('#navbar-cisgo').removeClass('bignav');
                $('#navbar-cisgo .navbar-brand img').removeClass('logo-invisible');
                $('#navbar-cisgo .navbar-brand img').addClass('logo-visible');
            }
        }
        $(document).ready(function () {
            setNavbar();

            /** Scroll del navbar */
            var target = 200,
                timeout = null;
            $(window).scroll(function (e) {
                if (!timeout) {
                    timeout = setTimeout(function () {
                        clearTimeout(timeout);
                        timeout = null;
                        if ($(window).scrollTop() >= target) {
                            $('#navbar-cisgo').addClass('smallnav');
                            $('#navbar-cisgo').removeClass('bignav');
                            $('#navbar-cisgo .navbar-brand img').removeClass('logo-invisible');
                            $('#navbar-cisgo .navbar-brand img').addClass('logo-visible');
                        } else {
                            $('#navbar-cisgo').removeClass('smallnav');
                            $('#navbar-cisgo').addClass('bignav');
                            $('#navbar-cisgo .navbar-brand img').addClass('logo-invisible');
                            $('#navbar-cisgo .navbar-brand img').removeClass('logo-visible');
                        }
                        // navbar links
                        onScroll(e);
                    }, 250);
                }
            }); /** ./Scroll del navbar */
        });