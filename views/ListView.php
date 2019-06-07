<body>
    <div class="main-container">
        <h1> All our Jeans </h1>

        <p> Ordered By <?= ucwords(strtolower($filter)) ?>.</p>
        <form method="POST" id="select-articles-list">
            <button name="title-ASC" type="submit"> Name </button>
            <button name="title-DESC" type="submit"> Reverse Name </button>
            <button name="price-ASC" type="submit"> Price </button>
            <button name="price-DESC" type="submit"> Reverse Price </button>
            <button name="category" type="submit"> Type </button>
        </form>

        <div class="list-container">
            <?php
                foreach($data as $article)
                {
                    ?>
                    <div class="article-list-item">
                        <a class="article-list-link" href="<?= 'article/' . $article->getTitle() ?>"> <img class="list-pictures" src="public/articles/<?= $article->getTitle() ?>_face.jpeg">
                        <p class="article-picture-description">  <?= ucwords(str_replace("-", " ", $article->getTitle())) . "<br>" . $article->getPrice() . "€" ?> </p></a>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>