<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Make;
use App\Entity\Model;
use App\Entity\Product;
use App\Entity\Purchase;
use App\Entity\PurchaseItem;
use App\Entity\SubCategory;
use App\Entity\User;
use Bezhanov\Faker\Provider\Commerce;
use Bluemmb\Faker\PicsumPhotosProvider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Liior\Faker\Prices;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    protected $slugger;


    public function __construct(SluggerInterface $slugger, UserPasswordEncoderInterface $encoder)
    {
        $this->slugger = $slugger;
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();
        $faker->addProvider(new Prices($faker));
        $faker->addProvider(new Commerce($faker));
        $faker->addProvider(new PicsumPhotosProvider($faker));


        $admin = new User();
        $hash = $this->encoder->encodePassword($admin, "password");
        $admin->setEmail("admin@gmail.com")
            ->setPassword($hash)
            ->setCreatedAt($faker->dateTimeBetween('-6 months'))
            ->setUpdatedAt($faker->dateTimeBetween('-5 months'))
            ->setFullName($faker->name())
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $users = [];
        for ($u = 0; $u < 5; $u++) {

            $user = new User();
            $hash = $this->encoder->encodePassword($user, "password");
            $user->setEmail("user$u@gmail.com")
                ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                ->setUpdatedAt($faker->dateTimeBetween('-5 months'))
                ->setFullName($faker->name())
                ->setPassword($hash);

            $users[] = $user;

            $manager->persist($user);

        }

        $products = [];

        for ($m = 0; $m < 3; $m++) {

            $make = new Make();
            $make->setName($faker->department);
            $models = [];
            $manager->persist($make);

            for ($md = 0; $md < 4; $md++) {

                $model = new Model();
                $model->setMake($make);
                $model->setName($faker->department);
                $model->setProductionYear($faker->year);

                $models[] = $model;
                $manager->persist($model);
            }

        }


        for ($c = 0; $c < 3; $c++) {
            $category = new Category();
            $category->setName($faker->department);
            //   ->setSlug(strtolower($this->slugger->slug($category->getName())));
            $manager->persist($category);
            $categories[] = $category;


            for ($sc = 0; $sc < mt_rand(3, 5); $sc++) {
                $subCategory = new SubCategory();
                $subCategory->setName($faker->department)
                    ->setCategory($category)
                    ->setSlug(strtolower($this->slugger->slug($subCategory->getName())));
                $manager->persist($subCategory);

                /**
                 * @var $models
                 */
                $selectedModels = $faker->randomElements($models);

                foreach ($selectedModels as $sm) {

                    for ($p = 0; $p < mt_rand(15, 20); $p++) {
                        $product = new Product;
                        $product->setName($faker->productName)
                            ->setPrice($faker->price(4000, 20000))
                            ->setModel($sm)
                            //   ->setSlug(strtolower($this->slugger->slug($product->getName())))
                            ->setSubcategory($subCategory)
                            ->setUpdatedAt($faker->dateTimeBetween('-6 months'))
                            ->setShortDescription($faker->paragraph())
                            ->setMainPicture($faker->imageUrl(400, 400, true));

                        $products[] = $product;

                        $manager->persist($product);
                    }
                }
            }
        }

        for ($p = 0; $p < mt_rand(20, 40); $p++) {
            $purchase = new Purchase;
            $purchase->setFullName($faker->name)
                ->setAddress($faker->streetAddress)
                ->setPostalCode($faker->postcode)
                ->setCity($faker->city)
                ->setUser($faker->randomElement($users))
                ->setTotal(mt_rand(2000, 30000))
                ->setPurchasedAt($faker->dateTimeBetween('-6 months'));


            $selectedProducts = $faker->randomElements($products, mt_rand(3, 5));

            foreach ($selectedProducts as $product) {
                $purchaseItem = new PurchaseItem();
                $purchaseItem->setProduct($product)
                    ->setQuantity(mt_rand(1, 3))
                    ->setProductName($product->getName())
                    ->setProductPrice($product->getPrice())
                    ->setTotal(
                        $purchaseItem->getProductPrice() * $purchaseItem->getQuantity()
                    )
                    ->setPurchase($purchase);
                $manager->persist($purchaseItem);

            }

            if ($faker->boolean(90)) {
                $purchase->setStatus(Purchase::STATUS_PAID);
            }
            $manager->persist($purchase);
        }


        $manager->flush();
    }
}
