<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materia
 *
 * @ORM\Table(name="materia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MateriaRepository")
 */
class Materia
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
     * @ORM\Column(name="desMat", type="string", length=100, unique=true)
     */
    private $desMat;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Profesor", inversedBy="Materia")
     * @ORM\JoinColumn(name="ProfFk", referencedColumnName="id")     *
     */
    private $ProfFk;

    /**
    * @ORM\OneToMany(targetEntity="DetReporte", mappedBy="MatFk")
    */
    private $DetallesReporte;



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
     * Set desMat
     *
     * @param string $desMat
     *
     * @return Materia
     */
    public function setDesMat($desMat)
    {
        $this->desMat = $desMat;

        return $this;
    }

    /**
     * Get desMat
     *
     * @return string
     */
    public function getDesMat()
    {
        return $this->desMat;
    }

    /**
     * Set profFk
     *
     * @param \AppBundle\Entity\Profesor $profFk
     *
     * @return Materia
     */
    public function setProfFk(\AppBundle\Entity\Profesor $profFk = null)
    {
        $this->ProfFk = $profFk;

        return $this;
    }

    /**
     * Get profFk
     *
     * @return \AppBundle\Entity\Profesor
     */
    public function getProfFk()
    {
        return $this->ProfFk;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->DetallesReporte = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add detallesReporte
     *
     * @param \AppBundle\Entity\DetReporte $detallesReporte
     *
     * @return Materia
     */
    public function addDetallesReporte(\AppBundle\Entity\DetReporte $detallesReporte)
    {
        $this->DetallesReporte[] = $detallesReporte;

        return $this;
    }

    /**
     * Remove detallesReporte
     *
     * @param \AppBundle\Entity\DetReporte $detallesReporte
     */
    public function removeDetallesReporte(\AppBundle\Entity\DetReporte $detallesReporte)
    {
        $this->DetallesReporte->removeElement($detallesReporte);
    }

    /**
     * Get detallesReporte
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetallesReporte()
    {
        return $this->DetallesReporte;
    }
}
