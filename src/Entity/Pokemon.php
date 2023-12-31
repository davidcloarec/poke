<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $catchDay = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $catchPlace = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $hp = null;

    #[ORM\Column]
    private ?bool $shiny = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Specie $specie = null;

    #[ORM\ManyToMany(targetEntity: Attack::class)]
    private Collection $attacks;

    public function __construct()
    {
        $this->attacks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCatchDay(): ?\DateTimeInterface
    {
        return $this->catchDay;
    }

    public function setCatchDay(?\DateTimeInterface $catchDay): static
    {
        $this->catchDay = $catchDay;

        return $this;
    }

    public function getCatchPlace(): ?string
    {
        return $this->catchPlace;
    }

    public function setCatchPlace(?string $catchPlace): static
    {
        $this->catchPlace = $catchPlace;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): static
    {
        $this->hp = $hp;

        return $this;
    }

    public function isShiny(): ?bool
    {
        return $this->shiny;
    }

    public function setShiny(bool $shiny): static
    {
        $this->shiny = $shiny;

        return $this;
    }

    public function getSpecie(): ?Specie
    {
        return $this->specie;
    }

    public function setSpecie(?Specie $specie): static
    {
        $this->specie = $specie;

        return $this;
    }

    /**
     * @return Collection<int, Attack>
     */
    public function getAttacks(): Collection
    {
        return $this->attacks;
    }

    public function addAttack(Attack $attack): static
    {
        if (!$this->attacks->contains($attack)) {
            $this->attacks->add($attack);
        }

        return $this;
    }

    public function removeAttack(Attack $attack): static
    {
        $this->attacks->removeElement($attack);

        return $this;
    }
}
