<form id="form_signin" action="" method="post" style="display: none">
    <div class="container-fluid row m-0">
        <label for="email1"><b>email</b></label>
        <input type="text" placeholder="Enter email" name="email1" id="email1" required>
        <label id="labelPass1" for="psw1"><b>Password</b></label>
        <input id="inputPass1" type="password" placeholder="Enter Password" name="psw1" required>
        <label id="labelPass2" for="psw2"><b>Password</b></label>
        <input id="inputPass2" type="password" placeholder="Enter Password again" name="psw2" required>
        <button type="button" class="btn col-md-8 btn-outline-dark" onclick="signin()">Sign in</button>
        <button type="button" class="btn col-md-4 btn-outline-dark" onclick="turnOnLoginForm()">Login</button>
      </div>
</form>
