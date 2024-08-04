import throttle from "lodash.throttle";

//Quantité de scroll au depart
let startScroll = window.scrollY;
const navbar = document.querySelector("#nav_bar") as HTMLDivElement;

const navmenu = document.querySelector("#nav_menu") as HTMLDivElement;

const onWindowScroll=() => {
	//console.log('top',top)
	if (window.scrollY > startScroll) {
        //console.log('down')
		navbar.style.setProperty('transition','transform 0.5s')
		navbar.style.setProperty('transform',`translateY(-${navmenu.offsetHeight}px)`) ;
	} else {
	    navbar.style.setProperty('transform','translateY(0)')
		//console.log("up");
	}

	startScroll = window.scrollY;
	//console.log('win scroll',window.scrollY)
}

//window.addEventListener("scroll",throttle(onWindowScroll,620));



/**
 * Calcule automatique du nombre de second que doit durrer le defilement
 */
const messageSlider=document.querySelector('#message_slider') as HTMLUListElement

if(messageSlider) {
	const childrenCount=messageSlider.firstElementChild?messageSlider.firstElementChild.childElementCount:1
	
	messageSlider.style.setProperty('--delay',` ${childrenCount*30}s  `)
}