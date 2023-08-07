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