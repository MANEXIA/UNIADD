function signup(){
    document.getElementById('sign-up').style.display = "block"
    document.getElementById('body').style.backdropFilter = "blur(3px)"
    document.getElementById('login').style.display = "none"
}

function back(){
    document.getElementById('sign-up').style.display = "none"
    document.getElementById('login').style.display = "flex" 
    document.getElementById('body').style.backdropFilter = "none"
}

function feedb(){
    document.getElementById('feed-form').style.display = "block";
    document.getElementById('box-feed').style.display = "none";
}

function fbBack(){
    document.getElementById('feed-form').style.display = "none";
    document.getElementById('box-feed').style.display = "block";
}


function homebtn(){
   document.getElementById("home").style.display = "block"
   document.getElementById("universities").style.display = "none"
}

function unibtn(){
    document.getElementById("home").style.display = "none"
   document.getElementById("universities").style.display = "block"
}









const buttons = document.querySelectorAll("[data-carousel-button]")
buttons.forEach(button => {
   button.addEventListener("click", () => {

      const offset = button.dataset.carouselButton === "next" ? 1 : -1
      const slides = button 
      .closest("[data-carousel]")
      .querySelector("[data-slides]")

      const activeSlide = slides.querySelector("[data-active]")
      let newIndex = [...slides.children].indexOf(activeSlide) + offset

      if (newIndex < 0) newIndex = slides.children.length - 1
      if (newIndex >= slides.children.length) newIndex = 0

      slides.children[newIndex].dataset.active = true
      delete activeSlide.dataset.active

   })


})