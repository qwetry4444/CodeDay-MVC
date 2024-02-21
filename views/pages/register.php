<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post" action="../auth.php">
                    <h2>Registration</h2>
                    <div class="input-box">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="login" required>
                        <label for="">Username</label>
                    </div>  
                    <div class="input-box">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>  
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remeber me</label>
                        <a href="#">Forget Password</a>
                    </div>
                    <button type="submit">Log in</button>
                    <div class="register">
                        <p>Don't have a account? </p><a href="#">Register</a>
                    </div>
                    <div class="status">
                        <?php 
                        session_start(["use_strict_mode" => true]);
                        if(isset($_SESSION['message']))
                            echo($_SESSION['message']);
                        ?>
                            
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>