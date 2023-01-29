DROP TABLE IF EXISTS TP1_Produits;

CREATE TABLE TP1_Produits
(
  Id integer AUTO_INCREMENT PRIMARY KEY,
  Nom nvarchar(50),
  Quantite integer,
  Unite nvarchar(25),
  Prix decimal(10,2),
  Image nvarchar(50)
);

INSERT INTO TP1_Produits(Nom, Quantite, Unite, Prix, Image)
VALUES 
 ("Banane", 280, "g", 0.55, "banane.jpg"),
 ("Poulet", 1.55, "kg", 13.93, "poulet.jpg"),
 ("Carotte", 454, "g", 3.49, "carotte.jpg"),
 ("Chocolat", 670, "g", 11.99, "chocolat.jpg"),
 ("Pain", 675, "g", 4.49, "pain.jpg"),
 ("Jambon", 100, "g", 3.29, "jambon.jpg"),
 ("Lait 2%", 2, "L", 4.23, "lait.jpg"),
 ("Arachide", 150, "g", 1.79, "arachide.jpg"),
 ("Croustilles", 235, "g", 3.99, "croustilles.jpg"),
 ("Salsa", 418, "ml", 3.49, "salsa.jpg");
 
 DROP TABLE IF EXISTS TP1_Panier;
 
 CREATE TABLE TP1_Panier
(
  Id integer AUTO_INCREMENT PRIMARY KEY,
  ProduitId integer,
  Quantite integer,
  Token nvarchar(16)
);
