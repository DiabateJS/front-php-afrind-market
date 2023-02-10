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
    public static $AUTH_USER = "select u.id, u.email, u.adresse, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where login = :login and pwd = :pwd";
    public static $SELECT_USERS = "select u.id, u.login, u.pwd, u.email, u.adresse, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id";
    public static $SELECT_USER_BY_ID = "select u.login, u.pwd, u.email, u.adresse, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where u.id = :id";
    public static $CREATE_USER = "insert into am_user(login, pwd, email, adresse, idprofil) values (:login, :pwd, :email, :adresse, (select id from am_profil where libelle = :profil))";
}
?>