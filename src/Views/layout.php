<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Citools:Auth</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap-4.3.1.min.css">
    <style>
        body {
            padding-top: 5rem;
        }
    </style>
    
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

<?= view('Citools\Auth\Views\_navbar') ?>

<main role="main" class="container">
	<?= $this->renderSection('main') ?>
</main><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/static/jquery/js/jquery-3.3.1.slim.min.js"></script>
<script src="/static/popper/js/popper-1.14.7.min.js"></script>
<script src="/static/bootstrap/js/bootstrap-4.3.1.min.js"></script>

<?= $this->renderSection('pageScripts') ?>
</body>
</html>
