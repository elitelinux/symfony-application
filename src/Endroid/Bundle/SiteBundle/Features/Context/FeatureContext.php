<?php

namespace Endroid\Bundle\SiteBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Feature context.
 */
class FeatureContext extends RawMinkContext implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given /^I am on "([^"]*)"$/
     */
    public function iAmOn($path)
    {
        $this->getSession()->visit($path);
    }

    /**
     * @Then /^I should see "([^"]*)"$/
     */
    public function iShouldSee($string)
    {
        $this->assertSession()->responseContains($string);
    }

}
