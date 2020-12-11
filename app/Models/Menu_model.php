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
            array('iconName'=>'home', 'link'=>'hub', 'className'=>'inactive'),
            array('iconName'=>'people_alt', 'link'=>'groups', 'className'=>'inactive'),
            array('iconName'=>'add_circle', 'link'=>'addObservation', 'className'=>'active'),
            array('iconName'=>'leaderboard', 'link'=>'leaderboardSelect', 'className'=>'inactive'),
            array('iconName'=>'person', 'link'=>'profile', 'className'=>'inactive')
        );
    }

    private function set_active($menuLink){
        foreach ($this->menu_items as &$item) {
            if(strcasecmp($menuLink, $item['link']) == 0) {
                $item['className'] = 'active';
                //$this->debug_to_console("set active");
                //$this->debug_to_console($item['link']);
            }
            else {
                $item['className'] = 'inactive';
                //$this->debug_to_console("set inactive");
                //$this->debug_to_console($item['link']);
            }
        }
    }

    public function get_menuitems($menuLink){
        $this->set_active($menuLink);
        return $this->menu_items;
    }

    public function get_menuitems_without_activation(){
        return $this->menu_items;
    }

    private function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}