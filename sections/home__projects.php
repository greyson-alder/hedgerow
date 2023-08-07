<section id="projects" class="projects">
    <div class="bottom__diagonal">
        <article class="projects__content content">
            <div class="projects__photos">
                <div class="projects__info">
                    <h2>Gallery</h2>
                </div>
                <div id="photos__container" class="photos__container">
                    <?php
                    for ($i = 0; $i < $photosNumber; $i++) {
                        echo
                        '<button class="projects__item" data-fullscale="' . grabImage($images[$i], "") . '">
                            <img 
                                class="project__image" 
                                src="' . grabImage($images[$i], "w_320") . '" 
                            />
                        </button>';
                    } ?>
                    <button class="projects__item load_more" id="load_more">
                        <img src="/pixels/plus-circle.svg" width="48" height="48" alt="Load more images"/>
                    </button>
                </div>
            </div>
        </article>
    </div>
</section>