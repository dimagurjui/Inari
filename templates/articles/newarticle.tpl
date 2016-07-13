<!--Include header layout-->
{{ include('layouts.header') }}
 <br>
 <div class="container">
        
     <form method="post">
         <div class="alert alert-danger" role="alert" {{ visibility }} >{{ error }}</div>
         <label>Title:</label>
         <input name="title" class="form-control"><br>
         <label>Body:</label>
         <textarea name="body" class="form-control" rows="12"></textarea>
         <br>
         <input type="submit" class="btn btn-primary form-control">
     </form>
            
</div>
<br>

<!--Include footer layout-->
{{ include('layouts.footer') }}
