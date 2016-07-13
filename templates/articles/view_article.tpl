<!--Include header layout-->
{{ include('layouts.header') }}

 <div class="container">

     <div class="panel  panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">{{ title }}</a></h3>
         </div>
         <div class="panel-body">
             {{ body }}
         </div>
         <div class="panel-footer">
             {{ date }}, {{ author }}
         </div>
     </div>

</div>

<!--Include footer layout-->
{{ include('layouts.footer') }}