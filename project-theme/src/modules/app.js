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
    const navLogo = document.querySelector('.nav-logo');
    if(window.scrollY > 100){
    nav.classList.add('nav-color');
    navLogo.classList.add('show-logo');
    }
    else {
    nav.classList.remove('nav-color');
    navLogo.classList.remove('show-logo');
    }

   

});

window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('.section-hide');

  sections.forEach( section => {
      let sectionsH = section.offsetTop;
      if(scrollY > sectionsH - 700){
          section.classList.add('section-appear');
      }

  });
   

});