<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\TblEmpleado
 *
 * @ORM\Entity()
 * @ORM\Table(name="tbl_empleado")
 */
class TblEmpleado
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
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    protected $curp;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $puesto;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\TblEmpleado
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
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\TblEmpleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of curp.
     *
     * @param string $curp
     * @return \CoreBundle\Entity\TblEmpleado
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }

    /**
     * Get the value of curp.
     *
     * @return string
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set the value of puesto.
     *
     * @param string $puesto
     * @return \CoreBundle\Entity\TblEmpleado
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get the value of puesto.
     *
     * @return string
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    public function __sleep()
    {
        return array('id', 'nombre', 'curp', 'puesto');
    }
}