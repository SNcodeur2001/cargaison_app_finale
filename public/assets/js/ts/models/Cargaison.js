import Produit from "./Produit.js";
import Coordonnees from "./Coordonee.js";
import { TypeCargaison } from "../enums/TypeCargaison.js";
import { EtatAvancement } from "../enums/EtatAvancement.js";
import { EtatGlobal } from "../enums/EtatGlobal.js";
export default class Cargaison {
    constructor(id, numero, poidsMax, lieuDepart, lieuArrivee, distance, type, etatAvancement = EtatAvancement.EN_ATTENTE, etatGlobal = EtatGlobal.OUVERT, dateDepart, dateArrivee) {
        this._produit = [];
        this.prix = 0;
        this.id = id;
        this.numero = numero;
        this.poidsMax = poidsMax;
        this.lieuDepart = lieuDepart;
        this.lieuArrivee = lieuArrivee;
        this._distance = distance;
        this.type = type;
        this.dateDepart = dateDepart;
        this.dateArrivee = dateArrivee;
        this.etatAvancement = etatAvancement;
        this.etatGlobal = etatGlobal;
    }
    // Getters
    getId() {
        return this.id;
    }
    getNumero() {
        return this.numero;
    }
    getPoidsMax() {
        return this.poidsMax;
    }
    getProduits() {
        return this._produit;
    }
    getPrix() {
        return this.prix;
    }
    getLieuDepart() {
        return this.lieuDepart;
    }
    getLieuArrivee() {
        return this.lieuArrivee;
    }
    getDistance() {
        return this._distance;
    }
    getType() {
        return this.constructor.name.toLowerCase(); // ou this.type si enum
    }
    getEtatAvancement() {
        return this.etatAvancement;
    }
    getEtatGlobal() {
        return this.etatGlobal;
    }
    getDateDepart() {
        return this.dateDepart;
    }
    getDateArrivee() {
        return this.dateArrivee;
    }
    // Setters
    setNumero(numero) {
        this.numero = numero;
    }
    setPoidsMax(poidsMax) {
        this.poidsMax = poidsMax;
    }
    setProduits(produits) {
        this._produit = produits;
    }
    setPrix(prix) {
        this.prix = prix;
    }
    setLieuDepart(lieu) {
        this.lieuDepart = lieu;
    }
    setLieuArrivee(lieu) {
        this.lieuArrivee = lieu;
    }
    setDistance(distance) {
        if (distance <= 0) {
            throw new Error("La distance doit être supérieure à zéro.");
        }
        this._distance = distance;
    }
    setEtatAvancement(etat) {
        this.etatAvancement = etat;
    }
    setEtatGlobal(etat) {
        this.etatGlobal = etat;
    }
    setDateDepart(date) {
        this.dateDepart = date;
    }
    setDateArrivee(date) {
        this.dateArrivee = date;
    }
    // Méthodes métier
    sommeTotaleC() {
        return this._produit.reduce((total, produit) => {
            return total + this.calculerFrais(produit);
        }, 0);
    }
    nbProduit() {
        return this._produit.length;
    }
}
//# sourceMappingURL=Cargaison.js.map