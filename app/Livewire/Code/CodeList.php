<?php

namespace App\Livewire\Code;

use App\Models\Code;
use Livewire\Component;

class CodeList extends Component
{
    public $post_id, $html_id, $gist_link;
    /**
     * delete action listener
     */
    protected $listeners = [
        'deleteCodeListner'=>'deleteCode'
    ];
    public function submit(){
        $validatedData = $this->validate([
            'post_id' => 'required',
            'html_id' => 'required|string|max:50',
            'gist_link' => 'required|string|max:256'
        ]);

        Code::create($validatedData);

        session()->flash('success', 'Code successfully Created.');
    }
    public function callFunctionArg($post_id)
    {
        $this->post_id = $post_id;
    }
    public function render()
    {
        $codes = Code::where('post_id', $this->post_id )
            ->latest('id')
            ->get();
        return view('livewire.code.code-list', compact('codes'));
    }
    public function deleteCode($id)
    {
        try{
            Code::find($id)->delete();
            session()->flash('success',"Code Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }

}
