"use strict"

//preloader
function loaderSpinner() {
    $(window).load(function() {
        var loader = $('.loader');
let wHeight = $(window).height();
let wWidth = $(window).width();
let i = 0;

loader.css({
    top: wHeight / 2 - 2.5,
    left: wWidth / 2 - 200
 })
      
  do{
    loader.animate({
      width: i
    },10)
    i+=3;
  } while(i <= 400)
  if(i === 402){
    loader.animate({
      left: 0,
      width: '100%'
    })
    loader.animate({
      top: '0',
      height: '100vh'
    })
  }
      
      /* This line hide loader and show content */
      setTimeout(function(){
        $('.container').fadeIn("slow");
        (loader).fadeOut("fast");
        /*Set time in milisec */
      },3000);
    });

}

loaderSpinner();


//cursor

let innerCursor = document.querySelector('.inner-cursor');
let outerCursor = document.querySelector('.outer-cursor');

document.addEventListener('mousemove', moveCursor);

function moveCursor(e){
    let x = e.clientX;
    let y = e.clientY;y

    innerCursor.style.left = `${x}px`;
    innerCursor.style.top = `${y}px`;
    outerCursor.style.left = `${x}px`;
    outerCursor.style.top = `${y}px`;
}

let links = Array.from(document.querySelectorAll("a"));

console.log(links);

links.forEach( link =>{
    link.addEventListener('mouseover', ()=>{
        innerCursor.classList.add("grow");
    })
    link.addEventListener('mouseleave', ()=>{
        innerCursor.classList.remove("grow");
    })
})
  
//menu
let burger = document.querySelector(".menu-burger"),
     navLinks = document.querySelector(".nav-links")

    burger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
});

// DETECTION SCROLL

const dots = document.querySelectorAll(".scroll-indicator a");

const removeActiveClass = () => {
    dots.forEach(dot => {
        dot.classList.remove("active");
    });
}
const addActiveClass = (entries, observer) => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            let currentDot = document.querySelector(`.scroll-indicator a[href='#${entry.target.id}']`);
            removeActiveClass();
            currentDot.classList.add("active");
        }
    })
};
const options = {
    threshold: 0.8
};
const observer = new IntersectionObserver(addActiveClass, options);
const sections = document.querySelectorAll("section");

sections.forEach(section => {
    observer.observe(section);

})


// THEME

let icon = document.getElementById("icon");


if(localStorage.getItem("theme") == null){
    localStorage.setItem("theme", "dark");
}


let localData = localStorage.getItem("theme");

if (localData == "dark"){
    icon.src = "asset/img/sun.png";
    document.body.classList.remove("light-theme");
} else if (localData == "light") {
    icon.src = "asset/img/moon.png";
    document.body.classList.add("light-theme");
}


icon.onclick = function () {
    document.body.classList.toggle("light-theme");
    if(document.body.classList.contains("light-theme")){
        icon.src = "asset/img/moon.png";
        localStorage.setItem("theme", "light");
    } else {
        icon.src = "asset/img/sun.png";
        localStorage.setItem("theme", "dark");
    }
}

//Bouton partage

const shareBtn = document.querySelector('.share-btn');
const shareOptions = document.querySelector('.share-options');

shareBtn.addEventListener('click', () => {
    shareOptions.classList.toggle('active');
})

//ANIMATION PRENOM

const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

let interval = null;

document.querySelector("h1").onmouseover = event => {  
  let iteration = 0;
  
  clearInterval(interval);
  
  interval = setInterval(() => {
    event.target.innerText = event.target.innerText
      .split("")
      .map((letter, index) => {
        if(index < iteration) {
          return event.target.dataset.value[index];
        }
      
        return letters[Math.floor(Math.random() * 26)]
      })
      .join("");
    
    if(iteration >= event.target.dataset.value.length){ 
      clearInterval(interval);
    }
    
    iteration += 1 / 3;
  }, 30);
}

//appartion texte chantier


/*
let observerr = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if(entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');
        }
    });
});

let hiddenSection = document.querySelectorAll('.hidden');

hiddenSection.forEach((el) => observerr.observe(el));*/