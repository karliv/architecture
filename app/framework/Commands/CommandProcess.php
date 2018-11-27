<?php

namespace Framework\Commands;


use Framework\ICommand;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

class CommandProcess implements ICommand
{
    public function execute(CommandArgs $args = null)
    {
        $matcher = new UrlMatcher($args->routeCollection, new RequestContext());
        $matcher->getContext()->fromRequest($args->request);

        try {
            $args->request->attributes->add($matcher->match($args->request->getPathInfo()));
            $args->request->setSession(new Session());

            $controller = (new ControllerResolver())->getController($args->request);
            $arguments = (new ArgumentResolver())->getArguments($args->request, $controller);

            $args->response = call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $e) {
            $args->response = new Response('Page not found. 404', Response::HTTP_NOT_FOUND);
        } catch (Throwable $e) {
            $args->response = new Response('Server error occurred. 404', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $args;
    }

}