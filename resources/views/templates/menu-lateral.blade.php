<nav id="principal">
    <ul>
        <li>
            <a href="{{ route('user.index')}}">
                <i class="fas fa-address-book"></i>
                <h3>Usuários</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('instituition.index') }}">
                <i class="fas fa-building"></i>
                <h3>Instituições</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('group.index') }}">
                <i class="fas fa-users"></i>
                <h3>Grupos</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('moviment.application') }}">
                <i class="far fa-money-bill-alt"></i>
                <h3>Investir</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('moviment.index') }}">
                <i class="fas fa-dollar-sign"></i>
                <h3>Aplicações</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('moviment.all') }}">
                <i class="fas fa-dollar-sign"></i>
                <h3>Extrato</h3>
            </a>
        </li>
    <ul>
</nav>
