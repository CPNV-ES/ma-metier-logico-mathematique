Scénario 1 — Code de classe valide → redirection vers la bonne classe
Given une classe C1 existe avec le code ABC123
When un élève saisit ABC123 et soumet le formulaire
Then l’élève est redirigé vers l’espace élève de la classe C1
And la page affiche uniquement les élèves liés à C1

Scénario 2 — Code de classe invalide → message d’erreur
Given aucune classe n’existe avec le code ZZZ999
When un élève saisit ZZZ999 et soumet le formulaire
Then l’élève reste sur la page d’accueil
And un message d’erreur est affiché (ex: "Code de classe invalide")

Scénario 3 — Bouton “Créer” (enseignant) → redirection création de compte
Given je suis sur la page d’accueil
When je clique sur "Créer"
Then je suis redirigé vers la page Création de compte enseignant

Scénario 4 — Bouton “Se connecter” (enseignant) → redirection login
Given je suis sur la page d’accueil
When je clique sur "Se Connecter"
Then je suis redirigé vers la page Login enseignant
