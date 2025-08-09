import Produit from "./Produit.js";
type Toxicite = number;
export default class Chimique extends Produit {
    private _toxicite;
    constructor(libelle: string, poids: number, toxicite: number);
    get toxicite(): Toxicite;
    set toxicite(value: Toxicite);
    info(): void;
}
export {};
//# sourceMappingURL=Chimique.d.ts.map