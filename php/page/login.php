<form id="form_login" action="action_page.php" method="post" >
    <div class="container-fluid row m-0">
        <label for="email"><b>email</b></label>
        <input type="text" placeholder="Enter email" name="email" id="email" required>
        <label id="labelPass" for="psw"><b>Password</b></label>
        <input id="inputPass" type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit" class="btn col-md-8 btn-outline-dark" onclick="login()">Login</button>
        <button type="button" class="btn col-md-4 btn-outline-dark" onclick="turnOnSigninForm()">Sign in</button>
    </div>
</form>
