<?php

namespace TTV\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="TTV\WebsiteBundle\Repository\VideoRepository")
 * @UniqueEntity(fields={"url"}, message="Une vidéo existe déjà avec ce lien")
 */
class Video
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, unique=true)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity="TTV\WebsiteBundle\Entity\Trick", inversedBy="videos")
     */
    private $trick;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Video
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
     * Set trick
     *
     * @param \TTV\WebsiteBundle\Entity\Trick $trick
     *
     * @return Video
     */
    public function setTrick(Trick $trick)
    {
        $this->trick = $trick;

        return $this;
    }

    /**
     * Get trick
     *
     * @return \TTV\WebsiteBundle\Entity\Trick
     */
    public function getTrick()
    {
        return $this->trick;
    }
}
