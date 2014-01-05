<?php

namespace phpBB\StatusSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="updates")
 * @ORM\HasLifecycleCallbacks()
 */
class Updates
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $post_time;

    /**
     * @ORM\OneToMany(targetEntity="Overides", mappedBy="update_id")
     */
     protected $overides;

    /**
     * @ORM\ManyToOne(targetEntity="\phpBB\StatusSiteBundle\Entity\User", inversedBy="updates")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;

    public function __construct()
    {
        $this->overides = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getName();
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        $this->post_time = new \DateTime();
    }

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
     * Set name
     *
     * @param  string  $name
     * @return Updates
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param  string  $description
     * @return Updates
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set post_time
     *
     * @param  \DateTime $postTime
     * @return Updates
     */
    public function setPostTime($postTime)
    {
        $this->post_time = $postTime;

        return $this;
    }

    /**
     * Get post_time
     *
     * @return \DateTime
     */
    public function getPostTime()
    {
        return $this->post_time;
    }

    /**
     * Set overide_id
     *
     * @param  phpBB\StatusSiteBundle\Entity\Overides $overideId
     * @return Updates
     */
    public function setOverideId(\phpBB\StatusSiteBundle\Entity\Overides $overideId = null)
    {
        $this->overide_id = $overideId;

        return $this;
    }

    /**
     * Get overide_id
     *
     * @return phpBB\StatusSiteBundle\Entity\Overides
     */
    public function getOverideId()
    {
        return $this->overide_id;
    }

    /**
     * Add overides
     *
     * @param  phpBB\StatusSiteBundle\Entity\Overides $overides
     * @return Updates
     */
    public function addOveride(\phpBB\StatusSiteBundle\Entity\Overides $overides)
    {
        $this->overides[] = $overides;

        return $this;
    }

    /**
     * Remove overides
     *
     * @param phpBB\StatusSiteBundle\Entity\Overides $overides
     */
    public function removeOveride(\phpBB\StatusSiteBundle\Entity\Overides $overides)
    {
        $this->overides->removeElement($overides);
    }

    /**
     * Get overides
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getOverides()
    {
        return $this->overides;
    }

    /**
     * Set user_id
     *
     * @param  phpBB\StatusSiteBundle\Entity\User $userId
     * @return Updates
     */
    public function setUserId(\phpBB\StatusSiteBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return Application\Sonata\UserBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
