<?php
class Constante {
    public static $LOCAL_BD_CONFIG = array(
        "host" => "185.98.131.90",
        "user" => "djste1070339",
        "password" => "da6ysjpqpp",
        "bdname" => "djste1070339"
    );

    public static $SELECT_ARTICLES = "select id, libelle, qte, prix, img_link, commentaire from am_articles";
}
?>