import Produit from "./Produit.js";
import Coordonnees from "./Coordonee.js";
import { TypeCargaison } from "../enums/TypeCargaison.js";
import { EtatAvancement } from "../enums/EtatAvancement.js";
import { EtatGlobal } from "../enums/EtatGlobal.js";

export default abstract class Cargaison<T extends Produit = Produit> {
  protected id: string;
  protected numero: string;
  protected poidsMax: number;
  protected _produit: T[] = [];
  protected prix: number = 0;
  protected lieuDepart: Coordonnees;
  protected lieuArrivee: Coordonnees;
  protected _distance: number;
  protected type: TypeCargaison;
  protected etatAvancement: EtatAvancement;
  protected etatGlobal: EtatGlobal;
  protected dateDepart: Date;
  protected dateArrivee: Date;

  constructor(
    id: string,
    numero: string,
    poidsMax: number,
    lieuDepart: Coordonnees,
    lieuArrivee: Coordonnees,
    distance: number,
    type: TypeCargaison,
    etatAvancement: EtatAvancement = EtatAvancement.EN_ATTENTE,
    etatGlobal: EtatGlobal = EtatGlobal.OUVERT,
        dateDepart: Date,
    dateArrivee: Date
  ) {
    this.id = id;
    this.numero = numero;
    this.poidsMax = poidsMax;
    this.lieuDepart = lieuDepart;
    this.lieuArrivee = lieuArrivee;
    this._distance = distance;
    this.type = type;
    this.dateDepart = dateDepart;
    this.dateArrivee = dateArrivee;
    this.etatAvancement = etatAvancement;
    this.etatGlobal = etatGlobal;
  }

  // Méthode abstraite obligatoire à implémenter dans les sous-classes
  public abstract calculerFrais(produit: T): number;
  public abstract ajouterProduit(produit: T): void;

  // Getters
  public getId(): string {
    return this.id;
  }

  public getNumero(): string {
    return this.numero;
  }

  public getPoidsMax(): number {
    return this.poidsMax;
  }

  public getProduits(): T[] {
    return this._produit;
  }

  public getPrix(): number {
    return this.prix;
  }

  public getLieuDepart(): Coordonnees {
    return this.lieuDepart;
  }

  public getLieuArrivee(): Coordonnees {
    return this.lieuArrivee;
  }

  public getDistance(): number {
    return this._distance;
  }

  public getType(): string {
    return this.constructor.name.toLowerCase(); // ou this.type si enum
  }

  public getEtatAvancement(): EtatAvancement {
    return this.etatAvancement;
  }

  public getEtatGlobal(): EtatGlobal {
    return this.etatGlobal;
  }

  public getDateDepart(): Date {
    return this.dateDepart;
  }

  public getDateArrivee(): Date {
    return this.dateArrivee;
  }

  // Setters
  public setNumero(numero: string): void {
    this.numero = numero;
  }

  public setPoidsMax(poidsMax: number): void {
    this.poidsMax = poidsMax;
  }

  public setProduits(produits: T[]): void {
    this._produit = produits;
  }

  public setPrix(prix: number): void {
    this.prix = prix;
  }

  public setLieuDepart(lieu: Coordonnees): void {
    this.lieuDepart = lieu;
  }

  public setLieuArrivee(lieu: Coordonnees): void {
    this.lieuArrivee = lieu;
  }

  public setDistance(distance: number): void {
    if (distance <= 0) {
      throw new Error("La distance doit être supérieure à zéro.");
    }
    this._distance = distance;
  }

  public setEtatAvancement(etat: EtatAvancement): void {
    this.etatAvancement = etat;
  }

  public setEtatGlobal(etat: EtatGlobal): void {
    this.etatGlobal = etat;
  }

  public setDateDepart(date: Date): void {
    this.dateDepart = date;
  }

  public setDateArrivee(date: Date): void {
    this.dateArrivee = date;
  }

  // Méthodes métier
  public sommeTotaleC(): number {
    return this._produit.reduce((total, produit) => {
      return total + this.calculerFrais(produit);
    }, 0);
  }

  public nbProduit(): number {
    return this._produit.length;
  }
}
