<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>UFC | Rankings TOP 15</title>
        <?php 
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('main.css');
        ?>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 shadow">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="../assets/images/ufc_logo.png" alt="" class="d-inline-block align-text-top ufc-logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active header-links" aria-current="page" href="#">Rankings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link header-links" href="#">Notícias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link header-links" href="#">Eventos</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main role="main" class="container" id="content"> 
            <?php 
                echo $this->Flash->render(); 
                echo $this->fetch('content');
            ?>
        </main>
        <?php
            echo $this->Html->script('jquery-3.6.0.min.js');
            echo $this->Html->script('bootstrap.bundle.min.js');
            echo $this->Js->writeBuffer();
        ?>
    </body>
</html>