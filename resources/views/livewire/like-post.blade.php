<div>
    <button id="btnLikePost" type="button"
            class="border p-2 mt-3 w-full font-semibold rounded-lg bg-gray-500 text-center text-white flex gap-1 align-middle items-center hover:bg-gray-600"
            wire:click="like"
    >
        Me Gusta
        <svg id="iconoLike" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
        </svg>
    </button>
</div>
