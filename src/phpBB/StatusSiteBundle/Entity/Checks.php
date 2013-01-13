<?php

namespace phpBB\StatusSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="checks")
 * @ORM\HasLifecycleCallbacks()
 */
class Checks {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Sites", inversedBy="checks")
	 * @ORM\JoinColumn(name="site_id", referencedColumnName="id")
	 */
	protected $site_id;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $name;

	/**
	 * @ORM\Column(type="text")
	 */
	protected $description;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $slug;

	/**
	 * @ORM\Column(type="boolean", nullable=true)
	 */
	protected $status_code;

	/**
	 * @ORM\Column(type="string", nullable=true)
	 */
	protected $status;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $check_time;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $pingdom_id;
	
	/**
	 * 
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $lastresponse;

	/**
	 * @ORM\PrePersist
	 */
	public function setCreatedValue() {
		$this->status = "Unknown";
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
     * @param string $name
     * @return Checks
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
     * @return Checks
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
     * Set slug
     *
     * @param string $slug
     * @return Checks
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Checks
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set status_code
     *
     * @param boolean $statusCode
     * @return Checks
     */
    public function setStatusCode($statusCode)
    {
        $this->status_code = $statusCode;
    
        return $this;
    }

    /**
     * Get status_code
     *
     * @return boolean 
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Checks
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set check_time
     *
     * @param \DateTime $checkTime
     * @return Checks
     */
    public function setCheckTime($checkTime)
    {
        $this->check_time = $checkTime;
    
        return $this;
    }

    /**
     * Get check_time
     *
     * @return \DateTime 
     */
    public function getCheckTime()
    {
        return $this->check_time;
    }

    /**
     * Set pingdom_id
     *
     * @param integer $pingdomId
     * @return Checks
     */
    public function setPingdomId($pingdomId)
    {
        $this->pingdom_id = $pingdomId;
    
        return $this;
    }

    /**
     * Get pingdom_id
     *
     * @return integer 
     */
    public function getPingdomId()
    {
        return $this->pingdom_id;
    }

    /**
     * Set site_id
     *
     * @param \phpBB\StatusSiteBundle\Entity\Sites $siteId
     * @return Checks
     */
    public function setSiteId(\phpBB\StatusSiteBundle\Entity\Sites $siteId = null)
    {
        $this->site_id = $siteId;
    
        return $this;
    }

    /**
     * Get site_id
     *
     * @return \phpBB\StatusSiteBundle\Entity\Sites 
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set lastresponse
     *
     * @param integer $lastresponse
     * @return Checks
     */
    public function setLastresponse($lastresponse)
    {
        $this->lastresponse = $lastresponse;
    
        return $this;
    }

    /**
     * Get lastresponse
     *
     * @return integer 
     */
    public function getLastresponse()
    {
        return $this->lastresponse;
    }
}