<nav id="principal">
    <ul>
        <li>
            <a href="<?php echo e(route('user.index')); ?>">
                <i class="fas fa-address-book"></i>
                <h3>Usuários</h3>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('instituition.index')); ?>">
                <i class="fas fa-building"></i>
                <h3>Instituições</h3>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('group.index')); ?>">
                <i class="fas fa-users"></i>
                <h3>Grupos</h3>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('moviment.application')); ?>">
                <i class="far fa-money-bill-alt"></i>
                <h3>Investir</h3>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('moviment.index')); ?>">
                <i class="fas fa-dollar-sign"></i>
                <h3>Aplicações</h3>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('moviment.all')); ?>">
                <i class="fas fa-dollar-sign"></i>
                <h3>Extrato</h3>
            </a>
        </li>
    <ul>
</nav>
<?php /**PATH /var/www/projeto-investimento/resources/views/templates/menu-lateral.blade.php ENDPATH**/ ?>