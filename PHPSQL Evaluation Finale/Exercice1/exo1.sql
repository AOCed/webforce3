SELECT users.firstname as "prénom de l'auteur", users.lastname as "nom de l'auteur", articles.*
FROM users
LEFT JOIN articles ON users.id = articles.id_user where articles.id = 10