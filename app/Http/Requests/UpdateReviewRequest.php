<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    public function authorize()
    {
        $review = $this->route('review');
        return auth()->id() === $review->user_id;
    }

    public function rules()
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
        ];
    }
}
