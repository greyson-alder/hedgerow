// HEADER SCROLL COLOUR CHANGE

const scroll = () => {

    const topHeader = document.getElementById("header");
    const bioBlock = document.getElementById("bio");
    
    document.addEventListener("scroll", () => {
        const currentPosition = window.scrollY;
        if (currentPosition != 0) {
            topHeader.setAttribute("data--detached", "true");
        } else {
            topHeader.setAttribute("data--detached", "false");
        }
    })
    
    document.addEventListener("scroll", () => {
      let inner_bioBlock = bioBlock.getBoundingClientRect();
        if (
              (inner_bioBlock.y < 67 && inner_bioBlock.y + inner_bioBlock.height > 97) 
            ) {
          topHeader.style = "background-color: var(--pink-med)";
        } else {
          topHeader.style = "";
        }
    })
    
}

export default scroll;