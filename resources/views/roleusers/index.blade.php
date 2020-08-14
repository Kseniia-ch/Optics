@extends('layouts.app')

@section('title')
    Роли пользователей
@endsection

@section('content')
<div class="content"> 
    <section class="page-white-section">
        <div class="container">
            <h2>Управление ролями пользователей</h2>
        </div>
    </section> 
        <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Имя (email) пользователя</th>
                            @foreach ($roles as $role)
                                <th>{{ $role->name }}</th>
                            @endforeach 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                            <td>{{ $user->name }} ({{ $user->email }})</td>
                            @foreach ($roles as $role)
                            <td>
                                @if ($user->roles->where('id', $role->id)->count() == 0)
                                <form class="form-optics-admin" id="cr{{ $user->id }}{{ $role->id }}" method="POST" action="{{ '/roleusers/'.$user->id}} ">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ch{{ $user->id }}{{ $role->id }}" name="chrole_id" onClick="this.form.submit()">
                                        <label class="custom-control-label" for="ch{{ $user->id }}{{ $role->id }}"></label>
                                    </div>
                                </form>
                                @else
                                <form class="form-optics-admin" id="d{{ $user->id }}{{ $role->id }}" method="POST" action="{{ '/roleusers/'.$user->id}} ">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ch{{ $user->id }}{{ $role->id }}" name="chrole_id" onClick="this.form.submit()" checked>
                                        <label class="custom-control-label" for="ch{{ $user->id }}{{ $role->id }}"></label>
                                    </div>
                                </form>
                                @endif
                            </td>
                            @endforeach 
                            </tr>
                        @endforeach     
                    </tbody>
                </table>
            </div>
        </div>
        </div>
</div>
@endsection
