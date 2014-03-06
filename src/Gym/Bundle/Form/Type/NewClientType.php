<?php
/**
 * NewClientType.php
 *
 * @author		Pavel Galaton <pavel.galaton@gmail.com>
 */

namespace Gym\Bundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;

class NewClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $formBuilder, array $options)
    {
        $formBuilder->add('code');
        $formBuilder->add('first_name');
        $formBuilder->add('last_name');
        $formBuilder->add('birthday', new BirthdayType(), ['years' => range(date('Y') - 80, date('Y'))]);
        $formBuilder->add('email', 'email', ['required'    => false]);
        $formBuilder->add('phone');
        $formBuilder->add('save', 'submit');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'new_client';
    }

} 