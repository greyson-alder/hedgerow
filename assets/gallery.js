// GALLERY SECTION INCLUDING MODALS

const gallery = () => {
    const imagesJSON = window.allImages;

    function grabImage(index, params) {
        const selectedImage = imagesJSON[index];
        return (
            "https://res.cloudinary.com/dvbiqses3/image/upload" +
            (params ? "/" : "") +
            params +
            "/v" +
            selectedImage["version"] +
            "/" +
            selectedImage["public_id"] +
            ".jpg"
        );
    }

    const projectImages = document.getElementsByClassName("projects__item");
    const loadMorePhotos = document.getElementById("load_more");
    const photoContainer = document.getElementById("photos__container");
    const photoModal = document.getElementById("photos__modal");
    const modalInner = document.getElementById("modal__inner");

    const initialNumberPhotos = 9;
    let photoIndex = initialNumberPhotos;

    // -- MODAL FUNCTIONALITY FOR INITIAL IMAGES

    for (let image of projectImages) {
        if (image.id !== "load_more") {
            image.addEventListener("click", () => {
                const imageURL = image.getAttribute("data-fullscale");
                createAndAddModal(imageURL, image.getBoundingClientRect());
            });
        }
    }

    // -- DYNAMICALLY ADD MORE IMAGES

    function createPhotoElement(index) {
        const photoBtn = document.createElement("button");
        photoBtn.className = "projects__item project__item--added";
        photoBtn.style.setProperty("--animation_delay", getRandomInt(10, 20)/10+"s")

        const photoImage = document.createElement("img");
        photoImage.className = "project__image";
        photoImage.setAttribute("src", grabImage(index, "w_320"));
        photoBtn.setAttribute("data-fullscale", grabImage(index, "w_1800"));

        photoBtn.appendChild(photoImage);

        photoBtn.addEventListener("click", (e) => {
            const imageURL = photoBtn.getAttribute("data-fullscale");
            createAndAddModal(imageURL, photoBtn.getBoundingClientRect());
        });

        photoBtn.addEventListener("animationend", (e) => {if (e.animationName != "load_more_images_opacity") return; photoBtn.classList.remove("project__item--added")})

        return photoBtn;
    }

    function addPhotoRow() {
        for (let i = 0; i < 5; i++) {
            if (photoIndex < imagesJSON.length) {
                photoContainer.appendChild(createPhotoElement(photoIndex));
                photoIndex += 1;
                if (photoIndex == imagesJSON.length) {
                    loadMorePhotos.toggleAttribute("hidden");
                    break;
                }
            }
        }
    }

    loadMorePhotos.addEventListener("click", addPhotoRow);

    // -- DYNAMIC MODAL FUNCTIONALITY

    let previousFocusedElement;

    function createAndAddModal(imageURL, clickedElement) {
        previousFocusedElement = document.activeElement;

        const modalImage = document.createElement("img");
        const selectImage = imagesJSON.findIndex(
            (image) => image.secure_url == imageURL
        );
        modalImage.className = "modal__image";
        modalImage.setAttribute("src", imageURL);
        modalImage.setAttribute(
            "style",
            `
    background-image: url("` +
                imageURL +
                `"), linear-gradient(rgba(255, 255, 255, 0.66), rgba(255, 255, 255, 0.66));
  `
        );
        modalInner.appendChild(modalImage);

        const closeModalButton = document.createElement("button");
        closeModalButton.innerHTML = `<img src="/pixels/x-square.svg" width="32" height="32" alt="Close"/>`;
        closeModalButton.className = "closeModalBtn";
        closeModalButton.addEventListener("click", modalClose);
        photoModal.toggleAttribute("hidden");

        modalInner.appendChild(closeModalButton);

        closeModalButton.focus();
    }

    function modalClose() {
        photoModal.setAttribute("hidden", null);
        modalInner.innerHTML = "";
        if (previousFocusedElement) {
            previousFocusedElement.focus();
        }
    }

    photoModal.addEventListener("click", modalClose);
};


function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}


export default gallery;
