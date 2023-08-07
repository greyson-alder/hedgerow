<?php //SETUP

    $img_url = "https://images.unsplash.com/photo-1664513291148-4ff5b1d58566?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx";
    $allImages = file_get_contents("updated_images.json");
    $images = json_decode($allImages, true)["resources"];
    $photosNumber = 9;

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
    <script type="module" src="/assets/app.js" defer></script>
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="icon" href="/pixels/monstera_colour.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&display=swap" rel="stylesheet">

    <script>
        window.allImages = JSON.parse(`<?php echo $allImages; ?>`)
    </script>

    <meta name="author" content="Greyson Alder">
    <meta name="description" content="Hedgerow is a home for Greyson Alder's photography and contact information">
    <meta property="og:image" content="https://res.cloudinary.com/dvbiqses3/image/upload/w_1200/v1689174625/hedgerow/IMG_20180926_234203_726_jynxxb.jpg" />
    <meta propery="og:title" content="Hedgerow"/> 
    <meta property="og:description" content="Hedgerow is a home for Greyson Alder's photography and contact information"/>

</head>

<body>

    <header id="header" class="header" data--detached="false">
        <h1 class="header__title"><a href="#">Hedgerow</a></h1>
        <nav class="header__nav">
            <ul class="nav__list">
                <li class="nav__item"><a href="#bio">Me</a></li>
                <li class="nav__item"><a href="#projects">Gallery</a></li>
                <li class="nav__item"><a href="#breaker">Contact</a></li>
            </ul>
        </nav>
    </header>


    <div id="contentGrid" class="contentGrid">

        <section id="primary" class="primary">
            <div class="bottom__diagonal">
                <div id="imageGrid__container" class="imageGrid__container">
                    <section id="imageGrid" class="imageGrid">

                        <article id="infoBox" class='box infoBox' style="
                            --grid-column: <?= rand(2, 8) ?>;
                            --grid-row: <?= rand(2, 6) ?>;
                        ">
                            <img class='box__img' src='https://res.cloudinary.com/dvbiqses3/image/upload/v1689174625/hedgerow/IMG_20180926_234203_726_jynxxb.jpg'>
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
            </div>
        </section>


        <section id="bio" class="bio">
            <div class="bottom__diagonal">
                <article class="bio__content content flex_row">
                    <div class="bio__left">
                        <img src="./images/self.png" />
                    </div>
                    <div class="bio__right">
                        <h2>Hello!</h2>
                        <p>
                            Welcome to my site Hedgerow. My name is <b>Greyson Alder</b> and I built this site as a home for my photography, using PHP and JavaScript. Below is an interactive gallery should you wish to see any images in full resolution.
                        </p>
                        <h3>Proficiencies:</h3>
                        <ul>
                            <li>HTML, CSS & JavaScript</li>
                            <li>React & NextJS</li>
                            <li>PHP</li>
                            <li>Java, Spring (Boot)</li>
                            <li>SQL, postgreSQL</li>
                            <li>C# (with Godot & Unity)</li>
                        </ul>
                    </div>
                </article>
            </div>
        </section>


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

        <section id="breaker" class="breaker">
            <div class="bottom__diagonal">
                <img class="breaker__image" src="https://res.cloudinary.com/dvbiqses3/image/upload/v1689174405/hedgerow/IMG_20190101_144827e1_qbfvwc.jpg"/>
            </div>
        </section>

        
        <section id="contact" class="contact">
            <div class="diagonal">
                <div class="contact__left contact__content">
                    <div class="contact__left__max">
                        <h2>Why <i>"Hedgerow"?</i></h2>
                        <p>Having grown up in the Highlands in Scotland surrounded by environmental initiatives like the Cairngorn National Park Junior Ranger program and EcoSchools, the natural environment is at the core of everything I do.<br/><br/>Did you know that the vast majority of British birds find their home in hedgerows about the country and yet, largely due to the industrialisation of farming across the last century, we are rapidly losing our hedges?</p>
                        <h2 class="margin-top">Quick note on my name</h2>
                        <p>I have recently moved away from using my given name <b>Iain Sandison</b> purely due to personal preference. Nothing else has changed and I'm still close with my family</p>
                    </div>
                </div>
                <div class="contact__right contact__content">
                    <h2>Contact & Additional Links</h2>
                    <ul class="contact__otherProjects">
                        <li class="externalLink"><a href="https://codepen.io/iain-sandison" class="contact__link"><img src="/pixels/codepen.svg" height="16" width="16" alt=""/> CodePen</a></li>
                        <li class="externalLink"><a href="https://github.com/greyson-alder" class="contact__link"><img src="/pixels/github.svg" height="16" width="16" alt=""/> GitHub</a></li>
                    </ul>
                    <h3 class="margin-top">
                        The easiest way to contact me is via email or LinkedIn:
                    </h3>
                    <ul class="contact__links">
                        <li class="contact__email externalLink"><a href="mailto:iain.sandison.mousa@gmail.com" class="contact__link"><img src="/pixels/mail.svg" height="16" width="16" alt=""/> iain.sandison.mousa@gmail.com</a></li>
                        <li class="contact__linkedIn externalLink"><a href="https://www.linkedin.com/in/iain-sandison/" class="contact__link"><img src="/pixels/linkedin.svg" height="16" width="16" alt=""/> LinkedIn</a></li>
                    </ul>
                    <a href="#" class="bottom__toTop">
                        <img src="/pixels/chevrons-up.svg" width="32" height="32" alt="Back to top"/>
                    </a>
                </div>
                <div class="contact__bottom"></div>
            </div>
        </section>

    </div>


    <section id="photos__modal" class="photos__modal" hidden>
        <div id="modal__inner" class="modal__inner">

        </div>
    </section>
</body>

</html>