<?php
declare(strict_types=1);
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\I18n\I18n;
class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $lang = $this->request->getSession()->read('Config.language');
        if (!$lang) {
            $identity = $this->Authentication->getIdentity();
            if ($identity) {
                $lang = $identity->get('language') ?? 'es';
            }
        }
        $lang = $lang ?? 'es';
	I18n::setLocale($lang === 'es' ? 'es_ES' : 'en_US');
    }
}
