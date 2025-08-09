export default class Client {
    constructor(id, nom, prenom, telephone, adresse, email) {
        this.email = null;
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
        this.telephone = telephone;
        this.adresse = adresse;
        this.email = email;
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
    getTelephone() {
        return this.telephone;
    }
    getAdresse() {
        return this.adresse;
    }
    getEmail() {
        return this.email;
    }
    // Setters
    setNom(nom) {
        this.nom = nom;
    }
    setPrenom(prenom) {
        this.prenom = prenom;
    }
    setTelephone(telephone) {
        this.telephone = telephone;
    }
    setAdresse(adresse) {
        this.adresse = adresse;
    }
    setEmail(email) {
        this.email = email;
    }
}
//# sourceMappingURL=Client.js.map