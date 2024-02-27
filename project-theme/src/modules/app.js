'use strict'


const li = document.querySelectorAll('.li')
const block = document.querySelectorAll('.block')
const menuIcon = document.querySelector('.menu-icon')
const overlay = document.querySelector('.menu-menu-1-container')
const menuH = document.querySelector('#nav-icon3')

menuIcon.addEventListener('click', ()=>{
    overlay.classList.toggle('overlay')
    menuH.classList.toggle('open')
})
overlay.addEventListener('click', ()=>{
    overlay.classList.toggle('overlay')
    menuH.classList.toggle('open')
})

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
    })
})