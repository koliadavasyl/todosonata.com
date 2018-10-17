<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task
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
     * @ORM\Column(name="nameTask", type="string", length=255)
     */
    private $nameTask;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionTask", type="text")
     */
    private $descriptionTask;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreate", type="datetime")
     */
    private $dateCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateUpdate", type="datetime")
     */
    private $dateUpdate;
    /**
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="task")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * Many Task have Many User.
     * @ORM\ManyToMany(targetEntity="User", inversedBy="task")
     * @ORM\JoinTable(name="users_tasks")
     */
    private $users;

    /**
     * Task constructor.
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
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
     * Set nameTask
     *
     * @param string $nameTask
     *
     * @return Task
     */
    public function setNameTask($nameTask)
    {
        $this->nameTask = $nameTask;

        return $this;
    }

    /**
     * Get nameTask
     *
     * @return string
     */
    public function getNameTask()
    {
        return $this->nameTask;
    }

    /**
     * Set descriptionTask
     *
     * @param string $descriptionTask
     *
     * @return Task
     */
    public function setDescriptionTask($descriptionTask)
    {
        $this->descriptionTask = $descriptionTask;

        return $this;
    }

    /**
     * Get descriptionTask
     *
     * @return string
     */
    public function getDescriptionTask()
    {
        return $this->descriptionTask;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Task
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     *
     * @return Task
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * Set nameTask.
     *
     * @param string $nameTask
     *
     * @return Task
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get nameTask.
     *
     * @return string
     */
    public function getUsers()
    {
        return $this->users;
    }
}

