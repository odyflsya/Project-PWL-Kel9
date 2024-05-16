<x-guest-layout>

<style>
    .heading {
        text-align: center;
        font-weight: 900;
        font-size: 30px;
        color: rgb(16, 137, 211);
    }

    .form {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .form .input {
        background: white;
        border: none;
        padding: 15px 20px;
        border-radius: 20px;
        margin-top: 15px;
        box-shadow: #cff0ff 0px 10px 10px -5px;
        border-inline: 2px solid transparent;
        width: 350px; 
        margin-left: auto; 
        margin-right: auto;
    }




    .form .input::-moz-placeholder {
        color: rgb(170, 170, 170);
    }

    .form .input::placeholder {
        color: rgb(170, 170, 170);
    }

    .form .input:focus {
        outline: none;
        border-inline: 2px solid #12B1D1;
    }

    .form .forgot-password {
        display: block;
        margin-top: 10px;
        margin-left: 10px;
    }

    .form .forgot-password a {
        font-size: 11px;
        color: #0099ff;
        text-decoration: none;
    }

    .form .register-button {
        display: block;
        width: 350px; 
        font-weight: bold;
        background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
        color: white;
        padding-block: 15px;
        margin-top: 20px; 
        border-radius: 20px;
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
        border: none;
        transition: all 0.2s ease-in-out;
        text-align: center; 
    }


    .form .register-button:hover {
        transform: scale(1.03);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
    }

    .form .register-button:active {
        transform: scale(0.95);
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
    }

    .social-account-container {
        margin-top: 25px;
    }

    .social-account-container .title {
        display: block;
        text-align: center;
        font-size: 14px; /* Menambahkan ukuran font yang lebih besar */
        color: rgb(170, 170, 170);
    }

    .social-account-container .social-accounts {
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 20px; /* Memperbesar jarak antara tombol sosial */
        margin-top: 10px; /* Menurunkan margin-top agar lebih rapi */
    }

    .social-account-container .social-accounts .social-button {
        background: linear-gradient(45deg, rgb(64, 64, 64) 0%, rgb(112, 112, 112) 100%); /* Mencerahkan warna tombol sosial */
        border: 5px solid white;
        padding: 10px; /* Menambahkan padding agar tombol lebih besar */
        border-radius: 50%;
        width: 50px; /* Memperbesar ukuran tombol */
        aspect-ratio: 1;
        display: grid;
        place-content: center;
        box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 12px 10px -8px;
        transition: all 0.2s ease-in-out;
    }

    .social-account-container .social-accounts .social-button .svg {
        fill: white;
        margin: auto;
    }

    .social-account-container .social-accounts .social-button:hover {
        transform: scale(1.2);
    }

    .social-account-container .social-accounts .social-button:active {
        transform: scale(0.9);
    }

    .agreement {
        display: block;
        text-align: center;
        margin-top: 15px;                                                                                                        o 4
    }

    .agreement a {
        text-decoration: none;
        color: #0099ff;
        font-size: 11px; /* Menambahkan ukuran font yang lebih besar */
    }
</style>

<div class="">

    <div class="heading">Sign Up</div>

    <form method="POST" action="{{ route('register') }}" class="form">
        @csrf

        <!-- Name -->
        <div>
            <input required class="input" type="name" name="name" id="name" placeholder="name" :value="old('name')" autofocus autocomplete="name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <input required class="input" type="eamil" name="email" id="email" placeholder="email" :value="old('email')" autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <input required class="input" type="password" name="password" id="password" placeholder="password" :value="old('password')" autofocus autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <input required class="input" type="password" name="password_confirmation" id="password_confirmation" placeholder="password" :value="old('Confirm Password')" autofocus autocomplete="password_confirmation">
            <x-input-error :messages="$errors->get('Confirm Password')" class="block mt-1 w-full" />
        </div>

        <div class="flex flex-col items-center justify-center mt-4">
            <button type="submit" class="register-button">
                {{ __('Register') }}
            </button>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-2" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>

    </form>

    <div class="social-account-container">
        <span class="title">Or Sign up with</span>
        <div class="social-accounts">
            <button class="social-button google">
                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                    <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
                </svg>
            </button>
            <button class="social-button apple">
                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                    <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

</x-guest-layout>