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
     * @ORM\Column(type="integer")
     */
	protected $site_id;

	/**
	 * @ORM\Column(type="time")
	 */
	protected $start_time;

	/**
	 * @ORM\Column(type="time")
	 */
	protected $end_time;

    /**
     * @ORM\Column(type="integer")
     */
	protected $update_id;

    /**
     * @ORM\Column(type="boolean")
     */
	protected $up_down;

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
}