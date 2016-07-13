<?php

class PageController
{
    public function actionIndex()
    {
        $template = new Volpi();

        $articles = Article::getArticles(3);

        $template['articles'] = $articles;
        
        $template->show('index');
        
        return true;
    }
    
    public function actionError()
    {
        $template = new Volpi();
        
        $template->show('error');
        
        return true;
    }
}

