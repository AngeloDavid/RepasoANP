<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Profesor
 *
 * @ORM\Table(name="profesor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProfesorRepository")
 */
class Profesor implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProf", type="string", length=50)
     */
    private $nomProf;

    /**
     * @var string
     *
     * @ORM\Column(name="apeProf", type="string", length=50)
     */
    private $apeProf;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     *
     */
    private $PassTemp;

    /**
     * @return string
     */
    public function getPassTemp()
    {
        return $this->PassTemp;
    }

    /**
     * @param string $PassTemp
     */
    public function setPassTemp($PassTemp)
    {
        $this->PassTemp = $PassTemp;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="passTPRof", type="string", length=255)
     */
    private $passTPRof;

    /**
     * @var string
     *
     * @ORM\Column(name="emailProf", type="string", length=255)
     */
    private $emailProf;

    /**
     * @ORM\OneToMany(targetEntity="Materia", mappedBy="ProfFk")
     */
    private $Materias;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomProf
     *
     * @param string $nomProf
     *
     * @return Profesor
     */
    public function setNomProf($nomProf)
    {
        $this->nomProf = $nomProf;
        return $this;
    }

    /**
     * Get nomProf
     *
     * @return string
     */
    public function getNomProf()
    {
        return $this->nomProf;
    }

    /**
     * Set apeProf
     *
     * @param string $apeProf
     *
     * @return Profesor
     */
    public function setApeProf($apeProf)
    {
        $this->apeProf = $apeProf;

        return $this;
    }

    /**
     * Get apeProf
     *
     * @return string
     */
    public function getApeProf()
    {
        return $this->apeProf;
    }

    /**
     * Set username
     *
     * @param string $userName
     *
     * @return Profesor
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set passTPRof
     *
     * @param string $passTPRof
     *
     * @return Profesor
     */
    public function setPassTPRof($passTPRof)
    {
        $this->passTPRof = $passTPRof;

        return $this;
    }

    /**
     * Get passTPRof
     *
     * @return string
     */
    public function getPassTPRof()
    {
        return $this->passTPRof;
    }

    /**
     * Set emailProf
     *
     * @param string $emailProf
     *
     * @return Profesor
     */
    public function setEmailProf($emailProf)
    {
        $this->emailProf = $emailProf;

        return $this;
    }

    /**
     * Get emailProf
     *
     * @return string
     */
    public function getEmailProf()
    {
        return $this->emailProf;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Materias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add materia
     *
     * @param \AppBundle\Entity\Materia $materia
     *
     * @return Profesor
     */
    public function addMateria(\AppBundle\Entity\Materia $materia)
    {
        $this->Materias[] = $materia;

        return $this;
    }

    /**
     * Remove materia
     *
     * @param \AppBundle\Entity\Materia $materia
     */
    public function removeMateria(\AppBundle\Entity\Materia $materia)
    {
        $this->Materias->removeElement($materia);
    }

    /**
     * Get materias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaterias()
    {
        return $this->Materias;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->getPassTPRof();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
