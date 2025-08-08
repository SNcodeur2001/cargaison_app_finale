import Produit from "./Produit.js";

export default class Alimentaire extends Produit {
  public constructor(libelle: string, poids: number) {
    super(libelle, poids);
  }
  public info(): void {
    console.log(
      `Produit Alimentaire - Libellé: ${this.libelle}, Poids: ${this.poids}kg`
    );
  }
}
