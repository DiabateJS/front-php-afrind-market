<?php
class Constante {
    public static $LOCAL_BD_CONFIG = array(
        "host" => "localhost",
        "user" => "root",
        "password" => "root",
        "bdname" => "afrind_market"
    );

    public static $SELECT_ARTICLES = "select id, libelle, qte, prix, img_link, commentaire from article";
    public static $CREATE_ARTICLE = "insert into article(libelle, qte, prix, img_link, commentaire) values (:libelle, :qte, :prix, :img_link, :commentaire)";
    public static $AUTH_USER = "select id, email, adresse from user where login = :login and pwd = :pwd";
    public static $SELECT_USER = "select id, login, pwd, email, adresse from user";
}
?>