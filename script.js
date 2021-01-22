const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks =document.querySelector('.nav-links li');


    burger.addEventListener('click', () => {
        // toggle
        nav.classList.toggle('nav-active');
        // animate
        navLinks.forEach((link,index) => {
            link.style.animation `navLinkFade 0.5 ease forwards ${index / 1.5}s`
        });
    });

    

}

navSlide();