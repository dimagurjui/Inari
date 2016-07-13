<!--Include header layout-->
{{ include('layouts.header') }}

<div class="container text-center">

     <h1>Inari say hello!</h1>
     <p>Welcome to my project for summer practice. <br>
        This site runs on my MVC framework written on PHP.</p>

    <br>

     <div class="row">

         {{ foreach articles as article }}

             <div class="col-sm-6 col-md-4">
                 <div class="thumbnail">

                     <div class="caption">
                         <h3><a href="/articles/{{ article['slug'] }}">{{ article['title'] }}</a></h3>
                         <p>{{ str_limit( article['body'], 750 ) }}</p>
                     </div>

                 </div>
             </div>

         {{ endforeach }}

     </div>

</div>

<!--Include footer layout-->
{{ include('layouts.footer') }}
