import Produit from "./Produit.js";
export default class Chimique extends Produit {
    constructor(libelle, poids, toxicite) {
        super(libelle, poids);
        if (toxicite < 1 || toxicite > 10) {
            throw new Error("La toxicité doit être entre 1 et 10.");
        }
        this._toxicite = toxicite;
    }
    get toxicite() {
        return this._toxicite;
    }
    set toxicite(value) {
        if (value < 1 || value > 10) {
            throw new Error("La toxicité doit être entre 1 et 10.");
        }
        this._toxicite = value;
    }
    info() {
        console.log(`Produit Chimique - Libellé: ${this.libelle}, Poids: ${this.poids}kg, Toxicité: ${this.toxicite}/10`);
    }
}
//# sourceMappingURL=Chimique.js.map