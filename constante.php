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
    public static $UPDATE_ARTICLE = "update am_articles set libelle = :libelle, qte = :qte, prix = :prix, img_link = :img_link, commentaire = :commentaire where id = :id";
    public static $AUTH_USER = "select u.id,u.nom, u.prenom, u.email, u.adresse, u.telephone, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where login = :login and pwd = :pwd";
    public static $SELECT_USERS = "select u.id, u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, u.telephone, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id";
    public static $SELECT_LIVREURS = "select u.id, u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, u.telephone, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where p.libelle = 'livreur'";
    public static $SELECT_USER_BY_ID = "select u.login, u.pwd, u.nom, u.prenom, u.email, u.adresse, u.telephone, p.libelle as profil from am_user u join am_profil p on u.idprofil = p.id where u.id = :id";
    public static $SELECT_USER_BY_LIBELLE_COMMANDE = "select distinct u.id, u.nom, u.prenom, u.email, u.adresse, u.telephone from am_commande c join am_ligne_commande l on c.id = l.idcmd join am_user u on u.id = l.iduser where c.libelle = :libelle";
    public static $CREATE_USER = "insert into am_user(login, pwd, nom, prenom, email, adresse, telephone, idprofil) values (:login, :pwd, :nom, :prenom, :email, :adresse, :telephone, (select id from am_profil where libelle = :profil))";
    public static $SELECT_PROFILS = "select id, libelle from am_profil";
    public static $CREATE_PROFIL = "insert into am_profil(libelle) values (:libelle)";
    public static $DELETE_PROFIL = "delete from am_profil where id = :id";
    public static $CREATE_LIGNE_COM = "insert into am_ligne_commande(idarticle, iduser, qte) values (:idarticle, :iduser, :qte)";
    public static $SELECT_LIGNES_COMS_BY_USER_ID = "select l.id, l.idarticle, a.libelle, a.img_link, a.prix, l.qte from am_ligne_commande l join am_articles a on l.idarticle = a.id where l.iduser = :iduser and (l.idcmd IS null OR l.idcmd = 0)";
    public static $UPDATE_LIGNE_COM = "update am_ligne_commande set idarticle = :idarticle, iduser = :iduser, qte = :qte, idcmd = :idcmd where id = :id";
    public static $SELECT_LIGNE_COM_BY_LIBELLE_COM = "select a.id as idarticle, a.libelle as article,a.prix, l.qte,a.img_link from am_ligne_commande l join am_commande c on l.idcmd = c.id join am_articles a on a.id = l.idarticle join am_user u on u.id = l.iduser where c.libelle = :libelle";
    public static $SELECT_COM_BY_USER_ID = "select distinct c.id, c.libelle, c.montant, c.datecmd, c.statut from am_ligne_commande l join am_commande c on l.idcmd = c.id and l.iduser = :iduser";
    public static $SELECT_COMMANDE_BY_ID = "select libelle, montant, datecmd, statut from am_commande where id = :id";
    public static $SELECT_COMMANDES = "select distinct c.id, c.libelle, c.montant, c.datecmd, c.statut, l.iduser, u.nom, u.prenom, u.email, u.adresse, u.telephone from am_commande c join am_ligne_commande l on c.id = l.idcmd join am_user u on l.iduser = u.id";
    public static $CREATE_COMMANDE = "insert into am_commande(libelle, montant, datecmd, statut) value (:libelle, :montant, :datecmd, :statut)";
    public static $SELECT_COMMANDE_BY_LIBELLE = "select id, libelle, montant, datecmd, statut from am_commande where libelle = :libelle";
    public static $SELECT_MONTANT_COMMANDE_BY_USER_ID = "select sum(l.qte * a.prix) as montant from am_ligne_commande l join am_articles a on l.idarticle = a.id where l.iduser = :iduser and (l.idcmd IS Null OR l.idcmd = 0)";
    public static $SELECT_MONTANT_COMMANDE_BY_LIB_CMD = "select sum(l.qte * a.prix) as montant from am_ligne_commande l join am_articles a on l.idarticle = a.id join am_commande c on l.idcmd = c.id where c.libelle = :libelle";
    public static $UPDATE_COMMANDE = "update am_commande set montant = :montant, datecmd = :datecmd, statut = :statut where libelle = :libelle";
    public static $SELECT_COMMANDE_A_LIVRER_BY_LIVREUR_ID = "select distinct l.id, l.idcmd, c.libelle, lc.iduser as idclient, u.nom as nom_client, u.prenom as prenom_client, u.adresse as adresse_client, u.telephone as telephone_client, c.montant, c.datecmd, l.date as date_affectation from am_livrer_commande l join am_commande c on l.idcmd = c.id join am_ligne_commande lc on lc.idcmd = l.idcmd join am_user u on u.id = lc.iduser where c.statut = 'A_LIVRER' and l.idlivreur = :userid";
    public static $CREATE_TRANSACTION = "insert into am_transaction(reference, date, type, montant, idcmd) values (:reference, :date, :type, :montant, :idcmd)";
    public static $CREATE_LIVRAISON_CMD = "insert into am_livrer_commande(idcmd, idlivreur, date) values (:idcmd, :idlivreur, :date)";

}
?>