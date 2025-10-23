<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link as="style"
        href="https://fonts.googleapis.com/css2?display=swap&family=Inter%3Awght%40400%3B500%3B700%3B900&family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div class="w-screen min-h-screen flex items-center justify-center px-4" 
        style="background-image: url('https://images.pexels.com/photos/4394171/pexels-photo-4394171.jpeg'); background-size: cover; background-position: center;">

        <!-- Overlay oscuro -->
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

        <!-- Contenedor del login -->
        <div class="relative z-10 w-full max-w-md bg-white dark:bg-gray-900 rounded-2xl shadow-2xl p-8">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuByFeCZLrPOQiHs7L9GffYQIAY0Jn81Kk_Ceo4q4Qj9s9PaQg1H2I5GPyXT2huv_f3cbJeRLnje13bt-Xr_rPtB1gYRf1i2JbpR27RHTWH-xsM-SsNgK3uQeGxL9TCuabcqNXJqw-fQkMhjVMXaX1BVISd17WcuxLIGz57gwtfgngjG-595iVkUEhoV1WdiL5Rum9V59xR3UzK3jRjRUivpWz7-kqDXFfk_ZSVwqews7BoPfgGvxAqVPGwf1AhXb5JulBrnItnx36M"
                     class="w-10 mx-auto mb-3" />

                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Inicia sesión en tu cuenta</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Accede al panel de administración del rancho</p>
            </div>

            <!-- Formulario -->
            <form class="space-y-5" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-form.input name="email" label="Correo" type="email" required />
                    <x-error-message>@error('email') {{ $message }} @enderror</x-error-message>
                </div>

                <div>
                    <x-form.input name="password" label="Contraseña" type="password" required />
                    <x-error-message>@error('password') {{ $message }} @enderror</x-error-message>
                </div>

                <div class="flex justify-center">
                    <x-button type="submit" class="px-6 py-3 text-base font-semibold">
                        Iniciar Sesión
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    @livewireScripts
</body>
</html>