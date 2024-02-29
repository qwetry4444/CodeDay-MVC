<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Http\RequestInterface $request
 */
?>

<?php $view->component('start'); ?>

<section>
    <div class="form-box">
        <div class="form-value">
            <form method="post" action="/register">
                <h2>Registration</h2>
                <div class="input-box">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="name" required value=<?php echo $request->getFromCookie('name') ?>>
                    <label for="">Username</label>
                </div>  
                <div class="input-box">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="email" name="email" required value=<?php echo $request->getFromCookie('email') ?>>
                    <label for="">Email</label>
                </div> 
                <div class="input-box">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="phone_number" required value=<?php echo $request->getFromCookie('phone_number') ?>>
                    <label for="">Phone number</label>
                </div> 
                <div class="input-box"> 
                    <select name="gender">
                        <option value="0" <?php echo ($request->getFromCookie('gender') === '0') ? 'selected' : ''?>>Man</option>
                        <option value="1" <?php echo ($request->getFromCookie('gender') === '1') ? 'selected' : ''?>>Woman</option>
                    </select>
                    <label for="">Gender</label>
                </div> 
                <div class="input-box">
                    <select name="preferred_pl">
                        <option value="0" <?php echo ($request->getFromCookie('preferred_pl') === '0') ? 'selected' : ''?>>C</option>
                        <option value="1" <?php echo ($request->getFromCookie('preferred_pl') === '1') ? 'selected' : ''?>>C++</option>
                        <option value="2" <?php echo ($request->getFromCookie('preferred_pl') === '2') ? 'selected' : ''?>>C#</option>
                    </select>
                    <label for="">Preferred programming language</label>
                </div> 
                <div class="input-box">
                    <input type="date" name="birthday" value=<?php echo ($request->getFromCookie('birthday'))?> >
                    <label for="">Birtday</label>
                </div> 
                <div class="input-box">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                
                <button type="submit">Register</button>
                <div class="register">
                    <p>Already have an account? </p><a href="/login">Log in</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php $view->component('end'); ?>
