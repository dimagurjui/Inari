<?php

class ArticleController
{
    public function actionIndex()
    {
        $articles = Article::getArticles(30);
        
        $template = new Volpi();
        
        $template['articles'] = $articles;
        
        $template->show('articles.articles');
        
        return true;
    }
    
    public function actionView($slug)
    {
        $article = Article::getArticle($slug);
        
        $template = new Volpi();
        
        $template['title'] = $article['title'];
        $template['body'] = $article['body'];
        $template['date'] = $article['date'];
        $template['author'] = $article['author'];

        $template->show('articles.view_article');
        
        return true;
    }
    
    public function actionCreate()
    {
        $logged_id = User::logged();

        if( empty( $logged_id ))
        {
            header("Location: /login");
        }

        $template = new Volpi();

        $template['error'] = 'Invalid data, max Title length = 50 chars, min = 5 chars, Body can\'t be empty!';
        $template['visibility'] = 'hidden';

        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $slug = Article::getSlug($title);

        if (isset($title)) {

            if( !Article::checkTitle($title) || empty($body) )
            {
                $template['visibility'] = 'show';
            }
            else
            {
                Article::addArticle(array(
                    'title' => $title,
                    'body' => $body,
                    'slug' => $slug
                ), $logged_id);

                header("Location: /articles/{$slug}");
            }
        }

        $template->show('articles.newarticle');

        return true;
    }

    public function actionDelete($slug)
    {
        $logged_id = User::logged();

        if( empty( $logged_id ))
        {
            header("Location: /login");
        }

        Article::delArticle($slug);
        header("Location: /profile");
        return true;
    }
}