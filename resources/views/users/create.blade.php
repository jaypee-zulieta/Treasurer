<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new account</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="h-screen grid place-items-center">
        <div class="min-h-3/4 shadow-2xl w-1/3 rounded-box p-10 b">
            <h1 class="text text-center text-xl">Create new account</h1>
            <form action="{{ route('users.store') }}" method="POST" class="mt-10">
                @csrf
                <div class="flex flex-col gap-3">
                    <label for="" class="input w-full rounded-none">
                        <div class="opacity-50">
                            <x-id-icon></x-id-icon>
                        </div>
                        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                    </label>
                    <label for="" class="input w-full rounded-none">
                        <div class="opacity-50">
                            <x-user-icon></x-user-icon>
                        </div>
                        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                    </label>
                    <label for="" class="input w-full rounded-none">
                        <div class="opacity-50">
                            <x-key-icon></x-key-icon>
                        </div>
                        <input type="password" name="password" placeholder="Password">
                    </label>
                    <label for="" class="input w-full rounded-none">
                        <div class="opacity-50">
                            <x-check-icon></x-check-icon>
                        </div>
                        <input type="password" name="password_confirmation" placeholder="Confirm password">
                    </label>
                </div>
                <div class="mt-10">
                    <button class="btn btn-primary btn-block"> Create Account </button>
                </div>
            </form>

            <div class="flex flex-col gap-2 mt-6">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert-error>{{ $error }}</x-alert-error>
                    @endforeach
                @endif
            </div>


            <div class="divider"></div>
            <div>
                <p>Already have an account? Click <a href="{{ route('login') }}" class="link link-secondary">here</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
