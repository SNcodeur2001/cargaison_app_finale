export default class Client {
    private id;
    private nom;
    private prenom;
    private telephone;
    private adresse;
    private email;
    constructor(id: string, nom: string, prenom: string, telephone: string, adresse: string, email: string | null);
    getId(): string;
    getNom(): string;
    getPrenom(): string;
    getTelephone(): string;
    getAdresse(): string;
    getEmail(): string | null;
    setNom(nom: string): void;
    setPrenom(prenom: string): void;
    setTelephone(telephone: string): void;
    setAdresse(adresse: string): void;
    setEmail(email: string | null): void;
}
//# sourceMappingURL=Client.d.ts.map