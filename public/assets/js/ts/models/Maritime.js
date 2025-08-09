import Cargaison from "./Cargaison.js";
import Materiel from "./Materiel.js";
import Chimique from "./Chimique.js";
import Alimentaire from "./Alimentaire.js";
import Fragile from "./Fragile.js";
import Coordonnees from "./Coordonee.js";
import { EtatAvancement } from "../enums/EtatAvancement.js";
import { EtatGlobal } from "../enums/EtatGlobal.js";
import { TypeCargaison } from "../enums/TypeCargaison.js";
export default class Maritime extends Cargaison {
    constructor(id, numero, poidsMax, lieuDepart, lieuArrivee, distance, dateDepart, dateArrivee, etatAvancement = EtatAvancement.EN_ATTENTE, etatGlobal = EtatGlobal.OUVERT) {
        super(id, numero, poidsMax, lieuDepart, lieuArrivee, distance, TypeCargaison.MARITIME, etatAvancement, etatGlobal, dateDepart, dateArrivee);
    }
    calculerFrais(produit) {
        if (produit instanceof Chimique) {
            const fraisBase = produit.poids * 1000 * this._distance;
            const fraisEntretien = produit.toxicite * 500;
            return fraisBase + fraisEntretien;
        }
        else if (produit instanceof Alimentaire) {
            return produit.poids * 90 * this._distance + 5000;
        }
        else if (produit instanceof Materiel) {
            if (produit instanceof Fragile) {
                throw new Error("Les produits fragiles ne peuvent pas être transportés par voie maritime.");
            }
            return produit.poids * 600 * this._distance;
        }
        else {
            throw new Error("Type de produit non reconnu.");
        }
    }
    ajouterProduit(produit) {
        if (this._produit.length >= 10) {
            throw new Error("Impossible d'ajouter : la cargaison maritime est pleine.");
        }
        if (produit instanceof Fragile) {
            throw new Error("Les produit fragiles sont interdits en cargaison maritime.");
        }
        this._produit.push(produit);
        console.log(`Produit ${produit.libelle} ajouté. Montant actuel de la cargaison : ${this.sommeTotaleC()}F`);
    }
}
//# sourceMappingURL=Maritime.js.map