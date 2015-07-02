<?php
/**
 * AbstractViewer.php
 *
 * @since 29/05/15
 * @author gseidel
 */

namespace enhavo\AdminBundle\Viewer;


use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractViewer implements ContainerAwareInterface
{
    private $resource;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    private $request;

    /**
     * @var \Symfony\Component\Form\Form
     */
    private $form;

    /**
     * @var \enhavo\AdminBundle\Config\ConfigParser
     */
    private $config;

    /**
     * @var string
     */
    private $bundlePrefix;

    /**
     * @var string
     */
    private $resourceName;

    /**
     * @param mixed $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param mixed $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    public function dispatchEvent()
    {

    }

    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
        $this->config->setDefault($this->getDefaultConfig());
    }

    public function getDefaultConfig()
    {
        return array();
    }
    
    abstract function getParameters();

    public function getTheme()
    {
        return '::admin.html.twig';
    }

    protected function getTemplateVars()
    {
        $parameters = $this->getConfig()->get('parameters');
        if(!is_array($parameters)) {
            return array();
        }
        return $parameters;
    }

    public function getTemplate()
    {
        return 'enhavoAdminBundle:App:index.html.twig';
    }

    public function setBundlePrefix($bundlePrefix)
    {
        $this->bundlePrefix = $bundlePrefix;
    }

    public function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
    }

    /**
     * @return string
     */
    public function getBundlePrefix()
    {
        return $this->bundlePrefix;
    }

    /**
     * @return string
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }
}