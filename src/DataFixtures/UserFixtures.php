<?php
namespace App\DataFixtures;


use DateTime;
use App\Entity\User;
use App\Entity\Friend;
use App\Entity\Message;
use App\Entity\UserMessage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;


class UserFixtures extends Fixture {
    private $hasher;

    public function __construct() {
        $factory = new PasswordHasherFactory([  'common' => ['algorithm' => 'bcrypt'],
                                                'memory-hard' => ['algorithm' => 'sodium'],
                                            ]);
        $this->hasher =  $factory->getPasswordHasher('common');
    }


    public function load(ObjectManager $manager) {

        // ************** USERS ************** //
        $user1 = new User();
        $user1  ->setLogin("Marhalt")
                ->setEmail("marhalt@hotmail.com")
                ->setPassword($this->hasher->hash('V9FSGyAW'))
                ->setRole("ROLE_USER")
                ->setImage(NULL)
                ->setActif(1);
        $manager->persist($user1);
        $manager->flush();

        $user2 = new User();
        $user2  ->setLogin("Andhromede")
                ->setEmail("andhromede@hotmail.fr")
                ->setPassword($this->hasher->hash('Fm8APqpp'))
                ->setRole("ROLE_ADMIN")
                ->setImage(NULL)
                ->setActif(1);
        $manager->persist($user2);
        $manager->flush();

        $user3 = new User();
        $user3  ->setLogin("Admin")
                ->setEmail("admin@gmail.com")
                ->setPassword($this->hasher->hash('admin'))
                ->setRole("ROLE_ADMIN")
                ->setImage(NULL)
                ->setActif(1);
        $manager-> persist($user3);
        $manager->flush();

        $user4 = new User();
        $user4  ->setLogin("Lydlus")
                ->setEmail("lydlus@hotmail.com")
                ->setPassword($this->hasher->hash('mwmcXpZP'))
                ->setRole("ROLE_USER")
                ->setImage(NULL)
                ->setActif(1);
        $manager-> persist($user4);
        $manager->flush();

        $user5 = new User();
        $user5  ->setLogin("Tamaya")
                ->setEmail("tamaya@orange.fr")
                ->setPassword($this->hasher->hash('Fm8APqpp'))
                ->setRole("ROLE_USER")
                ->setImage(NULL)
                ->setActif(0);
        $manager-> persist($user5);
        $manager->flush();

        $user6 = new User();
        $user6  ->setLogin("Lydlana")
                ->setEmail("lydlana@hotmail.fr")
                ->setPassword($this->hasher->hash('mwmcXpZP'))
                ->setRole("ROLE_USER")
                ->setImage(NULL)
                ->setActif(1);
        $manager-> persist($user6);
        $manager->flush();

        $user5 = new User();
        $user5  ->setLogin("Andhromede")
                ->setEmail("andhromede@hotmail.com")
                ->setPassword($this->hasher->hash('Fm8APqpp'))
                ->setRole("ROLE_USER")
                ->setImage(NULL)
                ->setActif(0);
        $manager-> persist($user5);
        $manager->flush();




        // ************** RELATIONS ************** //
        $friend = new Friend();
        $friend ->setUser($user3)
                ->setFriend($user4)
                ->setFriendDate(date('d-m-Y'))
                ->setStatus("waiting");
        $manager->persist($friend);
        $manager->flush();

        $friend = new Friend();
        $friend ->setUser($user1)
                ->setFriend($user2)
                ->setFriendDate(date('d-m-Y'))
                ->setStatus("validated");
        $manager->persist($friend);
        $manager->flush();

        $friend = new Friend();
        $friend ->setUser($user5)
                ->setFriend($user6)
                ->setFriendDate(date('d-m-Y'))
                ->setStatus("refused");
        $manager->persist($friend);
        $manager->flush();

        $friend = new Friend();
        $friend ->setUser($user6)
                ->setFriend($user2)
                ->setFriendDate(date('d-m-Y'))
                ->setStatus("validated");
        $manager->persist($friend);
        $manager->flush();

        $friend = new Friend();
        $friend ->setUser($user1)
                ->setFriend($user5)
                ->setFriendDate(date('d-m-Y'))
                ->setStatus("validated");
        $manager->persist($friend);
        $manager->flush();

        $friend = new Friend();
        $friend ->setUser($user3)
                ->setFriend($user4)
                ->setFriendDate(date('d-m-Y'))
                ->setStatus("refused");
        $manager->persist($friend);
        $manager->flush();

        $friend = new Friend();
        $friend ->setUser($user5)
                ->setFriend($user1)
                ->setFriendDate(date('d-m-Y'))
                ->setStatus("waiting");
        $manager->persist($friend);
        $manager->flush();

        $friend = new Friend();
        $friend ->setUser($user1)
                ->setFriend($user6)
                ->setFriendDate(date('d-m-Y'))
                ->setStatus("refused");
        $manager->persist($friend);
        $manager->flush();




        // ************** MESSAGES ************** //
		// $tab = [
		// 	1=>["Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!", date('d-m-Y'), $user1->getId()],
		// 	1=>["Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!", date('d-m-Y'), $user1->getId()],
		// ];

        // for($j=1 ; $j<=6; $j++){
        //     ${'user'.$j} = new UserMessage();
        //     ${'user'.$j} ->setUser(${'user'.$j})
        //                  ->setMessage(${'message'.$j});
        //     $manager->persist(${'userMessage'.$j});
        //     $manager->flush();
        // }
		

        $message1 = new Message();
        $message1 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user1->getId());
        $manager->persist($message1);
        $manager->flush();

