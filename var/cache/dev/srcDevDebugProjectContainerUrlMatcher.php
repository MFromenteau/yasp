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
            if (0 === strpos($pathinfo, '/user/register')) {
                // test
                if ('/user/register' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\UserCtrl::test',  '_route' => 'test',);
                }

                // enregistrement
                if ('/user/register' === $pathinfo) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_enregistrement;
                    }

                    return array (  '_controller' => 'App\\Controller\\UserCtrl::register',  '_route' => 'enregistrement',);
                }
                not_enregistrement:

            }

            elseif (0 === strpos($pathinfo, '/user/login')) {
                // login
                if ('/user/login' === $pathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_login;
                    }

                    return array (  '_controller' => 'App\\Controller\\UserCtrl::login',  '_route' => 'login',);
                }
                not_login:

                // loginPost
                if ('/user/login' === $pathinfo) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_loginPost;
                    }

                    return array (  '_controller' => 'App\\Controller\\UserCtrl::loginPost',  '_route' => 'loginPost',);
                }
                not_loginPost:

            }

            // connecte
            if (preg_match('#^/user/(?P<id>[^/]++)/connecte$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_connecte;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'connecte')), array (  '_controller' => 'App\\Controller\\UserCtrl::isLoggedIn',));
            }
            not_connecte:

            // deconnexion
            if ('/user/deconnexion' === $pathinfo) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_deconnexion;
                }

                return array (  '_controller' => 'App\\Controller\\UserCtrl::logout',  '_route' => 'deconnexion',);
            }
            not_deconnexion:

        }

        // theme
        if ('/video/theme' === $pathinfo) {
            if ('GET' !== $canonicalMethod) {
                $allow[] = 'GET';
                goto not_theme;
            }

            return array (  '_controller' => 'App\\Controller\\VideoCtrl::getVideoByTheme',  '_route' => 'theme',);
        }
        not_theme:

        // recherche
        if (preg_match('#^/(?P<id>[^/]++)/video$#s', $pathinfo, $matches)) {
            if ('GET' !== $canonicalMethod) {
                $allow[] = 'GET';
                goto not_recherche;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'recherche')), array (  '_controller' => 'App\\Controller\\VideoCtrl::getVideoById',));
        }
        not_recherche:

        if (0 === strpos($pathinfo, '/video')) {
            if (0 === strpos($pathinfo, '/video/upload')) {
                // upload
                if ('/video/upload/' === $pathinfo) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_upload;
                    }

                    return array (  '_controller' => 'App\\Controller\\VideoCtrl::upload',  '_route' => 'upload',);
                }
                not_upload:

                // uploadGET
                if ('/video/upload' === $trimmedPathinfo) {
                    if ('GET' !== $canonicalMethod) {
                        $allow[] = 'GET';
                        goto not_uploadGET;
                    }

                    $ret = array (  '_controller' => 'App\\Controller\\VideoCtrl::uploadGet',  '_route' => 'uploadGET',);
                    if (substr($pathinfo, -1) !== '/') {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'uploadGET'));
                    }

                    return $ret;
                }
                not_uploadGET:

            }

            // liste
            if (preg_match('#^/video/(?P<id>[^/]++)/liste$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_liste;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'liste')), array (  '_controller' => 'App\\Controller\\VideoCtrl::getAllVideoByIdUser',));
            }
            not_liste:

            // nouveau
            if (preg_match('#^/video/(?P<id_Video>[^/]++)/nouveau$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_nouveau;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'nouveau')), array (  '_controller' => 'App\\Controller\\VideoCtrl::createCommentGet',));
            }
            not_nouveau:

            // supression
            if (preg_match('#^/video/(?P<id_Video>[^/]++)/supression$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_supression;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'supression')), array (  '_controller' => 'App\\Controller\\VideoCtrl::deleteCommentGet',));
            }
            not_supression:

            // edit
            if (preg_match('#^/video/(?P<id_Video>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if ('POST' !== $canonicalMethod) {
                    $allow[] = 'POST';
                    goto not_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit')), array (  '_controller' => 'App\\Controller\\VideoCtrl::modifyComment',));
            }
            not_edit:

            // commentaire_by_user
            if (preg_match('#^/video/(?P<id>[^/]++)/com_by_user$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_commentaire_by_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'commentaire_by_user')), array (  '_controller' => 'App\\Controller\\VideoCtrl::GetCommentByUser',));
            }
            not_commentaire_by_user:

            // commentaire_by_video
            if ('/video/{$id_Video}/com_by_video' === $pathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_commentaire_by_video;
                }

                return array (  '_controller' => 'App\\Controller\\VideoCtrl::GetCommentByVid',  '_route' => 'commentaire_by_video',);
            }
            not_commentaire_by_video:

            // achat
            if ('/video/{$id_Video}/achat' === $pathinfo) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_achat;
                }

                return array (  '_controller' => 'App\\Controller\\VideoCtrl::acheterGet',  '_route' => 'achat',);
            }
            not_achat:

            // commentaire_by_id
            if (0 === strpos($pathinfo, '/video/com_by_id') && preg_match('#^/video/com_by_id/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ('GET' !== $canonicalMethod) {
                    $allow[] = 'GET';
                    goto not_commentaire_by_id;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'commentaire_by_id')), array (  '_controller' => 'App\\Controller\\VideoCtrl::GetCommentById',));
            }
            not_commentaire_by_id:

        }

        // _twig_error_test
        if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
