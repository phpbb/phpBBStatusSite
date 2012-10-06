<?php

namespace phpBB\StatusSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sites")
 */
class Sites
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
     * @return Sites
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
     * @return Sites
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
     * @return Sites
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
     * @return Sites
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
     * Set front_page
     *
     * @param boolean $frontPage
     * @return Sites
     */
    public function setFrontPage($frontPage)
    {
        $this->front_page = $frontPage;
    
        return $this;
    }

    /**
     * Get front_page
     *
     * @return boolean 
     */
    public function getFrontPage()
    {
        return $this->front_page;
    }
}