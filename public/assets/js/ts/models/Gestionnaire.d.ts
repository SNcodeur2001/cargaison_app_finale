declare class Gestionnaire {
    private id;
    private nom;
    private prenom;
    private email;
    private telephone;
    private motDePasse;
    constructor(id: string, nom: string, prenom: string, email: string, telephone: string, motDePasse: string);
    getId(): string;
    getNom(): string;
    getPrenom(): string;
    getEmail(): string;
    getTelephone(): string;
    getmotDePasse(): string;
    setNom(nom: string): void;
    setPrenom(prenom: string): void;
    setEmail(email: string): void;
    setTelephone(telephone: string): void;
    setmotDePasse(motDePasse: string): void;
}
//# sourceMappingURL=Gestionnaire.d.ts.map