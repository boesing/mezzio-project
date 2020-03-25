<?php

declare(strict_types=1);

namespace App\Handler;

use Boesing\Zend\Form\FormFactoryImplementingService;
use Mezzio\Router\RouterInterface;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function get_class;

class HomePageHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        $container->get(FormFactoryImplementingService::class);

        return new HomePageHandler(get_class($container), $router, $template);
    }
}
