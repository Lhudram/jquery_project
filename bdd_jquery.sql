CREATE TABLE adresse
(
  idadresse   SERIAL       NOT NULL
    CONSTRAINT adresse_pkey
    PRIMARY KEY,
  adresse     VARCHAR(100) NOT NULL,
  codepostal  CHAR(5)      NOT NULL,
  ville       VARCHAR(100) NOT NULL,
  idorganisme INTEGER      NOT NULL
);

CREATE TABLE collecte
(
  idcollecte SERIAL  NOT NULL
    CONSTRAINT collecte_pkey
    PRIMARY KEY,
  idreappro  INTEGER NOT NULL,
  idlivreur  INTEGER NOT NULL,
  idretrib   INTEGER NOT NULL
);

CREATE TABLE detail_reappro
(
  idreappro INTEGER NOT NULL,
  idproduit INTEGER NOT NULL,
  quantite  INTEGER NOT NULL,
  CONSTRAINT pk_produit_reappro
  PRIMARY KEY (idreappro, idproduit)
);

CREATE TABLE detail_ventes
(
  idvente   SERIAL            NOT NULL,
  idproduit INTEGER           NOT NULL,
  quantite  INTEGER           NOT NULL,
  remise    INTEGER DEFAULT 0 NOT NULL,
  CONSTRAINT detail_ventes_idvente_idproduit_pk
  UNIQUE (idvente, idproduit)
);


CREATE TABLE facture (
  idFacture SERIAL NOT NULL
    CONSTRAINT facture_pkey
    PRIMARY KEY,
  dateFacture date NOT NULL,
  idOrganisme int NOT NULL,
  idLivraison int NOT NULL,
  numero varchar(8) NOT NULL,
  commentaire varchar(500) NOT NULL
);


CREATE TABLE indisponibilite
(
  idindisponibilite SERIAL  NOT NULL
    CONSTRAINT indisponibilite_pkey
    PRIMARY KEY,
  idorganisme       INTEGER NOT NULL,
  idlivreur         INTEGER NOT NULL
);

CREATE TABLE livraison
(
  idlivraison SERIAL  NOT NULL
    CONSTRAINT livraison_pkey
    PRIMARY KEY,
  idventes    INTEGER NOT NULL,
  idlivreur   INTEGER NOT NULL,
  idfacture   INTEGER NOT NULL
    CONSTRAINT livraison_facture_idfacture_fk
    REFERENCES facture
);

CREATE TABLE livreur
(
  idlivreur SERIAL      NOT NULL
    CONSTRAINT livreur_pkey
    PRIMARY KEY,
  nom       VARCHAR(30) NOT NULL,
  prenom    VARCHAR(30) NOT NULL,
  password    VARCHAR(100) NOT NULL
);

ALTER TABLE collecte
  ADD CONSTRAINT collecte_livreur_idlivreur_fk
FOREIGN KEY (idlivreur) REFERENCES livreur;

ALTER TABLE indisponibilite
  ADD CONSTRAINT indisponibilite_livreur_idlivreur_fk
FOREIGN KEY (idlivreur) REFERENCES livreur;

ALTER TABLE livraison
  ADD CONSTRAINT livraison_livreur_idlivreur_fk
FOREIGN KEY (idlivreur) REFERENCES livreur;

CREATE TABLE organisme
(
  idorganisme SERIAL       NOT NULL
    CONSTRAINT organisme_pkey
    PRIMARY KEY,
  nom         VARCHAR(50)  NOT NULL,
  mail        VARCHAR(50)  NOT NULL,
  tel         VARCHAR(10)  NOT NULL,
  password    VARCHAR(100) NOT NULL
);

ALTER TABLE adresse
  ADD CONSTRAINT adresse_organisme_idorganisme_fk
FOREIGN KEY (idorganisme) REFERENCES organisme;

ALTER TABLE indisponibilite
  ADD CONSTRAINT indisponibilite_organisme_idorganisme_fk
FOREIGN KEY (idorganisme) REFERENCES organisme;

