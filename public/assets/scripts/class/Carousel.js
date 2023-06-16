/**
 * Enable corousel of the home page
 */
class Carousel{
    /**
     * 
     * @since 1.0.0
     * @returns {void}
     */
    static slidFin(){
        $('#slid-finan').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 6,
            slidesToScroll: 6,
            arrows: false,
            autoplay: true,
            responsive: [{
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            },
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                }
            }]
        });
    }

    /**
     * 
     * @since 1.0.0
     * @returns {void}
     */
    static slidSafes(){
        $('#slid-safes').slick({
            dots: false,
            infinite: true,
            speed: 600,
            slidesToShow: 4,
            slidesToScroll: 4,
            arrows: false,
            autoplay: true,
            responsive: [{
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            }]
        });
    }
}
