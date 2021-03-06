<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetReporte
 *
 * @ORM\Table(name="det_reporte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetReporteRepository")
 */
class DetReporte
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
     * @ORM\ManyToOne(targetEntity="CabReporte", inversedBy="DetReporte")
     * @ORM\JoinColumn(name="CabFk", referencedColumnName="id")     *
     */
    private $CabFk;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Materia", inversedBy="DetReporte")
     * @ORM\JoinColumn(name="MatFk", referencedColumnName="id")     *
     */
    private $MatFk;

    /**
     * @var float
     *
     * @ORM\Column(name="notaDRep", type="float")
     */
    private $notaDRep;


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
     * Set notaDRep
     *
     * @param float $notaDRep
     *
     * @return DetReporte
     */
    public function setNotaDRep($notaDRep)
    {
        $this->notaDRep = $notaDRep;

        return $this;
    }

    /**
     * Get notaDRep
     *
     * @return float
     */
    public function getNotaDRep()
    {
        return $this->notaDRep;
    }

    /**
     * Set cabFk
     *
     * @param \AppBundle\Entity\CabReporte $cabFk
     *
     * @return DetReporte
     */
    public function setCabFk(\AppBundle\Entity\CabReporte $cabFk = null)
    {
        $this->CabFk = $cabFk;

        return $this;
    }

    /**
     * Get cabFk
     *
     * @return \AppBundle\Entity\CabReporte
     */
    public function getCabFk()
    {
        return $this->CabFk;
    }

    /**
     * Set matFk
     *
     * @param \AppBundle\Entity\Materia $matFk
     *
     * @return DetReporte
     */
    public function setMatFk(\AppBundle\Entity\Materia $matFk = null)
    {
        $this->MatFk = $matFk;

        return $this;
    }

    /**
     * Get matFk
     *
     * @return \AppBundle\Entity\Materia
     */
    public function getMatFk()
    {
        return $this->MatFk;
    }
}
