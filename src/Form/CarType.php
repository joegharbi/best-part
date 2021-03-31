<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Engine;
use App\Entity\Model;
use App\Entity\Transmission;
use App\Entity\Year;
use App\Repository\CarRepository;
use App\Repository\EngineRepository;
use App\Repository\ModelRepository;
use App\Repository\PartCarRepository;
use App\Repository\TransmissionRepository;
use App\Repository\YearRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\ArrayType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    /**
     * @var PartCarRepository
     */
    private $partCarRepository;
    /**
     * @var CarRepository
     */
    private $carRepository;
    /**
     * @var EngineRepository
     */
    private $engineRepository;
    /**
     * @var ModelRepository
     */
    private $modelRepository;
    /**
     * @var YearRepository
     */
    private $yearRepository;
    /**
     * @var TransmissionRepository
     */
    private $transmissionRepository;

    public function __construct(CarRepository $carRepository,TransmissionRepository $transmissionRepository,YearRepository $yearRepository,ModelRepository $modelRepository, EngineRepository $engineRepository, PartCarRepository $partCarRepository)
    {
        $this->partCarRepository = $partCarRepository;
        $this->carRepository = $carRepository;
        $this->engineRepository = $engineRepository;
        $this->modelRepository = $modelRepository;
        $this->yearRepository = $yearRepository;
        $this->transmissionRepository = $transmissionRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $data = $builder->getData();
        if (!$data['model']) {
            throw new Exception('No Models yet');
        }




        $builder->addEventListener(
            FormEvents::PRE_SET_DATA
            , function (FormEvent $event) use ($data){
            $engine=$this->engineRepository->getEngineByModel($data['model']);
            if (!$engine) {
                throw new Exception('No engines yet');
            }

            $year=$this->yearRepository->getYearByModel($data['model']);

            if (!$year) {
                throw new Exception('No Year yet');
            }
            $transmission=$this->transmissionRepository->getTransmissionByModel($data['model']);

            if (!$transmission) {
                throw new Exception('No Year yet');
            }
            $form = $event->getForm();

            $form->add('engine', EntityType::class, [
                'class'=>Engine::class,
                'placeholder'=>'-- Please select Engine type --',
                'choices' => $engine,
            ]);
            $form->add('year', EntityType::class, [
                'class'=>Year::class,
                'placeholder'=>'-- Please select Year model --',
                'choices' => $year,
            ]);
            $form->add('transmission', EntityType::class, [
                'class'=>Transmission::class,
                'placeholder'=>'-- Please select Transmission type --',
                'choices' => $transmission,
            ]);
        });

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT
            , function (FormEvent $event) {


        });
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
