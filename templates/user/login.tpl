<!--Include header layout-->
{{ include('layouts.header') }}

 <div class="container">
     <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="alert alert-danger" role="alert" {{ visibility }} >{{ error }}</div>
            <form name="login-form" method="post">
             <label>Email:</label>
             <input name="email" class="form-control">
             <label>Password:</label>
             <input type="password" name="pswd" class="form-control">
             <br>
             <input type="submit" value="Login" class="btn btn-primary form-control">
             </form>
        </div>
    </div>
</div>
<br>

<!--Include footer layout-->
{{ include('layouts.footer') }}
