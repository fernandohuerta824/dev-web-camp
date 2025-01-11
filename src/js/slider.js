import Swiper from 'swiper/bundle';
import { Navigation, Pagination } from 'swiper/modules'
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';



document.addEventListener('DOMContentLoaded', e => {
    const sliders = document.querySelectorAll('.slider');

    sliders.forEach(s => {
        Swiper.use([Navigation]);
        new Swiper(s, {
        slidesPerView: 3,
        spaceBetween: 15,
        freeMode: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
            1280: {
                slidesPerView: 4,
            }
        }
    })})
})