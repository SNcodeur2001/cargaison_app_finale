import Produit from "./Produit";
import Client from "./Client";
import Cargaison from "./Cargaison";
import { EtatColis } from "../enums/EtatColis";
import { TypeCargaison } from "../enums/TypeCargaison";
export declare class Colis {
    private code;
    private poids;
    private produit;
    private typeCargaison;
    private client;
    private destinataire;
    private prix;
    private etat;
    private dateEnregistrement;
    private cargaison;
    constructor(code: string, poids: number, produit: Produit, typeCargaison: TypeCargaison, client: Client, destinataire: string, cargaison: Cargaison);
    private calculerPrix;
    getCode(): string;
    getPoids(): number;
    getProduit(): Produit;
    getTypeCargaison(): string;
    getClient(): Client;
    getDestinataire(): string;
    getPrix(): number;
    getEtat(): EtatColis;
    getDateEnregistrement(): Date;
    getCargaison(): Cargaison | null;
    setEtat(nouvelEtat: EtatColis): void;
    setCargaison(cargaison: Cargaison): void;
    annuler(): void;
}
//# sourceMappingURL=Colis.d.ts.map