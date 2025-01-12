import AOS from 'aos';
import "aos/dist/aos.css";

window.addEventListener("load", () => {
    AOS.init({
        duration: 1000,
        offset: 100,
    });
});