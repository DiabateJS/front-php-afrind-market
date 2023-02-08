<?php
class Constante {
    public static $LOCAL_BD_CONFIG = array(
        "host" => "185.98.131.90",
        "user" => "djste1070339",
        "password" => "da6ysjpqpp",
        "bdname" => "djste1070339"
    );

    public static $SELECT_ARTICLES = "select id, libelle, qte, prix, img_link, commentaire from am_articles";
    public static $CREATE_ARTICLE = "insert into am_articles(libelle, qte, prix, img_link, commentaire) values (:libelle, :qte, :prix, :img_link, :commentaire)";
    public static $AUTH_USER = "select id, email, adresse from am_user where login = :login and pwd = :pwd";
    public static $SELECT_USERS = "select id, login, pwd, email, adresse from am_user";
    public static $SELECT_USER_BY_ID = "select login, pwd, email, adresse from am_user where id = :id";
    public static $CREATE_USER = "insert into am_user(login, pwd, email, adresse) values (:login, :pwd, :email, :adresse)";
}
?>