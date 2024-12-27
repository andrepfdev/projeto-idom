<div class="container mx-auto p-4">
    <!-- Mensagem de feedback -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Formulário de produto -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <h2 class="text-2xl mb-4">Novo Produto</h2>
        
        <form wire:submit.prevent="store">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block mb-2">Nome</label>
                    <input wire:model="name" type="text" id="name" class="w-full px-4 py-2 border rounded">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="price" class="block mb-2">Preço</label>
                    <input wire:model="price" type="number" step="0.01" id="price" class="w-full px-4 py-2 border rounded">
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div> 

                <div class="md:col-span-2">
                    <label for="description" class="block mb-2">Descrição</label>
                    <textarea wire:model="description" id="description" rows="3" class="w-full px-4 py-2 border rounded"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="fornecedor_id" class="block mb-2">Fornecedor</label>
                    <select wire:model="fornecedor_id" id="fornecedor_id" class="w-full px-4 py-2 border rounded">
                        <option value="">Selecione um fornecedor</option>
                        <!-- Aqui você deve adicionar as opções de fornecedores dinamicamente -->
                    </select>
                    @error('fornecedor_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" style="background-color: #3b82f6; color: white; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem;">
                    Salvar Produto
                </button>
            </div>
        </form>
    </div>
</div>