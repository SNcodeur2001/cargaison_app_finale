export default abstract class Produit {
    protected _libelle: string;
    protected _poids: number;
    protected constructor(libelle: string, poids: number);
    get libelle(): string;
    get poids(): number;
    abstract info(): void;
}
//# sourceMappingURL=Produit.d.ts.map