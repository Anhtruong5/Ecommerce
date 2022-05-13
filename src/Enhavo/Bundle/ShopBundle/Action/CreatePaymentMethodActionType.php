<?php

namespace Enhavo\Bundle\ShopBundle\Action;

use Enhavo\Bundle\AppBundle\Action\AbstractActionType;
use Enhavo\Bundle\AppBundle\Action\Type\TransitionActionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreatePaymentMethodActionType extends AbstractActionType
{
    public function createViewData(array $options, $resource = null)
    {
        $data = parent::createViewData($options, $resource);
        return $data;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'component' => 'create-payment-method-action',
            'icon' => 'add_circle_outline',
            'label' => 'label.create',
            'translation_domain' => 'EnhavoAppBundle',
            'view_key' => 'edit-view',
            'target' => '_view',
            'route' => null
        ]);
    }

    public function getType()
    {
        return 'shop_create_payment_method';
    }
}
