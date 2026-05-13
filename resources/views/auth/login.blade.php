@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div style="width: 100%; max-width: 440px;">
        <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">

            <div class="p-4 text-white" style="background: #185FA5;">
                <div class="mb-3 d-flex align-items-center justify-content-center"
                    style="width:48px; height:48px; background:rgba(255,255,255,0.15); border-radius:50%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                        viewBox="0 0 24 24" stroke="white" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                </div>
                <h4 class="mb-1 fw-500">Connexion</h4>
                <p class="mb-0" style="opacity: 0.75; font-size: 13px;">Accédez à votre espace universitaire</p>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-size:12px; font-weight:500; letter-spacing:0.3px; color:#6c757d;">ADRESSE EMAIL</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}"
                            placeholder="exemple@universite.com"
                            required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-size:12px; font-weight:500; letter-spacing:0.3px; color:#6c757d;">MOT DE PASSE</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="••••••••"
                            required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember" style="font-size:13px;">Se souvenir de moi</label>
                    </div>

                    <button type="submit" class="btn w-100 text-white fw-500" style="background:#185FA5; border-radius:8px; padding:10px;">
                        Se connecter
                    </button>

                    @if (Route::has('password.request'))
                        <div class="text-center mt-3">
                            <a href="{{ route('password.request') }}" style="font-size:13px; color:#185FA5; text-decoration:none;">
                                Mot de passe oublié ?
                            </a>
                        </div>
                    @endif

                    <hr style="border-color: #e9ecef; margin: 16px 0;">

                    <div class="text-center" style="font-size:13px; color:#6c757d;">
                        Pas encore de compte ?
                        <a href="{{ route('register') }}" style="color:#185FA5; text-decoration:none; font-weight:500;">S'inscrire</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection