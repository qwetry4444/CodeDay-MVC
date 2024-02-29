<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
//dd($view);
//$user = $auth->user();
//dd($auth->check());
//dd($user);
//dd($auth->sessionField());
?>


<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="/">CodeDay
                    <img src="/assets/img/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="/assets/img/list.svg" alt="Menu button" class="burger_icon">
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav menu">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/taskList" class="nav-link">Tasks</a>
                        </li> 
                        
                        
                        <?php
                        if ($auth->check()) {
                        ?>
                            <li class='nav-item'><a href='/progress' class='nav-link'>Progress</a></li>
                            <li class='nav-item'><a href='/profile' class='nav-link'> Profile </a></li>
                            <form action="/logout" method="post">
                                <button class='nav-link'><img src='/assets/img/exit.png' alt='Exit' class='exit'></button>
                            </form>
                        <?php }
                        else {
                        ?> 
                            <li class='nav-item'><a href='/login' class='nav-link'>Login</a></li>
                        <?php }?>
                    </ul>
                    
                </div>
            </div>
        </nav>
    </div>
</header>