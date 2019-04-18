<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Scalar\String_;
/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity
 */
class Type
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;
    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @param int $id
     * @return Type
     */
    public function setId(int $id): Type
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }
    /**
     * @param string $libelle
     * @return Type
     */
    public function setLibelle(string $libelle): Type
    {
        $this->libelle = $libelle;
        return $this;
    }
    public function __toString()
    {
        return $this->libelle;
    }
}