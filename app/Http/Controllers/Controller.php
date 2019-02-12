<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $menuDashboard;
    protected $menuSite;

    public function __construct()
    {
        $this->menuSite = [];
        $this->menuDashboard = $this->initMenuDashboard();
    }


    protected function initMenuDashboard()
    {
        if(Cache::has('MENU_DASHBOARD')) {
            return Cache::get('MENU_DASHBOARD');
        }
        return $this->generateMenu();
    }

    protected function generateMenu()
    {
        $this->menuDashboard = [];

        $this->menuDashboard[0] = $this->createNode('Página Inicial',route('dashboard.init'),'dashboard',false);
        $this->menuDashboard[1] = $this->createNode('Administradores',route('administrators.index'),'user',false);
        $this->menuDashboard[2] = $this->createNode('Ofertas',route('offers.index'),'gift',false);
        # Disabled Temporary
        # $this->menuDashboard[3] = $this->createNode('Lojas',route('stores.index'),'crown',false);
        $this->menuDashboard[4] = $this->createNode('Newsletters',route('newsletters.index'),'email',false);

        Cache::forever('MENU_DASHBOARD',$this->menuDashboard);
        return $this->menuDashboard;
    }

    protected function activeMenu($key)
    {
        if(array_key_exists($key, $this->menuDashboard)) {
            $this->menuDashboard[$key]->active = true;
            return true;
        }
        return false;
    }

    protected function createNode( $name, $url, $icon, $active = false)
    {

        return (Object) [
            'name'=>$name,
            'url'=>$url,
            'icon'=>$icon,
            'active' => $active
        ];
    }


    public function test()
    {
        return view('teste_show');
    }

    public function exitCode( Request $request )
    {
        $html = file_get_contents($request->url);
        $pattern = "@<strong>R\\$(?: )*([0-9]+,[0-9]{2})</strong>@";
        $matches = [];
        preg_match_all($pattern, $html, $matches);


        dd($matches);
        return view('test')->with('content', $matches);
    }

}
