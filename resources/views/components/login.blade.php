<div class="w-screen min-h-screen flex items-center justify-center px-4" 
     style="background-image: url('https://images.pexels.com/photos/4394171/pexels-photo-4394171.jpeg'); background-size: cover; background-position: center;">

  <!-- Overlay oscuro para contraste -->
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

    <!-- Form -->
    <form class="space-y-5" method="POST" action="{{ route('login') }}">
      <div>
        <x-form.input wire:model="correo" label="Correo"/>
        <x-error-message> @error('correo') {{ $message }} @enderror </x-error-message>
      </div>

      <div>
        <x-form.input wire:model="contrasena" label="Contraseña"/>
        <x-error-message> @error('contrasena') {{ $message }} @enderror </x-error-message>
      </div>

      <div class="flex justify-center">
        <x-button type="submit" class="px-6 py-3 text-base font-semibold">
            Iniciar Sesión
        </x-button>
      </div>
    </form>
  </div>
</div>
