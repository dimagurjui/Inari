<!--Include header layout-->
{{ include('layouts.header') }}

 <div class="container">

     <div class="panel panel-default">
         <!-- Default panel contents -->
         <div class="panel-heading text-center" >Your Profile</div>
         <div class="panel-body">
             <p>Hello dear {{ first_name }} {{ last_name }}, this is your profile, here you can manage your articles.</p>
         </div>

         <!-- List group -->
         <ul class="list-group">
             <li class="list-group-item">Your First Name: {{ first_name }}</li>
             <li class="list-group-item">Your Last Name: {{ last_name }}</li>
             <li class="list-group-item">Your User Name: {{ user_name }}</li>
             <li class="list-group-item">Your Email: {{ email }}</li>
             <a class="list-group-item active text-center"  href="/newarticle">Add Article</a>
         </ul>
     </div>

     {{ foreach articles as article }}

     <div class="panel  panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">
                 <a href="/articles/{{ article['slug'] }}">{{ article['title'] }}</a>
                 <a href="/delete/{{ article['slug'] }}">
                         <button class="btn btn-danger btn-xs pull-right" type="button">Delete</button>
                 </a>
             </h3>
         </div>
         <div class="panel-body">
             {{ str_limit( article['body'], 2000 ) }}
         </div>
         <div class="panel-footer">
             {{ article['date'] }}
         </div>
     </div>

     {{ endforeach }}

</div>

<!--Include footer layout-->
{{ include('layouts.footer') }}