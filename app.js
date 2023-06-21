console.log("Hi");

const topHeader = document.getElementById("header");

document.addEventListener("scroll", e => {
    const currentPosition = window.scrollY;
    if (currentPosition != 0) {
        topHeader.setAttribute("data--detached", "true");
    } else {
        topHeader.setAttribute("data--detached", "false");
    }
})

document.addEventListener("scroll", e => {
    const currentPosition = window.scrollY;
    const viewportHeight = window.innerHeight;
    // console.log (viewportHeight);
    // console.log(currentPosition)

    // BACKGROUND SCROLL COLOUR

    // switch (currentPosition) {
    // }
    // if (currentPosition < 0.66*viewportHeight) {
    //   container.style.backgroundColor = "rgba(255, 0, 0, 0.3)";
    // }
    // else if (currentPosition < 1.66*viewportHeight) {
    //   container.style.backgroundColor = "rgba(0, 255, 0, 0.3)";
    // }
    // else {
    //   container.style.backgroundColor = "rgba(0, 0, 255, 0.3)";
    // }
    
})

const projectImages = document.getElementsByClassName("projects__item");

console.log(projectImages[0].children[0].src);

for (let image of projectImages) {
  image.addEventListener("click", e => {
    console.log(image.children[0].getAttribute("data-fullscale"))
  })
}

//resive event
// store section heights
// use switch, compare, set colour