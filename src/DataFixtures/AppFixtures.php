<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\Support;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture {

    public function load(ObjectManager $manager) {
        for ($i = 0; $i < 3; $i++) {
            $project = new Project();
            $project->setLabel("Projet " . $i);
            $project->setEnable(true);

            $manager->persist($project);

            for ($j = 0; $j < 10; $j++) {
                $support = new Support();
                $support->setTitle('Support N°' . $i);
                $support->setDescription('La description du support ' . $i);
                $support->setProject($project);

                $manager->persist($support);
            }
        }

        $manager->flush();
    }

}
