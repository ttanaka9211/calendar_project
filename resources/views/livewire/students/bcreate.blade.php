<div>
    <button type="button" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 border border-gray-400 rounded shadow" wire:click.prevent='openModal()'>新規追加
    </button>
    <x-jet-modal wire:model="modalStatus">
        <x-slot name="slot">
            <div class="flex justify-between items-center border-b p-2 text-xl">
                <div></div>
                <h6 class="text-xl font-bold">新規登録</h6>
                <button type="button" wire:clic.prevent="closeModal()">x</button>
            </div>
            <div class="p-10">
                <!-- content -->
                <form class="w-full">
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label for="inline-first-name" class="bloc text-gray-500 font-bold  md:text-reight mb-1 md:mb-0 pr-4">
                                名前
                            </label>
                        </div>
                        <div class="md:w2/3">
                            <input type="text" id="inline-first-name" name="firstname" wire:model="firstname" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white foucus:border-purple-500">
                            @error('firstname')
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label for="inline-last-name" class="bloc text-gray-500 font-bold  md:text-reight mb-1 md:mb-0 pr-4">
                                苗字
                            </label>
                        </div>
                        <div class="md:w2/3">
                            <input type="text" id="inline-last-name" name="lastname" wire:model="lastname" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white foucus:border-purple-500">
                            @error('lastname')
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label for="inline-email" class="bloc text-gray-500 font-bold  md:text-reight mb-1 md:mb-0 pr-4">
                                メールアドレス
                            </label>
                        </div>
                        <div class="md:w2/3">
                            <input type="text" id="inline-email" name="email" wire:model="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white foucus:border-purple-500">
                            @error('email')
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label for="inline-phone-number" class="bloc text-gray-500 font-bold  md:text-reight mb-1 md:mb-0 pr-4">
                                電話番号
                            </label>
                        </div>
                        <div class="md:w2/3">
                            <input type="text" id="inline-phone-number" name="phone" wire:model="phone" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white foucus:border-purple-500">
                            @error('phone')
                            <span class="block sm:inline text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button class="shadow bg-purple-500 hover:bg-bold py-2 px-4 rounded" type="button" wire:click.prevent="store()">追加する</button>
                    </div>
                </form>
            </div>
        </x-slot>
    </x-jet-modal>
</div>
