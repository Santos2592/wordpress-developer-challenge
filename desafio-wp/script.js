jQuery(document).ready(function ($) { 
    $('.slider__post').slick({
        slidesToShow: 6,
        infinite: true,
        slidesToScroll: 1,
        centerMode: false,
        centerPadding: '0',
        dots: false,
        prevArrow: false,
        nextArrow: false,
        responsive: [
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 4,
                slidesToShow: 3
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                slidesToShow: 1,
                slidesToShow: 2,
              }
            }
          ]
    });
})

var videoIframe = document.getElementById('video-iframe');
var coverImage = document.querySelector('.cover-image');
var playButton = document.querySelector('.play-button');

function toggleVideo() {
    if (videoIframe.style.display === 'none' || videoIframe.style.display === '') {
        videoIframe.style.display = 'block';
        coverImage.style.display = 'none';
        videoIframe.src += '?autoplay=1';
    } else {
        videoIframe.style.display = 'none';
        coverImage.style.display = 'block';
        videoIframe.src = videoIframe.src.replace('?autoplay=1', '');
    }
}