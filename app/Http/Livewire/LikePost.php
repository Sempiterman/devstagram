<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    //public $mensaje = "Hola mundo desde un atributo declarado desde app/http/livewire/LikePost.php";
    public $post;
    public $isLiked;
    public $likes;

    public function mount($post)
    {
        $this->isLiked = $post->checklike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        //se agrega $this porque se esta pasando la instancia a livewire
        if($this->post->checkLike(auth()->user() )){                
           $this->post->likes()->where('post_id', $this->post->id)->delete();
           //reactive componet
           $this->isLiked= false;
           $this->likes--;
           //$this->post->likes()->where('user_id', auth()->user()->id)->delete();
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            //reactive componet
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
