<?php //SETUP
        $img_url = "https://images.unsplash.com/photo-1664513291148-4ff5b1d58566?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx";

        $allImages = file_get_contents("image_catalogue.json");

        $images = json_decode($allImages, true)["resources"];

        $photosNumber = 11;

        // var_dump($images[0]["secure_url"]);

        // $dir = new DirectoryIterator("D:\Libraries\Desktop\website\images/");
        // foreach ($dir as $fileinfo) {
        //     if (!$fileinfo->isDot()) {
        //         array_push($images, $fileinfo->getFilename());
        //     }
        // }

        shuffle($images);

        function grabImage($image, $params) {
            return "https://res.cloudinary.com/dvbiqses3/image/upload/".$params."/v".$image["version"]."/".$image["public_id"].".jpg";
        }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hedgerow</title>
    <script type="module" src="app.js" defer></script>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <script>
        window.allImages = JSON.parse(`<?php echo $allImages; ?>`)
    </script>

</head>
<body>

    <header id="header" data--detached="false">
        <h1 class="header__title"><a href="#">Hedgerow</a></h1>
        <nav class="header__nav">
            <ul class="nav__list">
                <li class="nav__item"><a href="#bio">Me</a></li>
                <li class="nav__item"><a href="#projects">Photos</a></li>
                <li class="nav__item"><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>


    <section id="primary">
        <div id="imageGrid__container">
            <section id="imageGrid">

                <article id="infoBox" class='box' style="
                    --grid-column: <?= rand(2, 8) ?>;
                    --grid-row: <?=  rand(2, 6) ?>;
                ">
                    <img class='box__img' src='./main.jpg'>
                    <h1>Hedgerow</h1>
                </article>

                <?php 
                for ($i = 0; $i < 86; $i++) {
                    $chanceInt = rand(1, 100);
                    $white = rand(1, 100);  
                    $chanceHidden = rand(1, 100);
                    echo "<article class='box" , 
                    ($chanceInt < 20) ? " twoByTwo" : "" , 
                    ($chanceHidden < 30) ? " hidden" : "" , 
                    "'> 
                            <img 
                                class='box__img' 
                                src='" . grabImage($images[$i], "w_320") . "'
                                style='--fade-delay: " . random_int(1, 4). "'
                            />
                        </article>";
                } ?>
            </section>
        </div>
    </section>


    <section id="bio">
        <article class="bio__content content flex_row">
            <div class="bio__left">
                <img src="./images/self.png" />
            </div>
            <div class="bio__right">
                <h2>Hello!</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate a lacus ac iaculis. Mauris magna lectus, condimentum a feugiat vitae, tempor at nunc. Pellentesque faucibus, diam et mattis pharetra, mi quam elementum neque, et dictum purus arcu eget justo. Donec sollicitudin ornare mauris ac cursus. Aenean lacus tellus, elementum vel est ut, lobortis ornare enim. Ut feugiat sem eu venenatis placerat. Vestibulum fringilla mauris et tortor euismod tristique. Integer sagittis enim velit, sit amet congue ipsum consequat sit amet. Integer quis cursus arcu.
                </p>
            </div>
        </article>
    </section>

    <section id="projects">
        <article class="projects__content content">
            <div class="projects__photos">
                <div class="projects__info">
                    <h2>Photos</h2>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate a lacus ac iaculis. Mauris magna lectus, condimentum a feugiat vitae, tempor at nunc.
                    </p>div
                </div>
                <div id="photos__container">
                    <?php 
                    for ($i = 0; $i < $photosNumber; $i++) {
                        echo
                        '<button class="projects__item">
                            <img 
                                class="project__image" 
                                src="' . grabImage($images[$i], "w_320") . '" 
                                data-fullscale="' . grabImage($images[$i], "") . '"
                            />
                        </button>';
                    } ?>
                    <button class="projects__item" id="load_more">Load more images</button>
                </div>
            </div>
            <!-- <div class="projects__code">
                <div class="projects__info">
                    <h2>#code</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate a lacus ac iaculis. Mauris magna lectus, condimentum a feugiat vitae, tempor at nunc.
                    </p>
                </div>
                <div class="projects__flexboxes">
                    <div class="projects__item"></div>
                    <div class="projects__item"></div>
                    <div class="projects__item"></div>
                    <div class="projects__item"></div>
                </div>
            </div> -->
        </article>
    </section>


    <section id="contact">
        <div class="contact__content content">
            <h2>Contact</h2>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate a lacus ac iaculis. Mauris magna lectus, condimentum a feugiat vitae, tempor at nunc. Pellentesque faucibus, diam et mattis pharetra, mi quam elementum neque, et dictum purus arcu eget justo. Donec sollicitudin ornare mauris ac cursus. Aenean lacus tellus, elementum vel est ut, lobortis ornare enim. Ut feugiat sem eu venenatis placerat.
            </p>
            <a href="#" class="bottom__toTop">Back to top</a>      
        </div>
    </section>


    <section id="photos__modal" hidden>
        <!-- <img class="modal__image" src="https://res.cloudinary.com/dvbiqses3/image/upload//v1667249092/IMG_20181126_120354_381_dtv0mb.jpg"/> -->
    </section>
</body>
</html>