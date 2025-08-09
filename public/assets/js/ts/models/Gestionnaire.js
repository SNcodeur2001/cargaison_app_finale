"use strict";
class Gestionnaire {
    constructor(id, nom, prenom, email, telephone, motDePasse) {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.email = email;
        this.telephone = telephone;
        this.motDePasse = motDePasse;
    }
    // Getters
    getId() {
        return this.id;
    }
    getNom() {
        return this.nom;
    }
    getPrenom() {
        return this.prenom;
    }
    getEmail() {
        return this.email;
    }
    getTelephone() {
        return this.telephone;
    }
    getmotDePasse() {
        return this.motDePasse;
    }
    // Setters
    setNom(nom) {
        this.nom = nom;
    }
    setPrenom(prenom) {
        this.prenom = prenom;
    }
    setEmail(email) {
        this.email = email;
    }
    setTelephone(telephone) {
        this.telephone = telephone;
    }
    setmotDePasse(motDePasse) {
        this.motDePasse = motDePasse;
    }
}
//# sourceMappingURL=Gestionnaire.js.map