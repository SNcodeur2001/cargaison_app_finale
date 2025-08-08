class Gestionnaire {
  private id: string;
  private nom: string;
  private prenom: string;
  private email: string;
  private telephone: string;
  private motDePasse: string;

  constructor(
    id: string,
    nom: string,
    prenom: string,
    email: string,
    telephone: string,
    motDePasse: string
  ) {
    this.id = id;
    this.nom = nom;
    this.prenom = prenom;
    this.email = email;
    this.telephone = telephone;
    this.motDePasse = motDePasse;
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

  getEmail(): string {
    return this.email;
  }

  getTelephone(): string {
    return this.telephone;
  }

  getmotDePasse(): string {
    return this.motDePasse;
  }

  // Setters
  setNom(nom: string): void {
    this.nom = nom;
  }

  setPrenom(prenom: string): void {
    this.prenom = prenom;
  }

  setEmail(email: string): void {
    this.email = email;
  }

  setTelephone(telephone: string): void {
    this.telephone = telephone;
  }

  setmotDePasse(motDePasse: string): void {
    this.motDePasse = motDePasse;
  }
}
