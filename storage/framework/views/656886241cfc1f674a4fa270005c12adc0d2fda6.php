<!DOCTYPE html>
<html lang="pt-br">
<html>
    <head>
        <meta charset="UTF-8">
        <title>Investindo</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/stylesheet.css')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
        <script src="https://kit.fontawesome.com/fdf205482b.js"></script>
        <?php echo $__env->yieldContent('css-view'); ?>
    </head>

    <body>
        <?php echo $__env->make('templates.menu-lateral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('conteudo-view'); ?>
        <?php echo $__env->yieldContent('js-view'); ?>

    </body>

</html>
<?php /**PATH /var/www/projeto-investimento/resources/views/templates/master.blade.php ENDPATH**/ ?>