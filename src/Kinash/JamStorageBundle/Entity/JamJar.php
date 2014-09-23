<?php

namespace Kinash\JamStorageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kinash\JamStorageBundle\Entity\Type;

/**
 * JamJar
 *
 * @ORM\Table(name="jamjar")
 * @ORM\Entity
 */
class JamJar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="string",length=255)
     * @ORM\ManyToOne(targetEntity="Kinash\JamStorageBundle\Entity\Type")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer")
     * @ORM\ManyToOne(targetEntity="Kinash\JamStorageBundle\Entity\Year")
     * @ORM\JoinColumn(nullable=false)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=1000)
     */
    private $comment;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return JamJar
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return JamJar
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return JamJar
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }
}
