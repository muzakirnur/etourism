<form class="max-w-sm mx-auto" wire:submit.prevent='submit'>
    <div class="mb-4">
      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
      <input type="text" id="nama" wire:model='nama' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Anda" required>
      @error('nama')
        <span class="error text-red-500">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="mb-4">
      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input type="email" id="email" wire:model='email' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Anda" required>
      @error('email')
        <span class="error text-red-500">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="mb-4">
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer Handphone</label>
      <input type="number" wire:model='phone' id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nomer Handphone" required>
      @error('phone')
        <span class="error text-red-500">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan</label>
        <textarea wire:model='pesan' id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Pesan anda..."></textarea>
        @error('pesan')
        <span class="error text-red-500">
            {{ $message }}
        </span>
        @enderror
    </div>
    <button type="submit" wire:loading.class='hidden' class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Submit</button>
    <div wire:loading>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 animate-spin text-indigo-500" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
    </div>
</form>