<?php
namespace app\api\v1;

use \app\inc\Input;
use \app\inc\Session;

class Meta extends \app\inc\Controller
{
    private $layers;

    function __construct()
    {
        $this->layers = new \app\models\Layer();
    }

    public function get_index()
    {
        $q = Input::getPath()->part(5);
        $split = explode(".",$q);
        if (sizeof($split) == 1) {
            return $this->layers->getAll($q, null, Session::isAuth(), Input::get("iex"), Input::get("parse"), Input::get("es"));
        }
        else {
            return $this->layers->getAll(null, $q, Session::isAuth(), Input::get("iex"), Input::get("parse"), Input::get("es"));
        }
    }
}