console.log("Hi");

const imagesJSON = window.allImages;

function grabImage(index, params) {
  const selectedImage = imagesJSON["resources"][index];
  return "https://res.cloudinary.com/dvbiqses3/image/upload/" + params + "/v" + selectedImage["version"] + "/" + selectedImage["public_id"] + ".jpg";
}

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
console.log(projectImages)
const loadMorePhotos = document.getElementById("load_more");
const initialNumberPhotos = 11;
let photoIndex = initialNumberPhotos;
const photoContainer = document.getElementById("photos__container")

// console.log(projectImages[0].children[0].src);

for (let image of projectImages) {
  if (image.id !== "load_more") {
    image.addEventListener("click", e => {
      const imageURL = e.target.getAttribute("data-fullscale");
      console.log(imageURL);
      createAndAddModal(imageURL);
    })
  }
}

function createPhotoElement(index) {
  const photoBtn = document.createElement("button");
  photoBtn.className = "projects__item";

  const photoImage = document.createElement("img");
  photoImage.className = "project__image";
  photoImage.setAttribute("src", grabImage(index, "w_320"));
  photoImage.setAttribute("data-fullscale", grabImage(index, ""));

  photoBtn.appendChild(photoImage);

  photoBtn.addEventListener("click", e => {
    const imageURL = e.target.getAttribute("data-fullscale");
    console.log(imageURL);
    createAndAddModal(imageURL);
  })

  return photoBtn;
}

function addPhotoRow() {
  for (let i = 0; i < 100; i++) {
    if (photoIndex < imagesJSON["resources"].length) {
      photoContainer.appendChild(createPhotoElement(photoIndex))
      photoIndex += 1;
    } else {
      loadMorePhotos.toggleAttribute("hidden")
    }
  }
}

loadMorePhotos.addEventListener("click", addPhotoRow);

const photoModal = document.getElementById("photos__modal");

function createAndAddModal(imageURL) {
  const modalImage = document.createElement("img");
  modalImage.className = "modal__image";
  modalImage.setAttribute("src", imageURL);


  // NEED TO SORT BUTTON
  
  const closeModalButton = document.createElement("btn");
  closeModalButton.innerText = "X";
  closeModalButton.className = "closeModalBtn";
  closeModalButton.addEventListener("click", modalClose);
  photoModal.toggleAttribute("hidden");

  photoModal.appendChild(modalImage);
  photoModal.appendChild(closeModalButton);

}

function modalClose() {
  photoModal.innerHTML = "";
  photoModal.toggleAttribute("hidden");
}

photoModal.addEventListener("click", modalClose)

// resize event
// store section heights
// use switch, compare, set colour