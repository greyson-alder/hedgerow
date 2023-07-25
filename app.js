// GENERAL

const imagesJSON = window.allImages;

console.log(imagesJSON["resources"].length)

function grabImage(index, params) {
  const selectedImage = imagesJSON["resources"][index];
  return "https://res.cloudinary.com/dvbiqses3/image/upload" + (params ? "/" : "") + params + "/v" + selectedImage["version"] + "/" + selectedImage["public_id"] + ".jpg";
}

// HEADER SCROLL COLOUR CHANGE

const topHeader = document.getElementById("header");
const bioBlock = document.getElementById("bio");
const plantsBlock = document.getElementById("plants");

document.addEventListener("scroll", () => {
    const currentPosition = window.scrollY;
    if (currentPosition != 0) {
        topHeader.setAttribute("data--detached", "true");
    } else {
        topHeader.setAttribute("data--detached", "false");
    }
})

//

document.addEventListener("scroll", () => {
  let inner_bioBlock = bioBlock.getBoundingClientRect();
  let inner_plantsBlock = plantsBlock.getBoundingClientRect();
    if (
          (inner_bioBlock.y < 67 && inner_bioBlock.y + inner_bioBlock.height > 97) 
          || 
          (inner_plantsBlock.y < 67 && inner_plantsBlock.y + inner_plantsBlock.height > 97)
        ) {
      topHeader.style = "background-color: var(--pink-med)";
    } else {
      topHeader.style = "";
    }

})

// GALLERY SECTION

const projectImages = document.getElementsByClassName("projects__item");
const loadMorePhotos = document.getElementById("load_more");
const photoContainer = document.getElementById("photos__container");
const photoModal = document.getElementById("photos__modal");
const modalInner = document.getElementById("modal__inner");

const initialNumberPhotos = document.getElementsByClassName("project__image").length;
let photoIndex = initialNumberPhotos;

// -- MODAL FUNCTIONALITY FOR INITIAL IMAGES

for (let image of projectImages) {
  if (image.id !== "load_more") {
    image.addEventListener("click", () => {
      const imageURL = image.getAttribute("data-fullscale");
      createAndAddModal(imageURL, image.getBoundingClientRect());
    })
  }
}

// -- DYNAMICALLY ADD MORE IMAGES

function createPhotoElement(index) {
  const photoBtn = document.createElement("button");
  photoBtn.className = "projects__item";

  const photoImage = document.createElement("img");
  photoImage.className = "project__image";
  photoImage.setAttribute("src", grabImage(index, "w_320"));
  photoBtn.setAttribute("data-fullscale", grabImage(index, ""));

  photoBtn.appendChild(photoImage);

  photoBtn.addEventListener("click", e => {
    const imageURL = photoBtn.getAttribute("data-fullscale");
    // console.log(imageURL);
    createAndAddModal(imageURL, photoBtn.getBoundingClientRect());
  })

  return photoBtn;
}

function addPhotoRow() {
  for (let i = 0; i < 5; i++) {
    if (photoIndex < imagesJSON["resources"].length) {
      photoContainer.appendChild(createPhotoElement(photoIndex))
      photoIndex += 1;
      if (photoIndex == imagesJSON["resources"].length) {
        loadMorePhotos.toggleAttribute("hidden")
        break
      }
    }
  }
}

loadMorePhotos.addEventListener("click", addPhotoRow);

// -- DYNAMIC MODAL FUNCTIONALITY

function createAndAddModal(imageURL, clickedElement) {
  const modalImage = document.createElement("img");
  const selectImage = imagesJSON["resources"].findIndex(image => image.secure_url == imageURL);
  // const selectImageFullWidth = imagesJSON["resources"][selectImage].width;
  modalImage.className = "modal__image";
  modalImage.setAttribute("src", imageURL);
  modalImage.setAttribute("style", `
    background-image: url("` + imageURL + `"), linear-gradient(rgba(255, 255, 255, 0.66), rgba(255, 255, 255, 0.66));
  `)
  modalInner.appendChild(modalImage);
  const imageSize = modalImage.getBoundingClientRect();
  // console.log(imageSize);

  // scale(`+ clickedElement.width +`
  // transform: translate(`+ (clickedElement.x - clickedElement.width) +`px,` + (clickedElement.y - clickedElement.height/2) +`px));
  
  const closeModalButton = document.createElement("button");
  closeModalButton.innerText = "close";
  closeModalButton.className = "closeModalBtn";
  closeModalButton.addEventListener("click", modalClose);
  photoModal.toggleAttribute("hidden");

  
  modalInner.appendChild(closeModalButton);

}

function modalClose() {
  photoModal.setAttribute("hidden", null);
  modalInner.innerHTML = "";
  console.log(photoModal)
}

photoModal.addEventListener("click", modalClose)

// BACKGROUND FLOWERS

// const backgroundFlowers = document.getElementById("backgroundFlowers");
// const websiteHeight = document.body.getBoundingClientRect();
// console.log(websiteHeight);
// backgroundFlowers.setAttribute("style", `bottom: calc(${websiteHeight.height}px - 100vh)`);

const monsteraBtn = document.getElementById("monstera");
const hedgehog = document.getElementById("hedgehog");
const hedgehogContainer = document.getElementById("hedgehog__container");

monsteraBtn.addEventListener("click", ()=>{
  hedgehog.setAttribute("style", "animation-play-state: running");
  hedgehogContainer.setAttribute("style", "animation-play-state: running");
})