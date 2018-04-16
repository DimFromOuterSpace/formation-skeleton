<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ProjectRepository")
 */
class Project {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type = "string", nullable = false)
     */
    private $label;

    /**
     * @var boolean
     *
     * @ORM\Column(type = "boolean", nullable = false)
     */
    private $status = true;

    /**
     * @var Support[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Support", mappedBy="project")
     */
    private $supports;

    public function __construct() {
        $this->supports = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getLabel(): string {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setEnable($status) {
        $this->status = $status;
    }

    public function isEnable() {
        return ($this->enable === true);
    }

    public function getSupports() {
        return $this->supports;
    }

    public function addSupports(Support $support) {
        $support->setProject($this);
        if (!$this->supports->contains($support)) {
            $this->supports->add($support);
        }
    }

    public function removeSupport(Support $support) {
        $this->supports->removeElement($support);
    }

    public function setSupport(Support $support) {
        $this->support->clear();
        foreach ($supports as $support) {
            $this->addSupport($support);
        }
    }

}
