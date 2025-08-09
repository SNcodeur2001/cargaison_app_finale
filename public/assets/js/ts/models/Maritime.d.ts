import Cargaison from "./Cargaison.js";
import Materiel from "./Materiel.js";
import Chimique from "./Chimique.js";
import Alimentaire from "./Alimentaire.js";
import Coordonnees from "./Coordonee.js";
import { EtatAvancement } from "../enums/EtatAvancement.js";
import { EtatGlobal } from "../enums/EtatGlobal.js";
export default class Maritime extends Cargaison {
    constructor(id: string, numero: string, poidsMax: number, lieuDepart: Coordonnees, lieuArrivee: Coordonnees, distance: number, dateDepart: Date, dateArrivee: Date, etatAvancement?: EtatAvancement, etatGlobal?: EtatGlobal);
    calculerFrais(produit: Chimique | Alimentaire | Materiel): number;
    ajouterProduit(produit: Chimique | Alimentaire | Materiel): void;
}
//# sourceMappingURL=Maritime.d.ts.map