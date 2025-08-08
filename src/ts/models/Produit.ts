export default abstract class Produit {
  protected _libelle: string;
  protected _poids: number;
  

  protected constructor(libelle: string, poids: number) {
    this._libelle = libelle;
    this._poids = poids;
  }

  get libelle(): string {
    return this._libelle;
  }

  get poids(): number {
    return this._poids;
  }

  abstract info(): void; // rend obligatoire la méthode info()
}
