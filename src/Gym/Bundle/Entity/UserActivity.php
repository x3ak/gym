<?php

namespace Gym\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserActivity
 *
 * @ORM\Table(name="user_activity", indexes={@ORM\Index(name="fk_user_activity_visit1_idx", columns={"visit_id"}), @ORM\Index(name="fk_user_activity_client1_idx", columns={"client_id"}), @ORM\Index(name="fk_user_activity_subscription1_idx", columns={"subscription_id"}), @ORM\Index(name="fk_user_activity_subscription_type1_idx", columns={"subscription_type_id"}), @ORM\Index(name="fk_user_activity_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_user_activity_activity_type1_idx", columns={"activity_type_id"})})
 * @ORM\Entity
 */
class UserActivity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \Visit
     *
     * @ORM\ManyToOne(targetEntity="Visit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visit_id", referencedColumnName="id")
     * })
     */
    private $visit;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \Subscription
     *
     * @ORM\ManyToOne(targetEntity="Subscription")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subscription_id", referencedColumnName="id")
     * })
     */
    private $subscription;

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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \ActivityType
     *
     * @ORM\ManyToOne(targetEntity="ActivityType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activity_type_id", referencedColumnName="id")
     * })
     */
    private $activityType;


}
