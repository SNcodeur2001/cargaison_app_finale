import Alimentaire from "./Alimentaire.js";
import Cargaison from "./Cargaison.js";
import Chimique from "./Chimique.js";
import Materiel from "./Materiel.js";
import Coordonnees from "./Coordonee.js";
import { EtatAvancement } from "../enums/EtatAvancement.js";
import { EtatGlobal } from "../enums/EtatGlobal.js";
import { TypeCargaison } from "../enums/TypeCargaison.js";

export default class Routiere extends Cargaison {
  constructor(
    id: string,
    numero: string,
    poidsMax: number,
    lieuDepart: Coordonnees,
    lieuArrivee: Coordonnees,
    distance: number,
    dateDepart: Date,
    dateArrivee: Date,
    etatAvancement: EtatAvancement = EtatAvancement.EN_ATTENTE,
    etatGlobal: EtatGlobal = EtatGlobal.OUVERT
  ) {
    super(
      id,
      numero,
      poidsMax,
      lieuDepart,
      lieuArrivee,
      distance,
      TypeCargaison.ROUTIERE,
      etatAvancement,
      etatGlobal,
      dateDepart,
      dateArrivee
    );
  }

  public calculerFrais(produit: Alimentaire | Materiel): number {
    if (produit instanceof Alimentaire) {
      return produit.poids * 500 * this._distance;
    } else if (produit instanceof Materiel) {
      return produit.poids * 600 * this._distance;
    } else {
      throw new Error("Type de produit non supporté pour la cargaison routière.");
    }
  }

  public ajouterProduit(produit: Chimique | Alimentaire | Materiel): void {
    if (this._produit.length >= 10) {
      throw new Error("Impossible d'ajouter : la cargaison routière est pleine.");
    }

    if (produit instanceof Chimique) {
      throw new Error("Les _produit chimiques sont interdits en cargaison routière.");
    }

    this._produit.push(produit);
    console.log(`Produit ${produit.libelle} ajouté. Montant actuel de la cargaison : ${this.sommeTotaleC()}F`);
  }
}