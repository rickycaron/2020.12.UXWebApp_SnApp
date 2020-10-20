<?php


class Menu_model
{
    private $menu_items;

    /**
     * Menu_model constructor
     */
    public function __construct()
    {
        $this->menu_items = array(
            array('name'=>'Home', 'title'=>'Go home', 'link'=>'home', 'className'=>'active'),
            array('name'=>'Tips', 'title'=>'Look at the tips', 'link'=>'tips', 'className'=>'inactive'),
            array('name'=>'Upcoming events', 'title'=>'Have a look at the upcoming events', 'link'=>'events', 'className'=>'inactive'),
            array('name'=>'Create', 'title'=>'Start a new PotLuck event', 'link'=>'create', 'className'=>'inactive'),
            array('name'=>'About', 'title'=>'About this website', 'link'=>'about', 'className'=>'inactive')
        );
    }

    private function set_active($menutitle){
        foreach ($this->menu_items as &$item) {
            if(strcasecmp($menutitle, $item['name']) == 0) {
                $item['className'] = 'active';
            }
            else {
                $item['className'] = 'inactive';
            }
        }
    }

    public function get_menuitems($menutitle = 'Home'){
        $this->set_active($menutitle);
        return $this->menu_items;
    }
}