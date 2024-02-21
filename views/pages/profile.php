<?php 
    session_start(["use_strict_mode" => true]);
    require '../connect.php';
    $db_conn = connect();
    $sql = 'SELECT * FROM "CodeDay".users WHERE id = %s';
    $sql = sprintf($sql, $_SESSION['user_id']);
    $result_query = pg_query($db_conn, $sql);
    $user = pg_fetch_array($result_query);
    // print_r($user);
?>

<div class="container profile">
    <div class="head">
        <h1>Profile</h1>
    </div>
    <div class="data">
        <div class="row">
            <h2 class="username">Username : <?php echo $user['name']?></h2>
        </div>
        <div class="row">
            <h3 class="email">Email : <?php echo $user['email']?></h3>
        </div>
        <div class="row">
            <h3 class="gender">Gender : <?php echo $user['gender']?></h3>
        </div>
        <div class="row">
            <h3 class="preferred_pl">Preferred programming language : <?php echo $user['preferred_pl']?></h3>
        </div>
        <div class="row">
            <h3 class="phone_number">Phone number : <?php echo $user['phone_number']?></h3>
        </div>
        <div class="row">
            <h3 class="birthday">Birthday : <?php echo $user['birthday']?></h3>
        </div>
    </div>
</div>
