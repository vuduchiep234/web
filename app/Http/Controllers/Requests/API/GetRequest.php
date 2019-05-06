<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:23 PM
 */

namespace App\Http\Controllers\Requests\API;


use App\Http\Controllers\Requests\RestfulRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

abstract class GetRequest extends RestfulRequest
{
    protected abstract function relations(): array;

    protected abstract function sort(): array;

    protected abstract function filterRules(): array;

    public function rules()
    {
        return array_merge([
            'id' => 'int',
            'q' => 'string',
            'limit' => 'int|min:1|max:100',
            'offset' => 'int|min:0',
            'order' => 'string|in:asc,desc',
            'sort' => ['string', Rule::in($this->sort())],
            'relations' => 'array',
            'relations.*' => ['string', Rule::in($this->relations())]
        ], $this->filterRules());
    }

    public function getId(): ?int
    {
        return Input::get('id');
    }

    public function getQuery(): ?string
    {
        return Input::get('q');
    }

    public function getOffset(): int
    {
        return Input::get('offset') ?: 0;
    }

    public function getLimit(): int
    {
        return Input::get('limit') ?: 20;
    }

    public function getOrder(): string
    {
        return Input::get('order') ?: 'asc';
    }

    public function getSort(): string
    {
        return Input::get('sort') ?: 'id';
    }

    public function getRelations(): array
    {
        $relations = Input::get('relations');
        return $relations ? $relations : [];
//        ? array_filter(explode(',', $relations)) : [];
    }

    public function getFilterRules(): array
    {
        return [];
    }
}