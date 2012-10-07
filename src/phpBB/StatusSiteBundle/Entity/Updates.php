<?php

namespace phpBB\StatusSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="updates")
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
	 * @ORM\Column(type="time")
	 */
	protected $post_time;

    /**
     * @ORM\Column(type="integer")
     */
	protected $poster_id;

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
     * @param string $name
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
     * @param string $description
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
     * @param \DateTime $postTime
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
     * Set poster_id
     *
     * @param integer $posterId
     * @return Updates
     */
    public function setPosterId($posterId)
    {
        $this->poster_id = $posterId;
    
        return $this;
    }

    /**
     * Get poster_id
     *
     * @return integer 
     */
    public function getPosterId()
    {
        return $this->poster_id;
    }
}