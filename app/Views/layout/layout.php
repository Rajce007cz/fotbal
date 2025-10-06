<!Doctype html>
<html>
    <head>
        <title>Fotbal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= $this->include("layout/assets");?>
        <?= view('layout/navbar', $this->data) ?>
    </head>
    <body>
        <div class="container">
            <?=$this->renderSection("content");?>
        </div>
    </body>
</html>