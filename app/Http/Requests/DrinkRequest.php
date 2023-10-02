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
            'product_name' => 'required | max:200',
            'company_name' => 'required | max:200',
            'price' => 'required | max:200',
            'stock' => 'required | max:200',
            'comment' => 'required | max:1000',
        ];
    }

    public function attributes()
{
    return [
        'product_name' => '商品名',
        'price' => '価格',
        'stock' => '在庫数',
        'company_name' => 'メーカー名',
        'comment' => 'コメント',
    ];
}

    /**
 * エラーメッセージ
 *
 * @return array
 */
public function messages() {
    return [
        'product_name.required' => ':attributeは必須項目です。',
        'product_name.max' => ':attributeは:max字以内で入力してください。',
        'price.required' => ':attributeは必須項目です。',
        'price.max' => ':attributeは:max字以内で入力してください。',
        'stock.required' => ':attributeは必須項目です。',
        'stock.max' => ':attributeは:max字以内で入力してください。',
        'company_name.required' => ':attributeは必須項目です。',
        'company_name.max' => ':attributeは:max字以内で入力してください。',
        'comment.required' => ':attributeは必須項目です。',
        'comment.max' => ':attributeは:max字以内で入力してください。',
    ];
}
}
