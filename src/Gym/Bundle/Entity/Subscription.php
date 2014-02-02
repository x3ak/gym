<?php

namespace Gym\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription", indexes={@ORM\Index(name="fk_subscription_subscription_type1_idx", columns={"subscription_type_id"}), @ORM\Index(name="fk_subscription_client1_idx", columns={"client_id"})})
 * @ORM\Entity
 */
class Subscription
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
     * @var integer
     *
     * @ORM\Column(name="price", type="smallint", nullable=false)
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expire_date", type="date", nullable=false)
     */
    private $expireDate;

    /**
     * @var \SubscriptionType
     *
     * @ORM\ManyToOne(targetEntity="SubscriptionType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subscription_type_id", referencedColumnName="id")
     * })
     */
    private $subscriptionType;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;


}
