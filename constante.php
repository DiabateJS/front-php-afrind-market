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
    public static $SELECT_ARTICLE_BY_ID = "select id, libelle, qte, prix, img_link, commentaire from article where id = :id";
    public static $AUTH_USER = "select u.id,u.nom, u.prenom, u.email, u.adresse, p.libelle as profil from user u join profil p on u.idprofil = p.id where login = :login and pwd = :pwd";
    public static $SELECT_USERS = "select u.id, u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, p.libelle as profil from user u join profil p on u.idprofil = p.id";
    public static $SELECT_USER_BY_ID = "select u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, p.libelle as profil from user u join profil p on u.idprofil = p.id where u.id = :id";
    public static $CREATE_USER = "insert into user(login, pwd, nom, prenom, email, adresse, idprofil) values (:login, :pwd, :nom, :prenom, :email, :adresse, (select id from profil where libelle = :profil))";
    public static $SELECT_PROFILS = "select id, libelle from profil";
    public static $CREATE_LIGNE_COM = "insert into ligne_commande(idarticle, iduser, qte) values (:idarticle, :iduser, :qte)";
    public static $SELECT_LIGNES_COMS_BY_USER_ID = "select l.id, l.idarticle, a.libelle, a.img_link, a.prix, l.qte from ligne_commande l join article a on l.idarticle = a.id where l.iduser = :iduser";
}
?>