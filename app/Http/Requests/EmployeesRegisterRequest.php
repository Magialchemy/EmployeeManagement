<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|max:50',
            'employeeCode' => 'required|unique:employees,employeeCode|integer|min:10000000|max:99999999'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力してください。',
            'name.max' => '名前が長すぎます。50文字以内にしてください。',
            'employeeCode.unique' => '社員番号の重複は許されません。',
            'employeeCode.required' => '社員番号は必ず入力してください。',
            'employeeCode.integer' => '社員番号は整数です。',
            'employeeCode.min' => '桁が足りません。社員番号は8桁です。',
            'employeeCode.max' => '桁が多すぎます。社員番号は8桁です。'
        ];
    }
