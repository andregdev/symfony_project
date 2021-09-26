<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{

    /** @var UsersRepository $userRepository */
    private $usersRepository;

    /**
     * AuthController Constructor
     *
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @Route("/auth", name="auth")
     */
    public function index(): Response
    {
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }

    /**
     * api route redirects
     * @return Response
     */
    public function api()
    {
        return new Response(sprintf("Logged in as %s", $this->getUser()->getUsername()));
    }

    /**
     * Register new user
     * @param Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {
        $newUserData['email']    = $request->get('email');
        $newUserData['password'] = $request->get('password');

        $user = $this->usersRepository->createNewUser($newUserData);
        return new Response(sprintf('User %s successfully created', $user->getUsername()));
    }
}
