<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Fp\OpenIdBundle\FpOpenIdBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\MediaBundle\SonataMediaBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new RaulFraile\Bundle\LadybugBundle\RaulFraileLadybugBundle(),
            new Gregwar\CaptchaBundle\GregwarCaptchaBundle(),
            new Netvlies\Bundle\NetvliesFormBundle\NetvliesFormBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
            new FOS\ElasticaBundle\FOSElasticaBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new JMS\I18nRoutingBundle\JMSI18nRoutingBundle(),

            // Project specific bundles
            new Endroid\Bundle\AdminBundle\EndroidAdminBundle(),
            new Endroid\Bundle\BehaviorBundle\EndroidBehaviorBundle(),
            new Endroid\Bundle\MediaBundle\EndroidMediaBundle(),
            new Endroid\Bundle\MenuBundle\EndroidMenuBundle(),
            new Endroid\Bundle\NewsBundle\EndroidNewsBundle(),
            new Endroid\Bundle\PageBundle\EndroidPageBundle(),
            new Endroid\Bundle\RouteBundle\EndroidRouteBundle(),
            new Endroid\Bundle\SearchBundle\EndroidSearchBundle(),
            new Endroid\Bundle\SiteBundle\EndroidSiteBundle(),
            new Endroid\Bundle\SitemapBundle\EndroidSitemapBundle(),
            new Endroid\Bundle\UserBundle\EndroidUserBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
