# Site Bibliothèque PDO

## Pour la partie backend :

3.  Lister les fournisseurs en fonction de : 3. Pays

**Bonus** :

## Pour la partie frontend :

### Maquettage

Vous devez créer les maquettes responsive des pages de votre application en adoptant une approche "Mobile First".

Les maquettes devront au minimum prendre en compte l'affichage sur mobile et desktop. Un plus serait de prendre en compte les tablettes.

### Intégration

Vous devrez ensuite passer à l'intégration de vos maquettes.

### Javascript

- Vous devrez implémenter une validation front des formulaires de saisie de votre application, à la fois au niveau du HTML et du Javascript.

  - Utilisez les types et les attributs HTML pertinents pour les inputs.

  - Ajoutez une validation javascript interdisant la soumission du formulaire si les contraintes ne sont pas satisfaites.

#### **_Contraintes de validation_**

### Bonus Track

Grâce au N° **ISBN** d'un livre, récupérez dynamiquement les détails du livre ainsi que son image de couverture grâce à un appel AJAX vers l'API OpenLibrary.

Les informations sur le livre sélectionné seront affichées dynamiquement sur votre page grâce au click sur un bouton qui permettra de les visualiser.

L'API OpenLibrary ne nécessite pas d'authentification et supporte CORS.

Endpoint API ISBN : [https://openlibrary.org/isbn/{ISBN_NUMBER}.json](https://openlibrary.org/isbn/{ISBN_NUMBER}.json)

Endpoint Covers API : [https://covers.openlibrary.org/b/id/{COVER_ID}.json](https://covers.openlibrary.org/b/id/{COVER_ID}.json)

Docs :

- ISBN : [https://openlibrary.org/dev/docs/api/books](https://openlibrary.org/dev/docs/api/books)
- Covers : [https://openlibrary.org/dev/docs/api/covers](https://openlibrary.org/dev/docs/api/covers)
