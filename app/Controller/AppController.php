<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'posts',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
             'authorize' => array('Controller')
        )
    );


/*function _setErrorLayout() {  
     return $this->redirect($this->Auth->redirect());  
}              

function beforeRender () {  
      return $this->redirect($this->Auth->redirect());
    }*/


}
