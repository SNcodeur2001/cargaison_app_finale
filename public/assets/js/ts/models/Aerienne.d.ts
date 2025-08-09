import Cargaison from "./Cargaison.js";
import Materiel from "./Materiel.js";
import Chimique from "./Chimique.js";
import Alimentaire from "./Alimentaire.js";
import { TypeCargaison } from "../enums/TypeCargaison.js";
import Coordonnees from "./Coordonee.js";
import type { EtatAvancement } from "../enums/EtatAvancement.js";
import type { EtatGlobal } from "../enums/EtatGlobal.js";
export default class Aerienne extends Cargaison {
    protected poidsMax: number;
    constructor(id: string, numero: string, poidsMax: number, lieuDepart: Coordonnees, lieuArrivee: Coordonnees, _distance: number, type: TypeCargaison, etatAvancement: EtatAvancement, etatGlobal: EtatGlobal, dateDepart: Date, dateArrivee: Date);
    calculerFrais(produit: Materiel | Alimentaire): number;
    ajouterProduit(produit: Chimique | Alimentaire | Materiel): void;
}
//# sourceMappingURL=Aerienne.d.ts.map