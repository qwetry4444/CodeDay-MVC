<?php 
require_once __DIR__.'/../components/start.php';

/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
$user = $auth->user();
?>

<div class="container profile">
    <div class="head">
        <h1>Profile</h1>
    </div>
    <div class="data">
        <div class="row">
            <h2 class="username">Username : <?php echo $user->name() ?></h2>
        </div>
        <div class="row">
            <h3 class="email">Email : <?php echo $user->email() ?></h3>
        </div>
        <div class="row">
            <h3 class="gender">Gender : <?php echo $user->gender() ?></h3>
        </div>
        <div class="row">
            <h3 class="preferred_pl">Preferred programming language : <?php echo $user->preferred_pl() ?></h3>
        </div>
        <div class="row">
            <h3 class="phone_number">Phone number : <?php echo $user->phone_number() ?></h3>
        </div>
        <div class="row">
            <h3 class="birthday">Birthday : <?php echo $user->birthday() ?></h3>
        </div>
    </div>
</div>

<?php
require_once __DIR__.'/../components/end.php';
?>