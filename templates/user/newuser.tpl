<!--Include header layout-->
{{ include('layouts.header') }}

 <div class="container">
     <div class="row">
         <div class="col-sm-6 col-sm-offset-3">
             <div class="form-group">
                 <form name="signup-form" method="post">
                     <div class="alert alert-danger" role="alert" {{ fnm_error_v }}>{{ fnm_error }}</div>
                     <label>First Name:</label>
                     <input name="fnm" class="form-control" value="{{ fnm }}"><br>
                     <div class="alert alert-danger" role="alert" {{ lnm_error_v }}>{{ lnm_error }}</div>
                     <label>Last Name:</label>
                     <input name="lnm" class="form-control" value="{{ lnm }}"><br>
                     <div class="alert alert-danger" role="alert" {{ unm_error_v }}>{{ unm_error }}</div>
                     <label>User Name:</label>
                     <input name="unm" class="form-control" value="{{ unm }}"><br>
                     <div class="alert alert-danger" role="alert" {{ email_error_v }}>{{ email_error }}</div>
                     <label>Email:</label>
                     <input name="email" class="form-control" value="{{ email }}"><br>
                     <div class="alert alert-danger" role="alert" {{ pswd_error_v }}>{{ pswd_error }}</div>
                     <label>Password:</label>
                     <input name="pswd" class="form-control"><br>
                     <label>Retype Password:</label>
                     <input name="pswdr" class="form-control">
                     <br>
                     <input type="submit" class="btn btn-primary form-control">
                 </form>
             </div>
         </div>
     </div>
</div>
<br>

<!--Include footer layout-->
{{ include('layouts.footer') }}
