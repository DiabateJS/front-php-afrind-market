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
    public static $SELECT_ARTICLE_BY_ID = "select id, libelle, qte, prix, img_link, commentaire from am_articles where id = :id";
    public static $AUTH_USER = "select u.id,u.nom, u.prenom, u.email, u.adresse, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where login = :login and pwd = :pwd";
    public static $SELECT_USERS = "select u.id, u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id";
    public static $SELECT_USER_BY_ID = "select u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where u.id = :id";
    public static $CREATE_USER = "insert into am_user(login, pwd, nom, prenom, email, adresse, idprofil) values (:login, :pwd, :nom, :prenom, :email, :adresse, (select id from am_profil where libelle = :profil))";
    public static $SELECT_PROFILS = "select id, libelle from am_profil";
    public static $CREATE_LIGNE_COM = "insert into am_ligne_commande(idarticle, iduser, qte) values (:idarticle, :iduser, :qte)";
    public static $SELECT_LIGNES_COMS_BY_USER_ID = "select l.id, l.idarticle, a.libelle, a.img_link, a.prix, l.qte from am_ligne_commande l join am_articles a on l.idarticle = a.id where l.iduser = :iduser";
}
?>