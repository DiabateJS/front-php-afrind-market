<?php
include_once "bd.manager.php";
include_once "article.model.php";

class ArticleModel {
    private $bdManager;

    function __construct()
    {
        $this->bdManager = new BdManager();
    }

    public function getArticles(){
        $sql = "select id, libelle, qte, prix, img_link, commentaire from am_articles";
        $entete = array("id", "libelle", "qte", "prix", "img_link", "commentaire");
        $resultat = $this->bdManager->executeSelect($sql, $entete);
        $articles = [];
        $article = null;
        if ($resultat->hasError == False){
            $res = $resultat->data;
            for ($i = 0 ; $i < count($res); $i++){  
                $id = $res[$i]["id"];
                $libelle = $res[$i]["libelle"];
                $qte = $res[$i]["qte"];
                $prix = $res[$i]["prix"];
                $img = $res[$i]["img_link"];
                $com = $res[$i]["commentaire"];
                $article = new Article($id, $libelle, $qte, $prix, $img, $com);
                $articles[] = $article;
            }
        }
        return $articles;
    }
}

$articleModel = new ArticleModel();
$articles = $articleModel->getArticles();

?>