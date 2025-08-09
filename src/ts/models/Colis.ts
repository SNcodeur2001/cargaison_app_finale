import Produit from "./Produit";
import  Client  from "./Client";
import Cargaison from "./Cargaison";
import { EtatColis } from "../enums/EtatColis";
import { TypeCargaison } from "../enums/TypeCargaison";

export class Colis {
  private code: string;
  private poids: number;
  private produit: Produit;
  private typeCargaison: string;
  private client: Client;
  private destinataire: string;
  private prix: number;
  private etat: EtatColis;
  private dateEnregistrement: Date;
  private cargaison: Cargaison;

  constructor(
    code: string,
    poids: number,
    produit: Produit,
    typeCargaison: TypeCargaison,
    client: Client,
    destinataire: string,
    cargaison:Cargaison
  ) {
    this.code = code;
    this.poids = poids;
    this.produit = produit;
    this.typeCargaison = typeCargaison;
    this.client = client;
    this.destinataire = destinataire;
    this.dateEnregistrement = new Date();
    this.etat = EtatColis.EN_ATTENTE;
    this.prix = this.calculerPrix();
    this.cargaison = cargaison; 
  }

  private calculerPrix(): number {
    const montant = this.produit.getPrix() * this.poids;
    return montant < 10000 ? 10000 : montant;
  }

  // Getters
  getCode(): string {
    return this.code;
  }

  getPoids(): number {
    return this.poids;
  }

  getProduit(): Produit {
    return this.produit;
  }

  getTypeCargaison(): string {
    return this.typeCargaison;
  }

  getClient(): Client {
    return this.client;
  }

  getDestinataire(): string {
    return this.destinataire;
  }

  getPrix(): number {
    return this.prix;
  }

  getEtat(): EtatColis {
    return this.etat;
  }

  getDateEnregistrement(): Date {
    return this.dateEnregistrement;
  }

  getCargaison(): Cargaison | null {
    return this.cargaison;
  }

  // Setters
  setEtat(nouvelEtat: EtatColis): void {
    this.etat = nouvelEtat;
  }

  setCargaison(cargaison: Cargaison): void {
    this.cargaison = cargaison;
  }

  annuler(): void {
    if (this.cargaison && this.cargaison.isFermee()) {
      throw new Error("Impossible d’annuler : la cargaison est fermée.");
    }
    this.etat = EtatColis.ANNULE;
  }
}
