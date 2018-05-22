<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

//EntiteitType vervangen door b.v. KlantType
class BestelOpdrachtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
        $builder
            ->add('naamLeverancier', TextType::class) //naam is b.v. een attribuut of variabele van klant
        ;

        $builder
            ->add('hoeveelheidBesteldArtikel', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('ontvangen', IntegerType::class) //naam is b.v. een attribuut of variabele van klant
        ;
        $builder
            ->add('kwaliteit', TextType::class)
        ;
        //naam is b.v. een attribuut of variabele van klant
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Bestelopdracht', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
