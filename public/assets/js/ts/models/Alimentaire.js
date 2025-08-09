import Produit from "./Produit.js";
export default class Alimentaire extends Produit {
    constructor(libelle, poids) {
        super(libelle, poids);
    }
    info() {
        console.log(`Produit Alimentaire - Libellé: ${this.libelle}, Poids: ${this.poids}kg`);
    }
}
//# sourceMappingURL=Alimentaire.js.map