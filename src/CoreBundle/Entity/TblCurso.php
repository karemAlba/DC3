<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\TblCurso
 *
 * @ORM\Entity()
 * @ORM\Table(name="tbl_curso")
 */
class TblCurso
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $duracion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $f_inicio;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $f_termino;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\TblCurso
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
     * @return \CoreBundle\Entity\TblCurso
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
     * Set the value of duracion.
     *
     * @param string $duracion
     * @return \CoreBundle\Entity\TblCurso
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get the value of duracion.
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set the value of f_inicio.
     *
     * @param \DateTime $f_inicio
     * @return \CoreBundle\Entity\TblCurso
     */
    public function setFInicio($f_inicio)
    {
        $this->f_inicio = $f_inicio;

        return $this;
    }

    /**
     * Get the value of f_inicio.
     *
     * @return \DateTime
     */
    public function getFInicio()
    {
        return $this->f_inicio;
    }

    /**
     * Set the value of f_termino.
     *
     * @param \DateTime $f_termino
     * @return \CoreBundle\Entity\TblCurso
     */
    public function setFIncio($f_termino)
    {
        $this->f_incio = $f_termino;

        return $this;
    }

    /**
     * Get the value of f_termino.
     *
     * @return \DateTime
     */
    public function getFTermino()
    {
        return $this->f_termino;
    }

    public function __sleep()
    {
        return array('id', 'nombre', 'duracion', 'f_inicio', 'f_termino');
    }
}