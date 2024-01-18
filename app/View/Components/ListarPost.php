<?php
//Logica del ladfo del server para el componente
namespace App\View\Components;

use Illuminate\View\Component;

class ListarPost extends Component
{
    public $posts;

    public function __construct($posts)
    {
        //Aqui es donde se obtiene la informacion a mostrar en el template
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    //funcion que muestra la vista
    public function render()
    {//apunta al componente alojado en la vista
        return view('components.listar-post');
    }
}
