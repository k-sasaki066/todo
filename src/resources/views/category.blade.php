@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="category__alert">
    @if(session('message'))
    <div class="category__alert--success">
        {{ session('message') }}
    </div>
    @endif

    @if($errors->any())
    <div class="category__alert--danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="category__content">
    <form class="create-form" action="/categories" method="post">
        @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="name">
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Category</th>
            </tr>
            @foreach($categories as $category)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form class="update-form" action="" method="">
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="name" value="{{ $category['name'] }}">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="delete-form__item">
                    <form class="delete-form" action="" method="">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection