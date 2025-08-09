import Materiel from "./Materiel.js";
export default class Incassable extends Materiel {
    constructor(libelle, poids) {
        super(libelle, poids);
    }
    info() {
        console.log(`Produit Incassable - Libellé: ${this.libelle}, Poids: ${this.poids}kg`);
    }
}
//# sourceMappingURL=Incassable.js.map