@extends('layouts.vide')

@section('content')
  <section class="hero is-dark is-fullheight" style="background-image: url('/img/background.png');">
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="column is-4 is-offset-4">
            <h3 class="title has-text-light">MediERP V2.0</h3>
            <p class="subtitle has-text-light">Finance et comptabilité.</p>
            <div class="box">
              <figure class="avatar">
                <img src="/img/logo_wide.png">
              </figure>
              <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="my_form">
                {{ csrf_field() }}
                @if ($errors->has('email') || $errors->has('password'))
                  <div class="notification is-danger" id="notif">
                    <button class="delete" onclick="$('#notif').hide();"></button>
                    <strong>Informations de connexion incorrectes!</strong>
                  </div>
                @endif
                <div class="field">
                  <div class="control">
                    <input class="input is-large" type="email" name="email" placeholder="Votre Email" value="{{ old('email') }}" autofocus required>
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input is-large" type="password" name="password" placeholder="Votre Mot de passe" required>
                  </div>
                </div>
                <div class="field">
                  <label class="checkbox">
                    <input type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember">
                    Se souvenir de moi
                  </label>
                </div>
                <button type="submit" class="button is-block is-primary is-large is-fullwidth">
                    Se connecter
                </button>
              </form>
            </div>
            <p class="has-text-light">
              <a href="#">A propos</a> &nbsp;·&nbsp;
              <a href="#">Mot de passe oublié</a> &nbsp;·&nbsp;
              <a href="#">Besoin d'aide?</a>
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
