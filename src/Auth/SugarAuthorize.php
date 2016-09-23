<?php

namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Network\Request;
use Cake\Core\Configure;

class SugarAuthorize extends BaseAuthorize
{
    public function authorize($user, Request $request)
    {
    	$authorizations = Configure::read('authorizations');

    	if (isset($authorizations[$request->params['controller']])) {
    		if (isset($authorizations[$request->params['controller']][$request->params['action']])) {

    			if (isset($authorizations[$request->params['controller']][$request->params['action']]['allow'])) {
    				foreach ($authorizations[$request->params['controller']][$request->params['action']]['allow'] as $key => $value) {
    		    		if (strtolower($user['role']['name']) == strtolower($value)) {
	    					return true;
	    				}
    				}
    			}
    		}
    	}
        return false;
    }
}