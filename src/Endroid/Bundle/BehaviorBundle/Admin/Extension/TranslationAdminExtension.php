<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\Bundle\BehaviorBundle\Admin\Extension;

use Endroid\Bundle\BehaviorBundle\Model\TranslationInterface;
use Sonata\AdminBundle\Admin\AdminExtension;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class TranslationAdminExtension extends AdminExtension implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * Configure form fields.
     *
     * @param FormMapper $formMapper
     */
    public function configureFormFields(FormMapper $formMapper)
    {
        $subject = $formMapper->getAdmin()->getSubject();
        $translatable = $subject->getTranslatable();

        $formMapper
            ->with('General')
                ->add('translatable', 'hidden', array(
                    'data' => $translatable->getId(),
                    'mapped' => false
                ))
            ->end()
        ;
    }

    /**
     * Configure list fields.
     *
     * @param ListMapper $listMapper
     */
    public function configureListFields(ListMapper $listMapper)
    {
        $twigGlobals = $this->container->get('twig')->getGlobals();

        // Only show translations when at least two locales are available
        if (!isset($twigGlobals['locales']) || count($twigGlobals['locales']) < 2) {
            return;
        }

        $listMapper
            ->add('translations', 'string', array(
                'label' => 'admin.behavior.translatable.translations',
                'template' => 'EndroidBehaviorBundle:Admin:translations.html.twig'
            ));
    }

    /**
     * Handles new instance creation.
     *
     * @param AdminInterface       $admin
     * @param TranslationInterface $object
     */
    public function alterNewInstance(AdminInterface $admin, $object)
    {
        if ($object->getLocale() === null) {
            $object->setLocale($this->container->get('request')->query->get('locale'));
        }

        $translatable = $object->getTranslatable();
        if ($translatable === null) {
            $translatableClass = get_class($object).'Translatable';
            $uniqid = $this->container->get('request')->query->get('uniqid');
            if ($uniqid === null) {
                $translatableId = $this->container->get('request')->query->get('translatable');
            } else {
                $parameters = $this->container->get('request')->request->get($uniqid);
                $translatableId = $parameters['translatable'];
            }
            $translatable = $this->container->get('doctrine')->getRepository($translatableClass)->findOneById($translatableId);
            if ($translatable === null) {
                $translatable = new $translatableClass();
            }
            $object->setTranslatable($translatable);
        }
    }
}
