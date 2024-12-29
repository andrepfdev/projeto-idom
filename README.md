# Projeto Laravel com Docker Sail

Este projeto utiliza Laravel Sail para containerização, MariaDB como banco de dados e phpMyAdmin para gerenciamento do banco. Abaixo você encontrará as instruções para configuração e execução do ambiente de desenvolvimento.

## Pré-requisitos

- Windows 10/11 com WSL2 instalado (ou Linux)
- Docker Desktop
- Composer (para instalação do Laravel Sail)
- Git

## Configurando o WSL2

1. Abra o PowerShell como administrador e execute:
```powershell
wsl --install
```

2. Reinicie o computador

3. Instale uma distribuição Linux (recomendamos Ubuntu):
```powershell
wsl --install -d Ubuntu
```

## Instalação do Projeto

1. Clone o repositório dentro do WSL:
```bash
cd ~
git clone [URL_DO_SEU_REPOSITORIO]
cd [NOME_DO_PROJETO]
```

2. Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

3. Instale o Docker Desktop e certifique-se que está configurado para usar o WSL2

4. Instale o Laravel Sail:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

5. Inicie os containers:
```bash
./vendor/bin/sail up -d
```

## Configuração do Ambiente

1. Gere a chave da aplicação:
```bash
./vendor/bin/sail artisan key:generate
```

2. Execute as migrations:
```bash
./vendor/bin/sail artisan migrate
```

## Acessando os Serviços

- **Aplicação Laravel**: http://localhost
- **phpMyAdmin**: http://localhost:82
- **MariaDB**:
  - Host: localhost
  - Porta: 3306
  - Usuário: sail
  - Senha: password
  - Database: laravel

## Comandos Úteis do Sail

- Iniciar containers: `./vendor/bin/sail up -d`
- Parar containers: `./vendor/bin/sail down`
- Executar comandos artisan: `./vendor/bin/sail artisan [comando]`
- Executar comandos npm: `./vendor/bin/sail npm [comando]`
- Acessar terminal do container: `./vendor/bin/sail shell`

## Livewire

O Livewire é um framework full-stack para Laravel que torna a construção de interfaces dinâmicas simples, sem deixar o conforto do Laravel. Aqui está uma breve introdução:

### Instalação do Livewire

```bash
./vendor/bin/sail composer require livewire/livewire
```

### Criando um Componente Livewire

```bash
./vendor/bin/sail artisan make:livewire NomeDoComponente
```

### Estrutura Básica de um Componente

```php
// app/Http/Livewire/NomeDoComponente.php
class NomeDoComponente extends Component
{
    public $mensagem = 'Olá Mundo';

    public function render()
    {
        return view('livewire.nome-do-componente');
    }
}
```

```blade
<!-- resources/views/livewire/nome-do-componente.blade.php -->
<div>
    <h1>{{ $mensagem }}</h1>
</div>
```

### Usando o Componente

```blade
<livewire:nome-do-componente />
<!-- ou -->
@livewire('nome-do-componente')
```

### Dicas de Uso do Livewire

1. Use wire:model para two-way data binding
2. Use wire:click para eventos de clique
3. Use wire:submit.prevent para formulários
4. Use $emit() e $on() para comunicação entre componentes

## Suporte

Para questões e suporte, abra uma issue no repositório do projeto.