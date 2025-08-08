import Cargaison from "./Cargaison.js";
import Materiel from "./Materiel.js";
import Chimique from "./Chimique.js";
import Alimentaire from "./Alimentaire.js";
import { TypeCargaison } from "../enums/TypeCargaison.js";
import Coordonnees from "./Coordonee.js";
import type { EtatAvancement } from "../enums/EtatAvancement.js";
import type { EtatGlobal } from "../enums/EtatGlobal.js";

export default class Aerienne extends Cargaison {
  public constructor(id:string,numero: string,protected poidsMax: number,lieuDepart: Coordonnees,lieuArrivee:Coordonnees,_distance: number,type:TypeCargaison,etatAvancement:EtatAvancement,etatGlobal:EtatGlobal,dateDepart:Date,dateArrivee:Date
  ) {
    super(id,numero,poidsMax,lieuDepart,lieuArrivee,_distance,type,etatAvancement,etatGlobal,dateDepart,dateArrivee)
    this.type=TypeCargaison.AERIENNE;
  }

 public calculerFrais(produit: Materiel | Alimentaire): number {
  if (produit instanceof Alimentaire) {
    return produit.poids * 300 * this._distance;
  } else if (produit instanceof Materiel) {
    return produit.poids * 100 * this._distance;
  } else {
    // Si jamais un produit chimique est passé par erreur
    throw new Error("Les produits chimiques ne sont pas acceptés en cargaison aérienne.");
  }
}


  ajouterProduit(produit: Chimique | Alimentaire | Materiel): void {
    if (this._produit.length >= 10) {
      throw new Error(
        "Impossible d'ajouter : la cargaison Aerienne est pleine."
      );
    }

    if (produit instanceof Chimique) {
      throw new Error(
        "Les produits chimiques sont interdits en cargaison aeriennes."
      );
    }

    this._produit.push(produit);
  }
}
