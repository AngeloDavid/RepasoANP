<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiante
 *
 * @ORM\Table(name="estudiante")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EstudianteRepository")
 */
class Estudiante
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
     * @ORM\Column(name="nomEst", type="string", length=50)
     */
    private $nomEst;

    /**
     * @var string
     *
     * @ORM\Column(name="apeEst", type="string", length=50)
     */
    private $apeEst;

    /**
     * @var int
     *
     * @ORM\Column(name="edaEst", type="integer")
     */
    private $edaEst;

    /**
     * @ORM\OneToMany(targetEntity="CabReporte", mappedBy="EstFk")
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
     * Set nomEst
     *
     * @param string $nomEst
     *
     * @return Estudiante
     */
    public function setNomEst($nomEst)
    {
        $this->nomEst = $nomEst;

        return $this;
    }

    /**
     * Get nomEst
     *
     * @return string
     */
    public function getNomEst()
    {
        return $this->nomEst;
    }

    /**
     * Set apeEst
     *
     * @param string $apeEst
     *
     * @return Estudiante
     */
    public function setApeEst($apeEst)
    {
        $this->apeEst = $apeEst;

        return $this;
    }

    /**
     * Get apeEst
     *
     * @return string
     */
    public function getApeEst()
    {
        return $this->apeEst;
    }

    /**
     * Set edaEst
     *
     * @param integer $edaEst
     *
     * @return Estudiante
     */
    public function setEdaEst($edaEst)
    {
        $this->edaEst = $edaEst;

        return $this;
    }

    /**
     * Get edaEst
     *
     * @return int
     */
    public function getEdaEst()
    {
        return $this->edaEst;
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
     * @param \AppBundle\Entity\CabReporte $materia
     *
     * @return Estudiante
     */
    public function addMateria(\AppBundle\Entity\CabReporte $materia)
    {
        $this->Materias[] = $materia;

        return $this;
    }

    /**
     * Remove materia
     *
     * @param \AppBundle\Entity\CabReporte $materia
     */
    public function removeMateria(\AppBundle\Entity\CabReporte $materia)
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
}
