<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectValidatonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            [
                'titre'=>'required|string|min:10|max:40',
                'des'=>'required|string|min:250|max:1000',
                'budget'=>'required|numeric|max:5|min:2',
                      'datefinal'=>['required',
                           'date',
                            function($attribute,$value,$fail){
                               if(Carbon::now()>$value){
                                  $fail("la date final de projet doit être superieur à la date d'aujourd'hui ".Carbon::now());
                               }
                            }
                               ],
                'categorie'=>'required',
                'location'=>'required|string',
                'cni'=>'required|string',
                 'cni-file'=>'required|image',
                 'picture_file'=>'required|image',
                 'images'=>'required|image'
       
             ],[
                 'titre.required'=>'Compang Title is required',
                 'titre.string'=>'Product Title must be a string',
                 'titre.min'=>'This Compang Title must be gruter than 10 caracters',
                 'titre.max'=>'This Compang Title must be less than 40 caracters',
       
                 'des.required'=>'Compang Description is required',
                 'des.string'=>'Product Description must be a string',
                 'des.min'=>'This Compang Description must be gruter than 250 caracters',
                 'des.max'=>'This Compang Description must be less than 1000 caracters',
                  
                 'budget.required'=>'Compang budget is required',
                 'budget.string'=>'compang budget must be a Decimal',
                 'budget.min'=>'This Compang budget must be gruter than 2 number',
                 'budget.max'=>'This Compang budget must be less than 10 caracters',
       
                 'cni.required'=>'cni must be required',
                 'cni.string'=>'cni  must be a string',
       
                 'cni.required'=>'location must be required',
                 'cni.string'=>'location must be a string',
                 'cni-file.required'=>'cni file must be required',
                 'cni-file.image'=>'cni  file must be an image',
                 'cni-file.required'=>'cni file must be required',
                 'cni-file.image'=>'cni  file must be an image',
                 'picture_file.required'=>'the picuter must be required',
                 'picture_file.image'=>'picture  file must be an image',
                'images.required'=>'images must be required',
                 'images.image'=>'files must be images'
       
             ]
        ];
    }
}
