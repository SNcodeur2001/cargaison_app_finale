import Alimentaire from "./Alimentaire.js";
import Cargaison from "./Cargaison.js";
import Chimique from "./Chimique.js";
import Materiel from "./Materiel.js";
import Coordonnees from "./Coordonee.js";
import { EtatAvancement } from "../enums/EtatAvancement.js";
import { EtatGlobal } from "../enums/EtatGlobal.js";
export default class Routiere extends Cargaison {
    constructor(id: string, numero: string, poidsMax: number, lieuDepart: Coordonnees, lieuArrivee: Coordonnees, distance: number, dateDepart: Date, dateArrivee: Date, etatAvancement?: EtatAvancement, etatGlobal?: EtatGlobal);
    calculerFrais(produit: Alimentaire | Materiel): number;
    ajouterProduit(produit: Chimique | Alimentaire | Materiel): void;
}
//# sourceMappingURL=Routiere.d.ts.map