CREATE TABLE produit
(
  idproduit SERIAL      NOT NULL
    CONSTRAINT produit_idproduit_pk
    PRIMARY KEY,
  libelle   VARCHAR(50) NOT NULL,
  prix      NUMERIC     NOT NULL,
  quantite  INTEGER     NOT NULL,
  img       VARCHAR(50)
);

ALTER TABLE detail_reappro
  ADD CONSTRAINT detail_reappro_produit_idproduit_fk
FOREIGN KEY (idproduit) REFERENCES produit;

ALTER TABLE detail_ventes
  ADD CONSTRAINT detail_ventes_produit_idproduit_fk
FOREIGN KEY (idproduit) REFERENCES produit;

CREATE TABLE reapprovisionnement
(
  idreappro   SERIAL  NOT NULL
    CONSTRAINT reapprovisionnement_pkey
    PRIMARY KEY,
  idorganisme INTEGER NOT NULL
    CONSTRAINT reapprovisionnement_organisme_idorganisme_fk
    REFERENCES organisme
);

ALTER TABLE collecte
  ADD CONSTRAINT collecte_reapprovisionnement_idreappro_fk
FOREIGN KEY (idreappro) REFERENCES reapprovisionnement;

ALTER TABLE detail_reappro
  ADD CONSTRAINT detail_reappro_reapprovisionnement_idreappro_fk
FOREIGN KEY (idreappro) REFERENCES reapprovisionnement;

CREATE TABLE retribution
(
  idretrib SERIAL NOT NULL
    CONSTRAINT retribution_idretrib_pk
    PRIMARY KEY
);

ALTER TABLE collecte
  ADD CONSTRAINT collecte_retribution_idretrib_fk
FOREIGN KEY (idretrib) REFERENCES retribution;

CREATE TABLE stock_fournisseur
(
  idorganisme INTEGER NOT NULL
    CONSTRAINT stock_fournisseur_organisme_idorganisme_fk
    REFERENCES organisme,
  idproduit   INTEGER NOT NULL
    CONSTRAINT stock_fournisseur_produit_idproduit_fk
    REFERENCES produit,
  quantite    INTEGER NOT NULL,
  CONSTRAINT stock_fournisseur_idorganisme_idproduit_pk
  PRIMARY KEY (idorganisme, idproduit)
);

CREATE TABLE ventes
(
  idventes    SERIAL  NOT NULL
    CONSTRAINT ventes_pkey
    PRIMARY KEY,
  idorganisme INTEGER NOT NULL
    CONSTRAINT ventes_organisme_idorganisme_fk
    REFERENCES organisme,
  dateestimee DATE    NOT NULL,
  remise      INTEGER NOT NULL,
  prix INTEGER NOT NULL
);

ALTER TABLE detail_ventes
  ADD CONSTRAINT detail_ventes_ventes_idventes_fk
FOREIGN KEY (idvente) REFERENCES ventes;

ALTER TABLE livraison
  ADD CONSTRAINT livraison_ventes_idventes_fk
FOREIGN KEY (idventes) REFERENCES ventes;

INSERT INTO organisme (nom, mail, tel, password) VALUES ('admin','admin@admin.com','0606060606','$2y$10$BsmpltGi1caIYnvO0.jZOe6qu62ywa0yFo2R5jEnR6dHHTFB75RKq');
INSERT INTO livreur (nom, prenom, password) VALUES ('admin','admin','$2y$10$BsmpltGi1caIYnvO0.jZOe6qu62ywa0yFo2R5jEnR6dHHTFB75RKq');
INSERT INTO produit (libelle, prix, quantite, img) VALUES ('carotte',75,120,'carotte.png');
INSERT INTO produit (libelle, prix, quantite, img) VALUES ('patate',20,100,'patate.png');
INSERT INTO ventes VALUES (1,1,'21/03/2018',0);
INSERT INTO detail_ventes VALUES (1,1,10,0);
INSERT INTO detail_ventes VALUES (1,2,30,0);