        $message2 = new Message();
        $message2 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user2->getId());
        $manager->persist($message2);
        $manager->flush();

        $message3 = new Message();
        $message3 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user3->getId());
        $manager->persist($message3);
        $manager->flush();

        $message4 = new Message();
        $message4 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user4->getId());
        $manager->persist($message4);
        $manager->flush();

        $message5 = new Message();
        $message5 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user5->getId());
        $manager->persist($message5);
        $manager->flush();
        
        $message6 = new Message();
        $message6 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user6->getId());
        $manager->persist($message6);
        $manager->flush();




        // ************** REPONSES ************** //
        $message7 = new Message();
        $message7 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user1->getId())
                ->setMessageId($message6->getId());
        $manager->persist($message7);
        $manager->flush();

        $message8 = new Message();
        $message8 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user3->getId())
                ->setMessageId($message5->getId());
        $manager->persist($message8);
        $manager->flush();

        $message9 = new Message();
        $message9 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user5->getId())
                ->setMessageId($message4->getId());
        $manager->persist($message9);
        $manager->flush();

        $message10 = new Message();
        $message10 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user6->getId())
                ->setMessageId($message3->getId());
        $manager->persist($message10);
        $manager->flush();

        $message11 = new Message();
        $message11 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user5->getId())
                ->setMessageId($message2->getId());
        $manager->persist($message11);
        $manager->flush();

        $message12 = new Message();
        $message12 ->setText("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores, perspiciatis. Libero ut amet, totam facilis impedit ducimus iusto pariatur, odio reprehenderit quod est veniam vel maiores provident dolore corporis tenetur!")
                ->setPostDate(date('d-m-Y'))
                ->setSenderId($user3->getId())
                ->setMessageId($message1->getId());
        $manager->persist($message12);
        $manager->flush();



        // ************** USER MESSAGE ************** //
        for($i = 1 ; $i<=6; $i++){
            ${'userMessage'.$i} = new UserMessage();
            ${'userMessage'.$i}  ->setUser(${'user'.$i})
                                ->setMessage(${'message'.$i});
            $manager->persist(${'userMessage'.$i});
            $manager->flush();
        }
    }

}