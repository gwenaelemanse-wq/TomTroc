<?php

class UserEntity
{
    private ?int $id = null;
    private string $prenom;
    private string $nom;
    private string $pseudo;
    private string $email;
    private string $avatar;
    private string $dateInscription;
    private int $nbrLivres = 0;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setInscription(string $dateInscription): void
    {
        $this->dateInscription = $dateInscription;
    }

    public function getInscription(): string
    {
        return $this->dateInscription;
    }

    public function setNbrLivres(int $nbrLivres): void
    {
        $this->nbrLivres = $nbrLivres;
    }

    public function getNbrLivres(): int
    {
        return $this->nbrLivres;
    }
}
