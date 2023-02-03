<?php
include_once "bd.manager.php";
include_once "article.model.php";
include_once "constante.php";

class ArticleModel {
    private $bdManager;

    function __construct()
    {
        $this->bdManager = new BdManager();
    }

    public function getArticles(){
        $sql = Constante::$SELECT_ARTICLES;
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

    public function create($article){
        $sql = Constante::$CREATE_ARTICLE;
        $dicoParam = array(
            "libelle" => $article->libelle,
            "qte" => $article->qte,
            "prix" => $article->prix,
            "img_link" => $article->img_link,
            "commentaire" => $article->commentaire
        );
        $resultat = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $resultat;
    }
}

$articleModel = new ArticleModel();
$articles = $articleModel->getArticles();

?>