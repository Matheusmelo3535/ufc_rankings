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
                            <li class="nav-item">
                                <?= $this->Html->link('Usuarios', '/usuarios', array('class' => 'nav-link fs-5')); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <?php echo $this->Html->image('ufc-banner.jpg', array('class' => 'd-block w-100 img-carousel')) ?>
                    <div class="carousel-caption d-md-block">
                        <h1>Dobronx vs Chandler</h1>
                        <h2>UFC 262</h2>
                        <h3>Confira nesse sabádo 15/05 </h3>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <?php echo $this->Html->image('ufc-venum.jpg', array('class' => 'd-block w-100 img-carousel')) ?>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
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
            echo $this->Html->script('bootstrap-datepicker.min.js');
            echo $this->Html->script('bootstrap-datepicker.pt-BR.min.js');
            echo $this->Html->script('datePickerConfigView.js');
            echo $this->Js->writeBuffer();
        ?>
        <!-- <script>
                $(document).ready(function () {
                    $('#link-18').on('click', function (event) {
                        event.preventDefault();
                        $.ajax({
                            type: 'get',
                            url: '/rankings/lutadors/view/18',
                            success: function(content) {
                                $('#content').html(content);
                            }
                        });
                    });
                });
            </script> -->
    </body>
</html>