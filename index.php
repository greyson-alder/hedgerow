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
        window.allImages = <?php echo json_encode($images); ?>
    </script>

    <meta name="author" content="Greyson Alder">
    <meta name="description" content="Hedgerow is a home for Greyson Alder's photography and contact information">
    <meta property="og:image" content="https://res.cloudinary.com/dvbiqses3/image/upload/w_1200/v1689174625/hedgerow/IMG_20180926_234203_726_jynxxb.jpg" />
    <meta propery="og:title" content="Hedgerow"/> 
    <meta property="og:description" content="Hedgerow is a home for Greyson Alder's photography and contact information"/>

</head>

<body>

    <?php include "sections/header.php"; ?>

    <div id="contentGrid" class="contentGrid">

        <?php include "sections/home__primary.php"; ?>

        <?php include "sections/home__bio.php"; ?>

        <?php include "sections/home__projects.php"; ?>

        <section id="breaker" class="breaker">
            <div class="bottom__diagonal">
                <img class="breaker__image" src="https://res.cloudinary.com/dvbiqses3/image/upload/v1689174405/hedgerow/IMG_20190101_144827e1_qbfvwc.jpg"/>
            </div>
        </section>

        <?php include "sections/home__contact.php"; ?>

    </div>

    <section id="photos__modal" class="photos__modal" hidden>
        <div id="modal__inner" class="modal__inner">

        </div>
    </section>
    
</body>

</html>