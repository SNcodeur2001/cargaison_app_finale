import Materiel from "./Materiel.js";

export default class Incassable extends Materiel {
    public constructor(libelle: string, poids: number) {
        super(libelle, poids);
    }

    public info(): void {
        console.log(`Produit Incassable - Libellé: ${this.libelle}, Poids: ${this.poids}kg`);
    }
}