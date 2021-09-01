<!doctype html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            echo $this->Html->meta('ufc_logo.png','img/ufc_logo.png',array('type' => 'icon'));
        ?>
        <title>UFC Rankings | TOP 15</title>
        <?php
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('bootstrap-datepicker.css');
            echo $this->Html->css('main.css');
        ?>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 shadow">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <?php echo $this->Html->image('ufc_logo.png', array('class' => 'd-inline-block align-text-top ufc-logo')) ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <?php echo $this->Html->link('Lutadores', '/lutadors', array('class' => 'nav-link fs-5')); ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link('Categorias', '/categorias', array('class' => 'nav-link fs-5')); ?>
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
        <footer class="text-center">
            <div class="container p-3 d-flex justify-content-center align-items-center flex-column">
                <span>© 2021 Copyright UFC. Todos os direitos reservados.</span>
            </div>
        </footer>
        <?php
            echo $this->Html->script('jquery-3.6.0.min.js');
            echo $this->Html->script('bootstrap.bundle.min.js');
            echo $this->Js->writeBuffer();
        ?>
    </body>
</html>