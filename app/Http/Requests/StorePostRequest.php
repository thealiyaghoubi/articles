<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Inline\Element\AbstractInline;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post = Post::query()->where('user_id',Auth::id())->find($this->id);
        if ($post){
            return true;
        }
        return false;
    }




    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'title' => "required|unique:posts,title",
                'body' => 'required',

        ];
    }
}
