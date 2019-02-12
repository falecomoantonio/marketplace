@extends('layouts.dashboard',['menu'=>$menu])
@section('CONTENT')

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Meu Perfil</h4>
            </div>
            <div class="content">
                <form action="{{ route('administrators.update',['id'=>$user->cid]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control border-input" placeholder="Seu Nome" name="name" value="{{ old('name', $user->name) }}" required />
                                @if($errors->has('name'))
                                <p class="help-block">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control border-input" value="{{ $user->username }}" disabled />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control border-input" value="{{ $user->email }}" disabled >
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Atualizar Perfil</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Alterar Senha</h4>
            </div>
            <div class="content">
                <form action="{{ route('administrators.changepass') }}" method="post">

                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Senha Atual</label>
                                <input type="password" class="form-control border-input" name="password_old" placeholder="Sua senha Atual" value="" required />
                                @if($errors->has('password_old'))
                                    <p class="help-block">{{ $errors->first('password_old') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nova Senha</label>
                                <input type="password" class="form-control border-input" name="password" placeholder="Sua senha Atual" value="" required />
                                @if($errors->has('password'))
                                    <p class="help-block">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Senha Atual</label>
                                <input type="password" class="form-control border-input" name="password_confirmation" placeholder="Confirmar a senha" value="" required />
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Alterar Senha</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection