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
    public static $AUTH_USER = "select u.id,u.nom, u.prenom, u.email, u.adresse, u.telephone, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where login = :login and pwd = :pwd";
    public static $SELECT_USERS = "select u.id, u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, u.telephone, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id";
    public static $SELECT_USER_BY_ID = "select u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, u.telephone, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where u.id = :id";
    public static $SELECT_USER_BY_LIBELLE_COMMANDE = "select distinct u.id, u.nom, u.prenom, u.email, u.adresse, u.telephone from am_commande c join am_ligne_commande l on c.id = l.idcmd join am_user u on u.id = l.iduser where c.libelle = :libelle";
    public static $CREATE_USER = "insert into am_user(login, pwd, nom, prenom, email, adresse, telephone, idprofil) values (:login, :pwd, :nom, :prenom, :email, :adresse, :telephone, (select id from am_profil where libelle = :profil))";
    public static $SELECT_PROFILS = "select id, libelle from am_profil";
    public static $CREATE_LIGNE_COM = "insert into am_ligne_commande(idarticle, iduser, qte) values (:idarticle, :iduser, :qte)";
    public static $SELECT_LIGNES_COMS_BY_USER_ID = "select l.id, l.idarticle, a.libelle, a.img_link, a.prix, l.qte from am_ligne_commande l join am_articles a on l.idarticle = a.id where l.iduser = :iduser and l.idcmd IS null";
    public static $UPDATE_LIGNE_COM = "update am_ligne_commande set idarticle = :idarticle, iduser = :iduser, qte = :qte, idcmd = :idcmd where id = :id";
    public static $SELECT_LIGNE_COM_BY_LIBELLE_COM = "select a.libelle as article,a.prix, l.qte,a.img_link from am_ligne_commande l join am_commande c on l.idcmd = c.id join am_articles a on a.id = l.idarticle join am_user u on u.id = l.iduser where c.libelle = :libelle";
    public static $SELECT_COM_BY_USER_ID = "select distinct c.id, c.libelle, c.datecmd, c.statut from am_ligne_commande l join am_commande c on l.idcmd = c.id and l.iduser = :iduser";
    public static $SELECT_COMMANDES = "select distinct c.id, c.libelle, c.datecmd, c.statut, l.iduser, u.nom, u.prenom, u.email, u.adresse, u.telephone from am_commande c join am_ligne_commande l on c.id = l.idcmd join am_user u on l.iduser = u.id";
    public static $CREATE_COMMANDE = "insert into am_commande(libelle, datecmd, statut) value (:libelle, :datecmd, :statut)";
    public static $SELECT_COMMANDE_BY_LIBELLE = "select id, libelle, datecmd, statut from am_commande where libelle = :libelle";

}
?>