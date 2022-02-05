document.body.onscroll = function()
{
    ScrollEvent()
}
const navbar = document.getElementById("navbar")

function ScrollEvent(){
    let trigger = 50

    if(document.documentElement.scrollTop > trigger){
        console.log("scroll")
        navbar.classList.remove("navbar-top")
        navbar.classList.add("navbar-scroll")
    }else {
        navbar.classList.add("navbar-top")
        navbar.classList.remove("navbar-scroll")
    }
}