import Alimentaire from "./Alimentaire.js";
import Cargaison from "./Cargaison.js";
import Chimique from "./Chimique.js";
import Materiel from "./Materiel.js";
import Coordonnees from "./Coordonee.js";
import { EtatAvancement } from "../enums/EtatAvancement.js";
import { EtatGlobal } from "../enums/EtatGlobal.js";
import { TypeCargaison } from "../enums/TypeCargaison.js";
export default class Routiere extends Cargaison {
    constructor(id, numero, poidsMax, lieuDepart, lieuArrivee, distance, dateDepart, dateArrivee, etatAvancement = EtatAvancement.EN_ATTENTE, etatGlobal = EtatGlobal.OUVERT) {
        super(id, numero, poidsMax, lieuDepart, lieuArrivee, distance, TypeCargaison.ROUTIERE, etatAvancement, etatGlobal, dateDepart, dateArrivee);
    }
    calculerFrais(produit) {
        if (produit instanceof Alimentaire) {
            return produit.poids * 500 * this._distance;
        }
        else if (produit instanceof Materiel) {
            return produit.poids * 600 * this._distance;
        }
        else {
            throw new Error("Type de produit non supporté pour la cargaison routière.");
        }
    }
    ajouterProduit(produit) {
        if (this._produit.length >= 10) {
            throw new Error("Impossible d'ajouter : la cargaison routière est pleine.");
        }
        if (produit instanceof Chimique) {
            throw new Error("Les _produit chimiques sont interdits en cargaison routière.");
        }
        this._produit.push(produit);
        console.log(`Produit ${produit.libelle} ajouté. Montant actuel de la cargaison : ${this.sommeTotaleC()}F`);
    }
}
//# sourceMappingURL=Routiere.js.map