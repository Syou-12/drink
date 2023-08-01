<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | max:200',
            'maker' => 'required | max:200',
            'kakaku' => 'required | max:200',
            'zaiko' => 'required | max:200',
            'coment' => 'required | max:1000',
        ];
    }

    public function attributes()
{
    return [
        'name' => '商品名',
        'kakaku' => '価格',
        'zaiko' => '在庫数',
        'maker' => 'メーカー名',
    ];
}

    /**
 * エラーメッセージ
 *
 * @return array
 */
public function messages() {
    return [
        'name.required' => ':attributeは必須項目です。',
        'name.max' => ':attributeは:max字以内で入力してください。',
        'kakaku.required' => ':attributeは必須項目です。',
        'kakaku.max' => ':attributeは:max字以内で入力してください。',
        'zaiko.required' => ':attributeは必須項目です。',
        'zaiko.max' => ':attributeは:max字以内で入力してください。',
        'maker.required' => ':attributeは必須項目です。',
        'maker.max' => ':attributeは:max字以内で入力してください。',
        'coment.required' => ':attributeは必須項目です。',
        'coment.max' => ':attributeは:max字以内で入力してください。',
    ];
}
}
