@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div style="width: 100%; max-width: 440px;">
        <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">

            <div class="p-4 text-white" style="background: #0F6E56;">
                <div class="mb-3 d-flex align-items-center justify-content-center"
                    style="width:48px; height:48px; background:rgba(255,255,255,0.15); border-radius:50%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                        viewBox="0 0 24 24" stroke="white" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>
                </div>
                <h4 class="mb-1 fw-500">Inscription</h4>
                <p class="mb-0" style="opacity: 0.75; font-size: 13px;">Créez votre compte universitaire</p>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label" style="font-size:12px; font-weight:500; letter-spacing:0.3px; color:#6c757d;">NOM COMPLET</label>
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}"
                            placeholder="Jean Dupont"
                            required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-size:12px; font-weight:500; letter-spacing:0.3px; color:#6c757d;">ADRESSE EMAIL</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}"
                            placeholder="exemple@universite.com"
                            required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-size:12px; font-weight:500; letter-spacing:0.3px; color:#6c757d;">MOT DE PASSE</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="••••••••"
                            required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label" style="font-size:12px; font-weight:500; letter-spacing:0.3px; color:#6c757d;">CONFIRMER LE MOT DE PASSE</label>
                        <input id="password-confirm" type="password"
                            class="form-control"
                            name="password_confirmation"
                            placeholder="••••••••"
                            required autocomplete="new-password">
                    </div>

                    <button type="submit" class="btn w-100 text-white fw-500" style="background:#0F6E56; border-radius:8px; padding:10px;">
                        Créer mon compte
                    </button>

                    <hr style="border-color: #e9ecef; margin: 16px 0;">

                    <div class="text-center" style="font-size:13px; color:#6c757d;">
                        Déjà un compte ?
                        <a href="{{ route('login') }}" style="color:#0F6E56; text-decoration:none; font-weight:500;">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection