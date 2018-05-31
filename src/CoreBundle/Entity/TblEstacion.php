<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\TblEstacion
 *
 * @ORM\Entity()
 * @ORM\Table(name="tbl_estacion")
 */
class TblEstacion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $r_social;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $rfc;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $r_patronal;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $r_trabajador;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\TblEstacion
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of r_social.
     *
     * @param string $r_social
     * @return \CoreBundle\Entity\TblEstacion
     */
    public function setRSocial($r_social)
    {
        $this->r_social = $r_social;

        return $this;
    }

    /**
     * Get the value of r_social.
     *
     * @return string
     */
    public function getRSocial()
    {
        return $this->r_social;
    }

    /**
     * Set the value of rfc.
     *
     * @param string $rfc
     * @return \CoreBundle\Entity\TblEstacion
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get the value of rfc.
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set the value of r_patronal.
     *
     * @param string $r_patronal
     * @return \CoreBundle\Entity\TblEstacion
     */
    public function setRPatronal($r_patronal)
    {
        $this->r_patronal = $r_patronal;

        return $this;
    }

    /**
     * Get the value of r_patronal.
     *
     * @return string
     */
    public function getRPatronal()
    {
        return $this->r_patronal;
    }

    /**
     * Set the value of r_trabajador.
     *
     * @param string $r_trabajador
     * @return \CoreBundle\Entity\TblEstacion
     */
    public function setRTrabajador($r_trabajador)
    {
        $this->r_trabajador = $r_trabajador;

        return $this;
    }

    /**
     * Get the value of r_trabajador.
     *
     * @return string
     */
    public function getRTrabajador()
    {
        return $this->r_trabajador;
    }

    public function __sleep()
    {
        return array('id', 'r_social', 'rfc', 'r_patronal', 'r_trabajador');
    }
}