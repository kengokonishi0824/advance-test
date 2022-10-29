<?php
namespace App\Http\Livewire;
use Livewire\Component;
class Input extends Component
{
    public $cnt = 1;
    public function render()
    {
        return view('livewire.input');
    }
    public function add()
    {
        $this->cnt++;
    }
    public function del()
    {
        if ($this->cnt > 1) {
            $this->cnt--;
        }
    }
}