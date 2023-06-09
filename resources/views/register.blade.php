<x-layout page="Registre-se">
    <x-slot:btn>
        <a href="{{route('login')}}" class="btn btn-primary">
            Já possui conta? Faça o login
        </a>
    </x-slot:btn>

        <section class="create-task">

            <h1>Registre-se</h1>

            @if($errors->any())
                <ul class="alert-error">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            <p class="message">
                @php
                    echo isset($message) ? $message : "";
                @endphp
            </p>

            <form method="POST" action="{{route('user.registerAction')}}">

                @csrf

                <x-form.textInput
                    name="name"
                    label="Seu Nome"
                    placeholder="Seu Nome"
                    required="required"/>

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

                <x-form.textInput
                    type="password"
                    name="password_confirmation"
                    label="Confirme sua Senha"
                    placeholder="Confirme sua Senha"
                    required="required"/>


                <div class="input-area">
                    <x-form.formButton resetTxt="Limpar" submitTxt="Registre-se" />

                </div>
            </form>
        </section>
</x-layout>

