<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NoteRepository")
 */
class Note
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
     * @ORM\Column(name="timestamp", type="bigint")
     */
    private $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string")
     */
    private $commentaire;
    
    /**
     * @var int
     *
     * @ORM\Column(name="note", type="smallint")
     */
    private $note;
    
    /**
     * @ORM\ManyToOne(targetEntity="Invite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $invite;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vin")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vin;


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
     * Set timestamp
     *
     * @param integer $timestamp
     *
     * @return Note
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set invite
     *
     * @param \AppBundle\Entity\Invite $invite
     *
     * @return Note
     */
    public function setInvite(\AppBundle\Entity\Invite $invite)
    {
        $this->invite = $invite;

        return $this;
    }

    /**
     * Get invite
     *
     * @return \AppBundle\Entity\Invite
     */
    public function getInvite()
    {
        return $this->invite;
    }

    /**
     * Set vin
     *
     * @param \AppBundle\Entity\Vin $vin
     *
     * @return Note
     */
    public function setVin(\AppBundle\Entity\Vin $vin)
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * Get vin
     *
     * @return \AppBundle\Entity\Vin
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Note
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
