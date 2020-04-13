$("#slick1").slick({
    rows: 2,
    dots: false,
    arrows: true,
    infinite: false,
    loop: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow:
        "<img id='left-arrow' class='a-left control-c prev slick-prev' src='/site-images/arrow-left.jpg'>",
    nextArrow:
        "<img id='right-arrow' class='a-right control-c next slick-next' src='/site-images/arrow-right.png'>",
    responsive: [
        {
            breakpoint: 1200, // tablet breakpoint
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            },
        },
        {
            breakpoint: 992, // mobile breakpoint
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ],
});


$("#slick2").slick({
    rows: 2,
    dots: false,
    arrows: true,
    infinite: false,
    loop: false,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 6
    /* prevArrow:
        "<img id='left-arrow' class='a-left control-c prev slick-prev' src='/site-images/arrow-left.jpg'>",
    nextArrow:
        "<img id='right-arrow' class='a-right control-c next slick-next' src='/site-images/arrow-right.png'>",
    responsive: [
        {
            breakpoint: 1200, // tablet breakpoint
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            },
        },
        {
            breakpoint: 992, // mobile breakpoint
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            },
        },
    ], */
});

