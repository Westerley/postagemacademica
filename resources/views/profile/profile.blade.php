<form action="{{ url('/profile') }}" method="POST">
    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="name" name="name" type="text" required class="validate" value="{{ old('name') }}">
            <label for="name">Nome</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12 m8 l8">
            <i class="material-icons prefix">location_on</i>
            <input id="street" name="street" type="text" required class="validate" value="{{ old('street') }}">
            <label for="street">Rua</label>
        </div>
        <div class="input-field col s12 m4 l4">
            <i class="material-icons prefix">my_location</i>
            <input id="number" name="number" type="text" required class="validate" value="{{ old('number') }}">
            <label for="number">Número</label>
        </div>
    </div>

    <div class="row">
        <div class="col s4">
            <label>Sexo</label>
            <p>
                <input name="genre" value="M" type="radio" id="male"/>
                <label for="male">Masculino</label>
            </p>
            <p>
                <input name="genre" value="F" type="radio" id="female"/>
                <label for="female">Feminino</label>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4">
            <select name="occupation">
                <option value="" disabled selected> Profissão </option>
                <option value="Estudante"> Estudante</option>
                <option value="Professor"> Professor</option>
            </select>
        </div>
        <div class="input-field col s12 m4">
            <i class="material-icons prefix">phone</i>
            <input id="telephone" type="tel" required class="validate" value="{{ old('telephone') }}">
            <label for="telephone">Telefone</label>
        </div>
        <div class="input-field col s12 m4">
            <i class="material-icons prefix">stay_primary_portrait</i>
            <input id="cellphone" type="tel" required class="validate" value="{{ old('cellphone') }}">
            <label for="cellphone">Celular</label>
        </div>
    </div>

    <div class="row">
        <div class="file-field input-field col s12 l6">
            <div class="btn waves-effect waves-light #80cbc4 teal lighten-3">
                <span>Arquivo</span>
                <input type="file" name="anexo" required>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Foto Perfil">
            </div>
        </div>
        <div class="file-field input-field col s12 l6">
            <div class="btn waves-effect waves-light #80cbc4 teal lighten-3">
                <span>Arquivo</span>
                <input type="file" name="anexo" required>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Foto Capa">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">mail</i>
            <input id="email" name="email" type="email" required class="validate" value="{{ old('email') }}">
            <label for="email">Email</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">lock</i>
            <input id="password" type="password" name="password" required class="validate" value="{{ old('password') }}">
            <label for="password">Senha</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">mode_edit</i>
            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
            <label for="icon_prefix2">Sobre mim</label>
        </div>
    </div>

    <div class="center">
        <button class="btn waves-effect waves-light" type="reset"> Cancelar </button>
        <button class="btn waves-effect waves-light" type="submit">Alterar
            <i class="material-icons right">send</i>
        </button>
    </div>
</form>

<br>