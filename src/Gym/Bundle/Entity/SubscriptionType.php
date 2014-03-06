<?php

namespace Gym\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubscriptionType
 *
 * @ORM\Table(name="subscription_type", uniqueConstraints={@ORM\UniqueConstraint(name="title_UNIQUE", columns={"title"})})
 * @ORM\Entity
 */
class SubscriptionType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=64, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="smallint", nullable=false)
     */
    private $price;

    /**
     * @var boolean
     *
     * @ORM\Column(name="duration", type="boolean", nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="duration_unit", type="string", length=1, nullable=false)
     */
    private $durationUnit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enter_time", type="time", nullable=false)
     */
    private $enterTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="exit_time", type="time", nullable=false)
     */
    private $exitTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visits_per_week", type="boolean", nullable=false)
     */
    private $visitsPerWeek;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return boolean
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return string
     */
    public function getDurationUnit()
    {
        return $this->durationUnit;
    }

    /**
     * @return \DateTime
     */
    public function getEnterTime()
    {
        return $this->enterTime;
    }

    /**
     * @return \DateTime
     */
    public function getExitTime()
    {
        return $this->exitTime;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return boolean
     */
    public function getVisitsPerWeek()
    {
        return $this->visitsPerWeek;
    }



}
