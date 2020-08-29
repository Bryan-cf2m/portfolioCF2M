c2.onclick = function (){
    
    gsap.to(".c2", {x: "200px", backgroundColor:"#FF2250", duration: 1});

}

c3.onclick = function (){
    
    gsap.to(".c3", {x: "900px", backgroundColor:"#FF2250", duration: 1, ease:"power4.inOut"});

}

restart.onclick = function (){
    
    gsap.to(".c2", {x: "0px", backgroundColor:"#67FF9F", duration: 0});

}

restart2.onclick = function (){
    
    gsap.to(".c3", {x: "0px", backgroundColor:"#67FF9F", duration: 0});

}
