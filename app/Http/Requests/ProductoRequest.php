<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('producto')?->id;

        return [
            'nombre' => [
                'required',
                'string',
                'max:150',
            ],
            'sku' => [
                'required',
                'string',
                'max:50',
                Rule::unique('productos', 'sku')->ignore($id),
            ],
            'precio' => [
                'required',
                'numeric',
                'min:0',
            ],
            'categoria_id' => [
                'required',
                Rule::exists('categorias', 'id'),
            ],
            'disponible' => [
                'boolean',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'       => 'El nombre del producto es obligatorio.',
            'nombre.max'            => 'El nombre no puede superar los 150 caracteres.',
            'sku.required'          => 'El SKU es obligatorio.',
            'sku.max'               => 'El SKU no puede superar los 50 caracteres.',
            'sku.unique'            => 'Este SKU ya está registrado, ingrese uno diferente.',
            'precio.required'       => 'El precio es obligatorio.',
            'precio.numeric'        => 'El precio debe ser un número válido.',
            'precio.min'            => 'El precio no puede ser negativo.',
            'stock.required'        => 'El stock es obligatorio.',
            'stock.integer'         => 'El stock debe ser un número entero.',
            'stock.min'             => 'El stock no puede ser negativo.',
            'categoria_id.required' => 'Debe seleccionar una categoría.',
            'categoria_id.exists'   => 'La categoría seleccionada no existe.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre'        => 'nombre del producto',
            'sku'           => 'SKU',
            'precio'        => 'precio',
            'stock'         => 'stock',
            'categoria_id'  => 'categoria',
            'disponible'    => 'disponibilidad',
        ];
    }
}
