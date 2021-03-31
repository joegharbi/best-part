<?php

namespace App\Form;

use App\Entity\Model;
use App\Repository\ModelRepository;
use PhpParser\Node\Expr\AssignOp\Mod;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class ModelType extends AbstractType
{
    /**
     * @var ModelRepository
     */
    private $modelRepository;

    public function __construct(ModelRepository $modelRepository)
    {

        $this->modelRepository = $modelRepository;
    }


    public function transform($issue): string
    {
        if (null === $issue) {
            return '';
        }

        return $issue->getId();
    }

    public function reverseTransform($issueNumber): ?Model
    {
        // no issue number? It's optional, so that's ok
        if (!$issueNumber) {
            return null;
        }

        $issue = $this->modelRepository->find($issueNumber);

        if (null === $issue) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $issueNumber
            ));
        }
        dd($issue);

        return $issue;

    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', EntityType::class, [
                'class' => Model::class,
            ]);
    }

    public
    function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Model::class
        ]);
    }
}
