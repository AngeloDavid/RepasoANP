<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CabReporte
 *
 * @ORM\Table(name="cab_reporte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CabReporteRepository")
 */
class CabReporte
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Estudiante", inversedBy="CabReporte")
     * @ORM\JoinColumn(name="EstFk", referencedColumnName="id")     *
     */
    private $EstFk;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaResp", type="datetimetz")
     */
    private $fechaResp;

    /**
     * @var string
     *
     * @ORM\Column(name="despRep", type="string", length=100)
     */
    private $despRep;

    /**
     * @ORM\OneToMany(targetEntity="DetReporte", mappedBy="CabFk")
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
     * Set fechaResp
     *
     * @param \DateTime $fechaResp
     *
     * @return CabReporte
     */
    public function setFechaResp($fechaResp)
    {
        $this->fechaResp = $fechaResp;

        return $this;
    }

    /**
     * Get fechaResp
     *
     * @return \DateTime
     */
    public function getFechaResp()
    {
        return $this->fechaResp;
    }

    /**
     * Set despRep
     *
     * @param string $despRep
     *
     * @return CabReporte
     */
    public function setDespRep($despRep)
    {
        $this->despRep = $despRep;

        return $this;
    }

    /**
     * Get despRep
     *
     * @return string
     */
    public function getDespRep()
    {
        return $this->despRep;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->DetallesReporte = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set estFk
     *
     * @param \AppBundle\Entity\Estudiante $estFk
     *
     * @return CabReporte
     */
    public function setEstFk(\AppBundle\Entity\Estudiante $estFk = null)
    {
        $this->EstFk = $estFk;

        return $this;
    }

    /**
     * Get estFk
     *
     * @return \AppBundle\Entity\Estudiante
     */
    public function getEstFk()
    {
        return $this->EstFk;
    }

    /**
     * Add detallesReporte
     *
     * @param \AppBundle\Entity\DetReporte $detallesReporte
     *
     * @return CabReporte
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
