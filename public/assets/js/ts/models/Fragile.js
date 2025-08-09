import Materiel from "./Materiel.js";
export default class Fragile extends Materiel {
    constructor(libelle, poids) {
        super(libelle, poids);
    }
    info() {
        console.log(`Produit Fragile - Libellé: ${this.libelle}, Poids: ${this.poids}kg`);
    }
}
//# sourceMappingURL=Fragile.js.map