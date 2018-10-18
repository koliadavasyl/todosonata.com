<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatusRepository")
 */
class Status
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionStatus", type="text")
     */
    private $descriptionStatus;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="status")
     */
    private $task;

    public function __construct()
    {
        $this->task = new ArrayCollection();
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Status
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set descriptionStatus
     *
     * @param string $descriptionStatus
     *
     * @return Status
     */
    public function setDescriptionStatus($descriptionStatus)
    {
        $this->descriptionStatus = $descriptionStatus;

        return $this;
    }

    /**
     * Get descriptionStatus
     *
     * @return string
     */
    public function getDescriptionStatus()
    {
        return $this->descriptionStatus;
    }
    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }
}

