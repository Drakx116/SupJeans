<body>
    <div class="main-container" id="search-container">
        <h1> Do you need something ? </h1>

        <form action="<?= URL ?>search" method="POST" class="navbar-form">
            <input type="text" name="search" placeholder="Search ..." required value="<?php

            ?>">
            <button type="submit" name="validateSearch"><i class='fas fa-search'></i></button>
        </form>

        <p>
            <?php
                if(isset($data))
                {
                    foreach($data as $article)
                    {
                        if($article)
                        {
                            $url = explode("/", filter_var($_GET["action"], FILTER_SANITIZE_URL));
                            ?>
                            <p> <?= count($article) ?> Results for <?= ucwords($url[1]) ?> </p> <?php
                        }
                        else
                        {
                          ?> <p> Pas de correspondance avec la base de données. </p> <?php
                        }
                    }
                }
            ?>
        </p>
        <div class="search-article">
        <?php

            {
                if(isset($article))
                {
                    for($i = 0; $i < count($article); $i++)
                    {
                        ?>
                        <div class="article-list-item">
                            <a class="article-list-link" href="<?= '../article/' . $article[$i]->getTitle() ?>">
                                <img class="list-pictures" src="../public/articles/<?= $article[$i]->getTitle() ?>_face.jpeg">
                                <p class="article-picture-description">  <?= ucwords(str_replace("-", " ", $article[$i]->getTitle())) ?> </p>
                            </a>
                        </div>
                        <?php
                    }
                }
            }
            // <?php if(isset($_POST["search"])) { echo htmlspecialchars($_POST["search"]); }
        ?>
        </div>
    </div>
</body>