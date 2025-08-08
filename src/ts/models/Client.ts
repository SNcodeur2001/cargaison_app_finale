export default class Client {
  private id: string;
  private nom: string;
  private prenom: string;
  private telephone: string;
  private adresse: string;
  private email: string | null = null;

  constructor(
    id: string,
    nom: string,
    prenom: string,
    telephone: string,
    adresse: string,
    email: string | null
  ) {
    this.id = id;
    this.nom = nom;
    this.prenom = prenom;
    this.telephone = telephone;
    this.adresse = adresse;
    this.email = email;
  }

  // Getters
  getId(): string {
    return this.id;
  }

  getNom(): string {
    return this.nom;
  }

  getPrenom(): string {
    return this.prenom;
  }

  getTelephone(): string {
    return this.telephone;
  }

  getAdresse(): string {
    return this.adresse;
  }

  getEmail(): string | null {
    return this.email;
  }

  // Setters
  setNom(nom: string): void {
    this.nom = nom;
  }

  setPrenom(prenom: string): void {
    this.prenom = prenom;
  }

  setTelephone(telephone: string): void {
    this.telephone = telephone;
  }

  setAdresse(adresse: string): void {
    this.adresse = adresse;
  }

  setEmail(email: string | null): void {
    this.email = email;
  }
}
