'use strict'


const li = document.querySelectorAll('.li');
const block = document.querySelectorAll('.block');
const menuIcon = document.querySelector('.menu-icon');
const overlay = document.querySelector('.menu-menu-1-container');
const menuH = document.querySelector('#nav-icon3');
const body = document.querySelector('body');

menuIcon.addEventListener('click', ()=>{
    overlay.classList.toggle('overlay')
    menuH.classList.toggle('open')
    body.classList.toggle('body-stop')
});
overlay.addEventListener('click', ()=>{
    overlay.classList.toggle('overlay')
    menuH.classList.toggle('open')
    body.classList.toggle('body-stop')
});

li.forEach((eachLi, i)=> {
    li[i].addEventListener('click', ()=> {
        li.forEach((eachLi, i)=>{
            li[i].classList.remove('active')
            li[i].classList.remove('show-li')
            block[i].classList.remove('active')
            block[i].classList.remove('show')

        } )
        
        li[i].classList.add('active')
        block[i].classList.add('active')
    });
});


const links = document.querySelectorAll('.menu-item a');
    links.forEach( link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const seccionScroll = e.target.attributes.href.value;
            const seccion = document.querySelector(seccionScroll);
            seccion.scrollIntoView({ behavior: "smooth"});
        });
    });

window.addEventListener('scroll', () => {
    const nav = document.querySelector('.main-navigation');
    const intro = document.getElementById('intro');
    let introH = intro.offsetTop
    if(window.scrollY > 100){
    nav.classList.add('nav-color');
    }
    else {
    nav.classList.remove('nav-color');
    }

   

});

window.addEventListener('scroll', () => {
    const intro = document.getElementById('intro');
    let introH = intro.offsetTop
    if(window.scrollY > introH - 700){
    intro.classList.add('section-appear');
    }
    const tabs = document.getElementById('tabs');
    let tabsH = tabs.offsetTop
    if(window.scrollY > tabsH - 700){
    tabs.classList.add('section-appear');
    }
    const gallery = document.getElementById('gallery');
    let galleryH = gallery.offsetTop
    if(window.scrollY > galleryH - 700){
    gallery.classList.add('section-appear');
    }
    const section1 = document.getElementById('section1');
    let section1H = section1.offsetTop
    if(window.scrollY > section1H - 700){
    section1.classList.add('section-appear');
    }
    const section2 = document.getElementById('section2');
    let section2H = section2.offsetTop
    if(window.scrollY > section2H - 700){
    section2.classList.add('section-appear');
    }
    const contact = document.getElementById('contact');
    let contactH = contact.offsetTop
    if(window.scrollY > contactH - 700){
    contact.classList.add('section-appear');
    }
   

});