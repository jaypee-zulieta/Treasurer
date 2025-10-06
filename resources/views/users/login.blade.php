<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="h-screen grid place-items-center">
        <div class="min-h-3/4 shadow-2xl w-1/3 rounded-box p-10 b">
            <h1 class="text text-center text-xl">Login</h1>
            <form action="{{ route('login') }}" method="POST" class="mt-10">
                @csrf
                <div class="flex flex-col gap-3">
                    <label for="" class="input w-full rounded-none">
                        <div class="opacity-50">
                            <x-user-icon></x-user-icon>
                        </div>
                        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                    </label>
                    <label for="" class="input w-full rounded-none">
                        <div class="opacity-50">
                            <x-key-icon></x-key-icon>
                        </div>
                        <input type="password" name="password" placeholder="Password">
                    </label>
                </div>
                <div class="mt-10">
                    <button class="btn btn-primary btn-block">Log in</button>
                </div>
            </form>

            <div class="flex flex-col gap-2 mt-6">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert-error>{{ $error }}</x-alert-error>
                    @endforeach
                @endif
            </div>


            <div class="divider">OR</div>
            <div>
                <a class="btn btn-block btn-secondary" href="{{ route('users.create') }}">Create account</a>
            </div>
        </div>
    </div>
</body>

</html>
