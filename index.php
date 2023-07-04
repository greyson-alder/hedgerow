<?php //SETUP

    $img_url = "https://images.unsplash.com/photo-1664513291148-4ff5b1d58566?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx";
    $allImages = file_get_contents("image_catalogue.json");
    $images = json_decode($allImages, true)["resources"];
    $photosNumber = 9;

    // var_dump($images[0]["secure_url"]);

    // $dir = new DirectoryIterator("D:\Libraries\Desktop\website\images/");
    // foreach ($dir as $fileinfo) {
    //     if (!$fileinfo->isDot()) {
    //         array_push($images, $fileinfo->getFilename());
    //     }
    // }

    shuffle($images);

    function grabImage($image, $params)
    {
        $parameters = $params ? "$params/" : "";
        return "https://res.cloudinary.com/dvbiqses3/image/upload/" . ($parameters) . "v" . $image["version"] . "/" . $image["public_id"] . ".jpg";
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
                <li class="nav__item"><a href="#projects">Gallery</a></li>
                <li class="nav__item"><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="contentGrid">

        <section id="primary">
            <div id="imageGrid__container">
                <section id="imageGrid">

                    <article id="infoBox" class='box' style="
                        --grid-column: <?= rand(2, 8) ?>;
                        --grid-row: <?= rand(2, 6) ?>;
                    ">
                        <img class='box__img' src='./main.jpg'>
                        <h1>Hedgerow</h1>
                    </article>

                    <?php
                    for ($i = 0; $i < 86; $i++) {
                        $chanceInt = rand(1, 100);
                        $white = rand(1, 100);
                        $chanceHidden = rand(1, 100);
                        echo "<article class='box", ($chanceInt < 20) ? " twoByTwo" : "", ($chanceHidden < 30) ? " hidden" : "",
                        "'> 
                                <img 
                                    class='box__img' 
                                    src='" . grabImage($images[$i], "w_320") . "'
                                    style='--fade-delay: " . random_int(1, 400) / 100 . "'
                                />
                            </article>";
                    } ?>
                </section>
            </div>
        </section>


        <section id="bio">
            <div class="diagonal">
                <article class="bio__content content flex_row">
                    <div class="bio__left">
                        <img src="./images/self.png" />
                    </div>
                    <div class="bio__right">
                        <h2>Hello!</h2>
                        <p>
                            Welcome to my site Hedgerow. My name is Greyson Alder and I built this site, as a home for my photography, using PHP and JavaScript. Below is an interactive gallery should you wish to see any images in full resolution.
                        </p>
                        <h3>Proficiencies:</h3>
                        <ul>
                            <li>HTML, CSS & JavaScript</li>
                            <li>React & NextJS</li>
                            <li>PHP</li>
                            <li>Java, Spring (Boot)</li>
                            <li>SQL, postgreSQL</li>
                            <li>C# (from experience with the Godot & Unity game engines)</li>
                            <li>Pokémon</li>
                            <li>Hugs</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>


        <!-- bug: clicking the outer bounds of the images doesn't grab the image-->
        <section id="projects">
            <article class="projects__content content">
                <div class="projects__photos">
                    <div class="projects__info">
                        <h2>Gallery</h2>
                        <!-- <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate a lacus ac iaculis. Mauris magna lectus, condimentum a feugiat vitae, tempor at nunc.
                        </p> -->
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
            </article>
        </section>


        <section id="contact">
            <div class="diagonal">
                <div class="contact__content content">
                    <h2>Why <i>"Hedgerow"?</i></h2>
                    <p>Having grown up in the Highlands in Scotland surrounded by environmental initiatives like the Cairngorn National Park Junior Ranger program and EcoSchools, the natural environment is at the core of everything I do. Did you know that the vast majority of British birds find their home in hedgerows about the country and yet, largely due to the industrialisation of farming across the last century, we are rapidly losing our hedges?</p>
                    <h2 class="margin-top">Quick note on my name</h2>
                    <p>I have recently moved away from using my given name <b>Iain Sandison</b> purely due to personal preference. Nothing else has changed and I'm still close with my family</p>
                    <h2 class="margin-top">Contact & Additional Links</h2>
                    <ul class="contact__otherProjects">
                        <li class="externalLink"><a href="https://codepen.io/iain-sandison">CodePen</a></li>
                        <li class="externalLink"><a href="https://github.com/greyson-alder">GitHub</a></li>
                    </ul>
                    <h3 class="margin-top">
                        The easiest way to contact me is via email or LinkedIn:
                    </h3>
                    <ul class="contact__links">
                        <li class="contact__email externalLink"><a href="mailto:iain.sandison.mousa@gmail.com">iain.sandison.mousa@gmail.com</a></li>
                        <li class="contact__linkedIn externalLink"><a href="https://www.linkedin.com/in/iain-sandison/">LinkedIn</a></li>
                    </ul>
                    <a href="#" class="bottom__toTop">Back to top</a>
                </div>
            </div>
        </section>

    </div>


    <section id="photos__modal" hidden>
        <div id="modal__inner">

        </div>
        <!-- <img class="modal__image" src="https://res.cloudinary.com/dvbiqses3/image/upload//v1667249092/IMG_20181126_120354_381_dtv0mb.jpg"/> -->
    </section>
</body>

</html>