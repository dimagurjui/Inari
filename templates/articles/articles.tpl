<!--Include header layout-->
{{ include('layouts.header') }}

 <div class="container">
        
    {{ foreach articles as article }}

    <div class="panel  panel-default">
       <div class="panel-heading">
          <h3 class="panel-title"><a href="/articles/{{ article['slug'] }}">{{ article['title'] }}</a></h3>
       </div>
       <div class="panel-body">
          {{ str_limit( article['body'], 2000 ) }}
       </div>
       <div class="panel-footer">
          {{ article['date'] }}, {{ article['author'] }}
       </div>
    </div>

    {{ endforeach }}
            
</div>

<!--Include footer layout-->
{{ include('layouts.footer') }}
