'use strict'

const li = document.querySelectorAll('.li')
const block = document.querySelectorAll('.block')
const hide = document.querySelectorAll('.hide')
const menuIcon = document.querySelector('.menu-icon')
const overlay = document.querySelector('.menu-menu-1-container')

menuIcon.addEventListener('click', ()=>{
    overlay.classList.toggle('overlay')
})
overlay.addEventListener('click', ()=>{
    overlay.classList.toggle('overlay')
})

li.forEach((eachLi, i)=> {
    li[i].addEventListener('click', ()=> {
        li.forEach((eachLi, i)=>{
            li[i].classList.remove('active')
            block[i].classList.remove('active')
        } )
        
        li[i].classList.add('active')
        block[i].classList.add('active')
        hide[i].classList.add('visible')
    })
})