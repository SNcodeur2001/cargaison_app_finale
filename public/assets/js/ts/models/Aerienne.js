import Cargaison from "./Cargaison.js";
import Materiel from "./Materiel.js";
import Chimique from "./Chimique.js";
import Alimentaire from "./Alimentaire.js";
import { TypeCargaison } from "../enums/TypeCargaison.js";
import Coordonnees from "./Coordonee.js";
export default class Aerienne extends Cargaison {
    constructor(id, numero, poidsMax, lieuDepart, lieuArrivee, _distance, type, etatAvancement, etatGlobal, dateDepart, dateArrivee) {
        super(id, numero, poidsMax, lieuDepart, lieuArrivee, _distance, type, etatAvancement, etatGlobal, dateDepart, dateArrivee);
        this.poidsMax = poidsMax;
        this.type = TypeCargaison.AERIENNE;
    }
    calculerFrais(produit) {
        if (produit instanceof Alimentaire) {
            return produit.poids * 300 * this._distance;
        }
        else if (produit instanceof Materiel) {
            return produit.poids * 100 * this._distance;
        }
        else {
            // Si jamais un produit chimique est passé par erreur
            throw new Error("Les produits chimiques ne sont pas acceptés en cargaison aérienne.");
        }
    }
    ajouterProduit(produit) {
        if (this._produit.length >= 10) {
            throw new Error("Impossible d'ajouter : la cargaison Aerienne est pleine.");
        }
        if (produit instanceof Chimique) {
            throw new Error("Les produits chimiques sont interdits en cargaison aeriennes.");
        }
        this._produit.push(produit);
    }
}
//# sourceMappingURL=Aerienne.js.map