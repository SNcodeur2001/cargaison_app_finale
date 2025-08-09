import Produit from "./Produit";
export default abstract class Materiel extends Produit {
    protected constructor(libelle: string, poids: number);
    abstract info(): void;
}
//# sourceMappingURL=Materiel.d.ts.map