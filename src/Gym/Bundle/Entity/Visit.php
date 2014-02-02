<?php

namespace Gym\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visit
 *
 * @ORM\Table(name="visit", indexes={@ORM\Index(name="fk_visit_client_idx", columns={"client_id"})})
 * @ORM\Entity
 */
class Visit
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
     * @var \DateTime
     *
     * @ORM\Column(name="day", type="date", nullable=false)
     */
    private $day;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enter", type="time", nullable=false)
     */
    private $enter;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="exit", type="time", nullable=true)
     */
    private $exit;

    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;


}
