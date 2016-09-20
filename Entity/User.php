<?php

namespace Pdx\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Pdx\ApiBundle\Entity\Project;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user")
 * @UniqueEntity("username")
 * @UniqueEntity("email")
 */
class User extends BaseUser
{
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Project
     *
     * @ORM\OneToMany(targetEntity="Pdx\ApiBundle\Entity\Project", mappedBy="creator")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    protected $projects;

    public function __construct()
    {
        parent::__construct();

        //$this->roles = array('ROLE_MEMBER');
        $this->projects = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Project
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param Project $projects
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
    }

}