<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Adicionar Produto</h2>

    {{-- @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif --}}

    <form wire:submit="save" class="space-y-4">
        <div>
            <label for="nome" class="block text-sm font-medium">Nome do Produto</label>
            <input type="text" id="nome" wire:model="nome" class="w-full border rounded p-2" />
            @error('nome') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="preco" class="block text-sm font-medium">Preço</label>
            <input type="number" step="0.01" id="preco" wire:model="preco" class="w-full border rounded p-2" />
            @error('preco') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="descricao" class="block text-sm font-medium">Descrição</label>
            <textarea id="descricao" wire:model="descricao" class="w-full border rounded p-2"></textarea>
            @error('descricao') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="fornecedor_id" class="block text-sm font-medium">Fornecedor</label>
            <select id="fornecedor_id" wire:model="fornecedor_id" class="w-full border rounded p-2">
                <option value="">Selecione um fornecedor</option>
                @foreach($fornecedores as $fornecedor)
                    <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                @endforeach
            </select>
            @error('fornecedor_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="rounded p-2 mt-6" style="background-color: rgb(43, 43, 205); color:aliceblue;" >
            Salvar Produto
        </button>
    </form>

    <!-- Lista de produtos -->
    <div class="mt-8 pt-6">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left">Nome</th>
                    <th class="px-6 py-3 text-left">Preço</th>
                    <th class="px-6 py-3 text-left">Fornecedor</th>
                    <th class="px-6 py-3 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr class="border-t">
                        <td class="px-6 py-4">{{ $produto->nome }}</td>
                        <td class="px-6 py-4">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $produto->fornecedor_id }}</td>
                        <td class="px-6 py-4">
                            <button wire:click="edit({{ $produto->id }})" 
                                    class="bg-blue-500 text-white px-3 py-1 rounded" style="background-color: rgb(11, 101, 204);">
                                Editar
                            </button>
                            <button wire:click="delete({{ $produto->id }})"
                                    onclick="return confirm('Tem certeza?')"
                                    class="px-3 py-1 rounded" style="background-color: rgb(204, 11, 11); color:aliceblue;">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{-- {{ $produtos->links() }} --}}
        </div>
    </div>
</div>

