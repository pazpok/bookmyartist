<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Formule
 *
 * @ORM\Table(name="formule", indexes={@ORM\Index(name="fk_formule_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Formule implements \ArrayAccess
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;
    /**
     * @var int
     *
     * @ORM\Column(name="nb_musiciens", type="integer", nullable=false)
     */
    private $nbMusiciens;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tps_install", type="time", nullable=false)
     */
    private $tpsInstall;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tps_event", type="time", nullable=false)
     */
    private $tpsEvent;
    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="formule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     * @return Formule
     */
    public function setId(int $id): Formule
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * @param string $title
     * @return Formule
     */
    public function setTitle(string $title): Formule
    {
        $this->title = $title;
        return $this;
    }
    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * @param string $description
     * @return Formule
     */
    public function setDescription(string $description): Formule
    {
        $this->description = $description;
        return $this;
    }
    /**
     * @return int
     */
    public function getNbMusiciens(): ?int
    {
        return $this->nbMusiciens;
    }
    /**
     * @param int $nbMusiciens
     * @return Formule
     */
    public function setNbMusiciens(int $nbMusiciens): Formule
    {
        $this->nbMusiciens = $nbMusiciens;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getTpsInstall(): ?\DateTime
    {
        return $this->tpsInstall;
    }
    /**
     * @param \DateTime $tpsInstall
     * @return Formule
     */
    public function setTpsInstall(\DateTime $tpsInstall): Formule
    {
        $this->tpsInstall = $tpsInstall;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getTpsEvent(): ?\DateTime
    {
        return $this->tpsEvent;
    }
    /**
     * @param \DateTime $tpsEvent
     * @return Formule
     */
    public function setTpsEvent(\DateTime $tpsEvent): Formule
    {
        $this->tpsEvent = $tpsEvent;
        return $this;
    }
    /**
     * @return int
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }
    /**
     * @param int $price
     * @return Formule
     */
    public function setPrice(int $price): Formule
    {
        $this->price = $price;
        return $this;
    }
    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
    /**
     * @param User $user
     * @return Formule
     */
    public function setUser(User $user): Formule
    {
        $this->user = $user;
        return $this;
    }



    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        $this->$offset = null;
    }
}