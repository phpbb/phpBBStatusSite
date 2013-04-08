<?php

namespace phpBB\StatusSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="sites")
 * @ORM\HasLifecycleCallbacks()
 */
class Sites {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\OneToMany(targetEntity="Checks", mappedBy="site_id")
	 */
	protected $checks;

	/**
	 * @ORM\OneToMany(targetEntity="Overides", mappedBy="site_id")
	 */
	protected $overides;

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
	 * @ORM\Column(type="string")
	 */
	protected $url;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $front_page;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $status;
	
	/**
	 * @ORM\Column(type="boolean", nullable=true)
	 */
	protected $statusCode;

	/**
	 * @ORM\Column(type="boolean");
	 */
	protected $major;
	
	/**
	 * @ORM\Column(type="boolean");
	 */
	protected $team;
	

	/**
	 * @ORM\PrePersist
	 */
	public function setCreatedValue() {
		$this->status = "Unknown";
	}

	public function __construct() {
		$this->checks = new ArrayCollection();
		$this->overides = new ArrayCollection();
	}
	
	public function __toString()
	{
		return (string)$this->getName();
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 * @return Sites
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 * @return Sites
	 */
	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set slug
	 *
	 * @param string $slug
	 * @return Sites
	 */
	public function setSlug($slug) {
		$this->slug = $slug;

		return $this;
	}

	/**
	 * Get slug
	 *
	 * @return string
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * Set url
	 *
	 * @param string $url
	 * @return Sites
	 */
	public function setUrl($url) {
		$this->url = $url;

		return $this;
	}

	/**
	 * Get url
	 *
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Set front_page
	 *
	 * @param boolean $frontPage
	 * @return Sites
	 */
	public function setFrontPage($frontPage) {
		$this->front_page = $frontPage;

		return $this;
	}

	/**
	 * Get front_page
	 *
	 * @return boolean
	 */
	public function getFrontPage() {
		return $this->front_page;
	}

	/**
	 * Add checks
	 *
	 * @param phpBB\StatusSiteBundle\Entity\Checks $checks
	 * @return Sites
	 */
	public function addCheck(\phpBB\StatusSiteBundle\Entity\Checks $checks) {
		$this->checks[] = $checks;

		return $this;
	}

	/**
	 * Remove checks
	 *
	 * @param phpBB\StatusSiteBundle\Entity\Checks $checks
	 */
	public function removeCheck(\phpBB\StatusSiteBundle\Entity\Checks $checks) {
		$this->checks->removeElement($checks);
	}

	/**
	 * Get checks
	 *
	 * @return Doctrine\Common\Collections\Collection
	 */
	public function getChecks() {
		return $this->checks;
	}

	/**
	 * Add overides
	 *
	 * @param phpBB\StatusSiteBundle\Entity\Overides $overides
	 * @return Sites
	 */
	public function addOveride(
			\phpBB\StatusSiteBundle\Entity\Overides $overides) {
		$this->overides[] = $overides;

		return $this;
	}

	/**
	 * Remove overides
	 *
	 * @param phpBB\StatusSiteBundle\Entity\Overides $overides
	 */
	public function removeOveride(
			\phpBB\StatusSiteBundle\Entity\Overides $overides) {
		$this->overides->removeElement($overides);
	}

	/**
	 * Get overides
	 *
	 * @return Doctrine\Common\Collections\Collection
	 */
	public function getOverides() {
		return $this->overides;
	}

	/**
	 * Set status
	 *
	 * @param status $status
	 * @return Sites
	 */
	public function setStatus($status) {
		$this->status = $status;

		return $this;
	}

	/**
	 * Get status
	 *
	 * @return status
	 */
	public function getStatus() {
		return $this->status;
	}

    /**
     * Set major
     *
     * @param boolean $major
     * @return Sites
     */
    public function setMajor($major)
    {
        $this->major = $major;
    
        return $this;
    }

    /**
     * Get major
     *
     * @return boolean 
     */
    public function getMajor()
    {
        return $this->major;
    }

    /**
     * Set statusCode
     *
     * @param boolean $statusCode
     * @return Sites
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    
        return $this;
    }

    /**
     * Get statusCode
     *
     * @return boolean 
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set team
     *
     * @param boolean $team
     * @return Sites
     */
    public function setTeam($team)
    {
        $this->team = $team;
    
        return $this;
    }

    /**
     * Get team
     *
     * @return boolean 
     */
    public function getTeam()
    {
        return $this->team;
    }
}