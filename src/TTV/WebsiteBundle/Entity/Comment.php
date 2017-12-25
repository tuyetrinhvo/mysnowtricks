<?php

namespace TTV\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="TTV\WebsiteBundle\Repository\CommentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Assert\DateTime()
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="4", minMessage="Le commentaire doit faire au moins 4 caractères.",
     *     max="1000", maxMessage="Le commentaire ne doit pas dépasser 1000 caractères.")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="TTV\WebsiteBundle\Entity\Trick", inversedBy="comments")
     * @Assert\Valid()
     */
    private $trick;

    /**
     * @ORM\ManyToOne(targetEntity="TTV\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid()
     */
    private $user;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function increase()
    {
        $this->getTrick()->increaseComment();
    }

    /**
     * @ORM\PreRemove
     */
    public function decrease()
    {
        $this->getTrick()->decreaseComment();
    }

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set trick
     *
     * @param \TTV\WebsiteBundle\Entity\Trick $trick
     *
     * @return Comment
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

    /**
     * Set user
     *
     * @param \TTV\UserBundle\Entity\User $user
     *
     * @return Comment
     */
    public function setUser(\TTV\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TTV\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
