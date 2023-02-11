<?php
class Constante {
    public static $LOCAL_BD_CONFIG = array(
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "bdname" => "afrind_market"
    );

    public static $SELECT_ARTICLES = "select id, libelle, qte, prix, img_link, commentaire from article";
    public static $CREATE_ARTICLE = "insert into article(libelle, qte, prix, img_link, commentaire) values (:libelle, :qte, :prix, :img_link, :commentaire)";
    public static $AUTH_USER = "select u.id, u.email, u.adresse, p.libelle as profil from user u join profil p on u.idprofil = p.id where login = :login and pwd = :pwd";
    public static $SELECT_USERS = "select u.id, u.login, u.pwd, u.email, u.adresse, p.libelle as profil from user u join profil p on u.idprofil = p.id";
    public static $SELECT_USER_BY_ID = "select u.login, u.pwd, u.email, u.adresse, p.libelle as profil from user u join profil p on u.idprofil = p.id where u.id = :id";
    public static $CREATE_USER = "insert into user(login, pwd, email, adresse, idprofil) values (:login, :pwd, :email, :adresse, (select id from profil where libelle = :profil))";
    public static $SELECT_PROFILS = "select id, libelle from profil";
}
?>