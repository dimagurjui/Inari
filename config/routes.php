<?php

return array(
    'articles/([a-z0-9]+)' => 'article/view/$1',            // actionView in ArticleController
    'delete/([a-z0-9]+)' => 'article/delete/$1',            // actionDelete in ArticleController
    'profile' => 'user/view',                               // actionView in UserController
    'newarticle' => 'article/create',                       // actionCreate in ArticleController
    'register' => 'user/register',                          // actionRegister in UserController
    'login' => 'user/login',                                // actionLogin in UserController
    'logout' => 'user/logout',                              // actionLogout in UserController
    'articles' => 'article/index',                          // actionIndex in ArticleController
    '' => 'page/index',                                     // actionIndex in PageController
    '(.+)' => 'page/error'                                  // actionError in PageController
);