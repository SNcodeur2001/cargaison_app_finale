import Produit from "./Produit";
import Client from "./Client";
import Cargaison from "./Cargaison";
import { EtatColis } from "../enums/EtatColis";
import { TypeCargaison } from "../enums/TypeCargaison";
export class Colis {
    constructor(code, poids, produit, typeCargaison, client, destinataire, cargaison) {
        this.code = code;
        this.poids = poids;
        this.produit = produit;
        this.typeCargaison = typeCargaison;
        this.client = client;
        this.destinataire = destinataire;
        this.dateEnregistrement = new Date();
        this.etat = EtatColis.EN_ATTENTE;
        this.prix = this.calculerPrix();
        this.cargaison = cargaison;
    }
    calculerPrix() {
        const montant = this.produit.getPrix() * this.poids;
        return montant < 10000 ? 10000 : montant;
    }
    // Getters
    getCode() {
        return this.code;
    }
    getPoids() {
        return this.poids;
    }
    getProduit() {
        return this.produit;
    }
    getTypeCargaison() {
        return this.typeCargaison;
    }
    getClient() {
        return this.client;
    }
    getDestinataire() {
        return this.destinataire;
    }
    getPrix() {
        return this.prix;
    }
    getEtat() {
        return this.etat;
    }
    getDateEnregistrement() {
        return this.dateEnregistrement;
    }
    getCargaison() {
        return this.cargaison;
    }
    // Setters
    setEtat(nouvelEtat) {
        this.etat = nouvelEtat;
    }
    setCargaison(cargaison) {
        this.cargaison = cargaison;
    }
    annuler() {
        if (this.cargaison && this.cargaison.isFermee()) {
            throw new Error("Impossible d’annuler : la cargaison est fermée.");
        }
        this.etat = EtatColis.ANNULE;
    }
}
//# sourceMappingURL=Colis.js.map