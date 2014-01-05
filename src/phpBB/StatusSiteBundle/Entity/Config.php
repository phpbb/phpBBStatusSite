<?php

namespace phpBB\StatusSiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="config")
 */
class Config
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $config_name;

    /**
     * @ORM\Column(type="string")
     */
    protected $config_value;

    public function __toString()
    {
        return (string) $this->getConfigName();
    }

    /**
     * Set config_name
     *
     * @param  string $configName
     * @return Config
     */
    public function setConfigName($configName)
    {
        $this->config_name = $configName;

        return $this;
    }

    /**
     * Get config_name
     *
     * @return string
     */
    public function getConfigName()
    {
        return $this->config_name;
    }

    /**
     * Set config_value
     *
     * @param  string $configValue
     * @return Config
     */
    public function setConfigValue($configValue)
    {
        $this->config_value = $configValue;

        return $this;
    }

    /**
     * Get config_value
     *
     * @return string
     */
    public function getConfigValue()
    {
        return $this->config_value;
    }
}
