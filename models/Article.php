<?php

class Article
{
    public static function getArticles($count)
    {
        $db = Database::getInstance();
        $statements = "SELECT * FROM `Articles` ORDER BY `date` DESC LIMIT 0, {$count}";
        $result = $db->query($statements);

        $articleList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $articleList[$i]['id_article'] = $row['id_article'];
            $articleList[$i]['title'] = $row['title'];
            $articleList[$i]['body'] = $row['body'];
            $articleList[$i]['date'] = $row['date'];
            $articleList[$i]['slug'] = $row['slug'];
            $articleList[$i]['id_user'] = $row['id_user'];
            $stmt = "SELECT first_name, last_name,user_name FROM `Users` WHERE id_user = '{$row['id_user']}'";
            $rs = $db->query($stmt);
            $ar = $rs->fetch();
            $articleList[$i]['author'] = $ar['first_name'].' '.$ar['last_name'];
            $articleList[$i]['user_name'] = $ar['user_name'];
            $i++;
        }
        return $articleList;
    }

    public static function getSlug($string)
    {
        $array = explode(' ', $string);
        $slug = array();
        foreach ($array as $w)
        {
            array_push( $slug, preg_replace('/\W/', '',strtolower($w)) );
        }
        return implode('-', $slug);
    }

    public static function getUserArticles($id_user)
    {
        $db = Database::getInstance();
        $statements = "SELECT * FROM `Articles` WHERE id_user = '{$id_user}' ORDER BY `date` DESC LIMIT 0, 30";
        $result = $db->query($statements);

        $articleList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $articleList[$i]['id_article'] = $row['id_article'];
            $articleList[$i]['title'] = $row['title'];
            $articleList[$i]['body'] = $row['body'];
            $articleList[$i]['date'] = $row['date'];
            $articleList[$i]['slug'] = $row['slug'];
            $articleList[$i]['id_user'] = $row['id_user'];
            $i++;
        }
        return $articleList;
    }
    
    public static function getArticle($slug)
    {
        $db = Database::getInstance();
        $statements = "SELECT * FROM `Articles` WHERE slug = '{$slug}'";
        $result = $db->query($statements);
        $article = $result->fetch();
        $stmt = "SELECT first_name, last_name FROM `Users` WHERE id_user = '{$article['id_user']}'";
        $rs = $db->query($stmt);
        $ar = $rs->fetch();
        $author = $ar['first_name'].' '.$ar['last_name'];
        $article = array_merge($article, array('author' => $author));
        return $article;
    }

    public static function addArticle($article, $id)
    {
        $db = Database::getInstance();

        $title = $article['title'];
        $body = $article['body'];
        $slug = $article['slug'];

        $stmt = $db->prepare("INSERT INTO Articles (title, body, slug, id_user) VALUES (:title, :body, :slug, :id_user)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':id_user', $id);

        $stmt->execute();
    }

    public static function delArticle($slug)
    {
        $db = Database::getInstance();
        $statements = $db->prepare("DELETE FROM `Articles` WHERE slug = :slug");
        $statements->bindParam(':slug', $slug);
        $statements->execute();

        return true;
    }

    public static function checkTitle($title)
    {
        if(strlen($title) <= 50 && strlen($title) >= 5)
        {
            return true;
        }
    }
}