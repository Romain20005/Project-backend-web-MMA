<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:users,email,' . $this->user()->id,
            ],

            // Username validation
            'username' => [
                'required',
                'string',
                'max:255',
                'unique:users,username,' . $this->user()->id,
            ],

            // Birthday validation
            'birthday' => [
                'nullable',
                'date',
            ],

            // Bio validation
            'bio' => [
                'nullable',
                'string',
                'max:1000',
            ],
            // Profile_picture
            'profile_picture'=>[
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ];
    }}
