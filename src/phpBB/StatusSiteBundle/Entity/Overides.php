<?php

namespace phpBB\StatusSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="overides")
 */
class Overides
{
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
	 * @ORM\Column(type="datetime")
	 */
	protected $start_time;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $end_time;

    /**
     * @ORM\ManyToOne(targetEntity="Updates", inversedBy="updates")
     * @ORM\JoinColumn(name="update_id", referencedColumnName="id")
     */
        protected $update_id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
	protected $up_down;

	/**
	 * @ORM\Column(type="boolean")
	 **/
	protected $finished;

    function __construct()
    {

    }
	
	public function __toString()
	{
		return (string)$this->siteId();
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
     * Set site_id
     *
     * @param integer $siteId
     * @return Overides
     */
    public function setSiteId($siteId)
    {
        $this->site_id = $siteId;

        return $this;
    }

    /**
     * Get site_id
     *
     * @return integer
     */
    public function getSiteId()
    {
        return $this->site_id;
    }

    /**
     * Set start_time
     *
     * @param \DateTime $startTime
     * @return Overides
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get start_time
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set end_time
     *
     * @param \DateTime $endTime
     * @return Overides
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;

        return $this;
    }

    /**
     * Get end_time
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Set update_id
     *
     * @param integer $updateId
     * @return Overides
     */
    public function setUpdateId($updateId)
    {
        $this->update_id = $updateId;

        return $this;
    }

    /**
     * Get update_id
     *
     * @return integer
     */
    public function getUpdateId()
    {
        return $this->update_id;
    }

    /**
     * Set up_down
     *
     * @param boolean $upDown
     * @return Overides
     */
    public function setUpDown($upDown)
    {
        $this->up_down = $upDown;

        return $this;
    }

    /**
     * Get up_down
     *
     * @return boolean
     */
    public function getUpDown()
    {
        return $this->up_down;
    }

    /**
     * Add sites
     *
     * @param phpBB\StatusSiteBundle\Entity\Sites $sites
     * @return Overides
     */
    public function addSite(\phpBB\StatusSiteBundle\Entity\Sites $sites)
    {
        $this->sites[] = $sites;

        return $this;
    }

    /**
     * Remove sites
     *
     * @param phpBB\StatusSiteBundle\Entity\Sites $sites
     */
    public function removeSite(\phpBB\StatusSiteBundle\Entity\Sites $sites)
    {
        $this->sites->removeElement($sites);
    }

    /**
     * Get sites
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getSites()
    {
        return $this->sites;
    }

    /**
     * Set finished
     *
     * @param boolean $finished
     * @return Overides
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;
    
        return $this;
    }

    /**
     * Get finished
     *
     * @return boolean 
     */
    public function getFinished()
    {
        return $this->finished;
    }
}
