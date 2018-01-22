<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request;
        $requestMethod = $canonicalMethod = $context->getMethod();
        $scheme = $context->getScheme();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }


        if (0 === strpos($pathinfo, '/abonnement')) {
            // abonnement
            if (0 === strpos($pathinfo, '/abonnement/user') && preg_match('#^/abonnement/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_abonnement;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'abonnement')), array (  '_controller' => 'App\\Controller\\AbonnementCtrl::getAbo',));
            }
            not_abonnement:

            // historique_abo
            if (0 === strpos($pathinfo, '/abonnement/historique') && preg_match('#^/abonnement/historique(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_historique_abo;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'historique_abo')), array (  '_controller' => 'App\\Controller\\AbonnementCtrl::getHistoAbo',));
            }
            not_historique_abo:

            // renouvellement_abo
            if (0 === strpos($pathinfo, '/abonnement/renouvellement') && preg_match('#^/abonnement/renouvellement(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_renouvellement_abo;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'renouvellement_abo')), array (  '_controller' => 'App\\Controller\\AbonnementCtrl::renouvelle',));
            }
            not_renouvellement_abo:

            // souscription
            if (0 === strpos($pathinfo, '/abonnement/souscription') && preg_match('#^/abonnement/souscription/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_souscription;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'souscription')), array (  '_controller' => 'App\\Controller\\AbonnementCtrl::souscrit',));
            }
            not_souscription:

            // annulation_abo
            if (0 === strpos($pathinfo, '/abonnement/annulation') && preg_match('#^/abonnement/annulation(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_annulation_abo;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'annulation_abo')), array (  '_controller' => 'App\\Controller\\AbonnementCtrl::annule',));
            }
            not_annulation_abo:

        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'App\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if (substr($pathinfo, -1) !== '/') {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }

        if (0 === strpos($pathinfo, '/paiement')) {
            // emis
            if (0 === strpos($pathinfo, '/paiement/emis') && preg_match('#^/paiement/emis/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_emis;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'emis')), array (  '_controller' => 'App\\Controller\\PaiementCtrl::getPaiementEmis',));
            }
            not_emis:

            if (0 === strpos($pathinfo, '/paiement/effectuer')) {
                // effectuer
                if (preg_match('#^/paiement/effectuer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_effectuer;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'effectuer')), array (  '_controller' => 'App\\Controller\\PaiementCtrl::effectuerPaiement',));
                }
                not_effectuer:

                // effectuerGet
                if (preg_match('#^/paiement/effectuer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_effectuerGet;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'effectuerGet')), array (  '_controller' => 'App\\Controller\\PaiementCtrl::effectuerPaiementGet',));
                }
                not_effectuerGet:

            }

            elseif (0 === strpos($pathinfo, '/paiement/creer')) {
                // creation
                if (preg_match('#^/paiement/creer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_creation;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'creation')), array (  '_controller' => 'App\\Controller\\PaiementCtrl::createPaiement',));
                }
                not_creation:

                // creationGET
                if (preg_match('#^/paiement/creer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_creationGET;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'creationGET')), array (  '_controller' => 'App\\Controller\\PaiementCtrl::createPaiementGET',));
                }
                not_creationGET:

            }

            elseif (0 === strpos($pathinfo, '/paiement/remboursement')) {
                // remboursement
                if (preg_match('#^/paiement/remboursement/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_remboursement;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'remboursement')), array (  '_controller' => 'App\\Controller\\PaiementCtrl::refund',));
                }
                not_remboursement:

                // remboursementGet
                if (preg_match('#^/paiement/remboursement/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_remboursementGet;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'remboursementGet')), array (  '_controller' => 'App\\Controller\\PaiementCtrl::refundGet',));
                }
                not_remboursementGet:

            }

        }

        elseif (0 === strpos($pathinfo, '/user')) {
            // enregistrement
            if ('/user/register' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_enregistrement;
                }

                return array (  '_controller' => 'App\\Controller\\UserCtrl::register',  '_route' => 'enregistrement',);
            }
            not_enregistrement:

            // loginPost
            if ('/user/login' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_loginPost;
                }

                return array (  '_controller' => 'App\\Controller\\UserCtrl::loginPost',  '_route' => 'loginPost',);
            }
            not_loginPost:

            // isLoggedIn
            if (preg_match('#^/user/(?P<id>[^/]++)/isLoggedIn$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_isLoggedIn;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'isLoggedIn')), array (  '_controller' => 'App\\Controller\\UserCtrl::isLoggedIn',));
            }
            not_isLoggedIn:

            // deconnexion
            if ('/user/deconnexion' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_deconnexion;
                }

                return array (  '_controller' => 'App\\Controller\\UserCtrl::logout',  '_route' => 'deconnexion',);
            }
            not_deconnexion:

            // profil
            if (preg_match('#^/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_profil;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'profil')), array (  '_controller' => 'App\\Controller\\UserCtrl::getProfil',));
            }
            not_profil:

            // getlisteVideoByUserId
            if (preg_match('#^/user/(?P<id>[^/]++)/video/list$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_getlisteVideoByUserId;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'getlisteVideoByUserId')), array (  '_controller' => 'App\\Controller\\VideoCtrl::getAllVideoByIdUser',));
            }
            not_getlisteVideoByUserId:

            // getAllCommentByUserId
            if (preg_match('#^/user/(?P<id>[^/]++)/comment/list$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_getAllCommentByUserId;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'getAllCommentByUserId')), array (  '_controller' => 'App\\Controller\\VideoCtrl::getAllCommentByUserId',));
            }
            not_getAllCommentByUserId:

        }

        elseif (0 === strpos($pathinfo, '/video')) {
            // getThemeByVideoId
            if (preg_match('#^/video/(?P<id>[^/]++)/theme$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_getThemeByVideoId;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'getThemeByVideoId')), array (  '_controller' => 'App\\Controller\\VideoCtrl::getThemeByVideoId',));
            }
            not_getThemeByVideoId:

            // getVideoById
            if (preg_match('#^/video/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'getVideoById')), array (  '_controller' => 'App\\Controller\\VideoCtrl::getVideoById',));
            }

            // uploadVideo
            if ('/video/upload/' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_uploadVideo;
                }

                return array (  '_controller' => 'App\\Controller\\VideoCtrl::uploadVideo',  '_route' => 'uploadVideo',);
            }
            not_uploadVideo:

            // newComment
            if (preg_match('#^/video/(?P<id>[^/]++)/new/comment$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_newComment;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'newComment')), array (  '_controller' => 'App\\Controller\\VideoCtrl::createCommentByIdVideo',));
            }
            not_newComment:

            // deleteComment
            if (preg_match('#^/video/(?P<id>[^/]++)/delete/comment$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_deleteComment;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'deleteComment')), array (  '_controller' => 'App\\Controller\\VideoCtrl::deleteCommentByIdVideo',));
            }
            not_deleteComment:

            // editComment
            if (preg_match('#^/video/(?P<id>[^/]++)/edit/comment$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_editComment;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'editComment')), array (  '_controller' => 'App\\Controller\\VideoCtrl::editComment',));
            }
            not_editComment:

            // getAllCommentByVideoId
            if (preg_match('#^/video/(?P<id>[^/]++)/comment/list$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_getAllCommentByVideoId;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'getAllCommentByVideoId')), array (  '_controller' => 'App\\Controller\\VideoCtrl::getAllCommentByVideoId',));
            }
            not_getAllCommentByVideoId:

            // buyVideoById
            if (preg_match('#^/video/(?P<id>[^/]++)/buy$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_buyVideoById;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'buyVideoById')), array (  '_controller' => 'App\\Controller\\VideoCtrl::buyVideoById',));
            }
            not_buyVideoById:

        }

        // getCommentById
        if (0 === strpos($pathinfo, '/comment') && preg_match('#^/comment/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if ('GET' !== $canonicalMethod) {
                $allow[] = 'GET';
                goto not_getCommentById;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'getCommentById')), array (  '_controller' => 'App\\Controller\\VideoCtrl::getCommentById',));
        }
        not_getCommentById:

        // _twig_error_test
        if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
