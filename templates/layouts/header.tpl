<!DOCTYPE html>
<html>
    <head>
        <title>Inari</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="../favicon.png" type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-education"></span> Dima Gurjui</a>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>

                    {{ loged }}
                    <li><a href="/profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                    {{ %loged }}

                    <li><a href="/articles">Articles</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">

                    {{ notloged }}
                        <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    {{ %notloged }}

                    {{ loged }}
                        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    {{ %loged }}

                </ul>
            </div>

        </div>
    </nav>