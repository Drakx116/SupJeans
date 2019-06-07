
<body>
    <div class="main-container">
        <?php
            foreach($data as $article)
            {
                $pic = array(
                    "face" => "../public/articles/" . $article->getTitle() . "_face.jpeg",
                    "profile" => "../public/articles/" . $article->getTitle() . "_profile.jpeg",
                    "quarter" => "../public/articles/" . $article->getTitle() . "_quarter.jpeg"
                );


                // $pic = "../public/articles/" . $article->getTitle() . "_face.jpeg";
                ?>

                <div class="article-container">
                    <div class="article-infos-container">
                        <h1 class="article-title"> <?= ucwords(str_replace("-", " ", $article->getTitle())) ?> </h1>

                        <form class="form-cart" action="" method="POST">
                            <input hidden name="price" value="<?= $article->getPrice() ?>">
                            <label id="category-name">Price : <span id="price"><?= $article->getPrice() ?> € </span></label>

                            <label id="category-name"> Size :  </label>
                            <div class="size-picker">
                                <?php foreach(unserialize($article->getSize()) as $size)
                                { ?>
                                    <div class="size-picker-content">
                                        <input type="radio" name="size_select" required id="<?= strtolower($size) ?>" value="<?= strtolower($size) ?>">
                                        <label for="<?= strtolower($size) ?>"><?= $size ?></label>
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <div class="cart-submit">
                                <input type="submit" name="validate-add-cart" value="Add to cart">
                            </div>
                        </form>
                    </div>

                    <div class="article-image-container">
                        <img class="article-picture" src="<?= $pic["face"] ?>">
                        <div class="article-buttons">
                            <img src="<?= $pic["face"] ?>" class="select-picture" name="face">
                            <img src="<?= $pic["profile"] ?>" class="select-picture" name="profile">
                            <img src="<?= $pic["quarter"] ?>" class="select-picture" name="quarter">
                        </div>
                    </div>
                </div>


                <?php
            }
        ?>
    </div>
</body>