<?php


namespace App\Controllers;


class MainController extends \CodeIgniter\Controller
{
    private $menu_model;
    private $data;
    private $data2;

    /**
     * MainController constructor.
     */
    public function __construct()
    {
        $this->menu_model = new \Menu_model();
    }


    private function set_common_data($content_title_1, $content_title_2) {
        $this->data['content_title_1'] = $content_title_1;
        $this->data['content_title_2'] = $content_title_2;
    }

    public function home() {
        $this->set_common_data("Welcome to my webpage", "here is the second title");
        $this->data["content"] = "here is some content!";

        $this->data['menu_items'] = $this->menu_model->get_menuitems('home');
        return view("template", $this->data);
    }

    public function tips() {
        $this->set_common_data("This is the Tips page", "here are some free helpful tips!");

        $this->data2["tips"] = array(array('tip' => 'useful tip 1'), array('tip' => 'useful tip 2'), array('tip' => 'useful tip 3'));
        $this->data['content'] = view('tips', $this->data2);

        $this->data['menu_items'] = $this->menu_model->get_menuitems('tips');
        return view("template", $this->data);
    }

    public function events()  {
        $this->set_common_data("This is the event page", "Upcoming events:");

        $eventModel = new \Event_model();
        $events = $eventModel->get_upcoming_events();

        $data2['events'] = $events;
        $data2['nr_of_events'] = count($events);

        $this->data['content'] =view('events', $data2);
        $this->data['menu_items'] = $this->menu_model->get_menuitems('Upcoming events');
        return view("template", $this->data);
    }

    public function create() {
        $this->set_common_data("This is the create page", "maybe to create an observation?");
        $this->data["content"] = "here is some content!";

        $this->data['menu_items'] = $this->menu_model->get_menuitems('create');
        return view("template", $this->data);
    }

    public function about() {
        $this->set_common_data("This is the about page", "information about this website can be found here");
        $this->data["content"] = "here is some content!";

        $this->data['menu_items'] = $this->menu_model->get_menuitems('about');
        return view("template", $this->data);
    }

}