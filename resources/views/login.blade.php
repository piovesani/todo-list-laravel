<x-layout page="Login">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Não possui conta? Registre-se
        </a>
    </x-slot:btn>

        <section class="create-task">

            <h1>Entrar</h1>

            @if($errors->any())
                <ul class="alert-error">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            @php
                echo isset($message) ? $message : "";
            @endphp

            <form method="POST" action="{{route('user.loginAction')}}">

                @csrf

                <x-form.textInput
                    type="email"
                    name="email"
                    label="Seu Email"
                    placeholder="Seu Email"
                    required="required"/>

                <x-form.textInput
                    type="password"
                    name="password"
                    label="Crie uma senha"
                    placeholder="Crie uma senha"
                    required="required"/>

                <div class="input-area">
                    <x-form.formButton resetTxt="Limpar" submitTxt="Entrar" />

                </div>
            </form>
        </section>
</x-layout>

