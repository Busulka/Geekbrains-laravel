<x-layout>
    <form class="auth-form card border-0 mx-auto" action="#">
        <p class="p-3 bg-primary bg-gradient text-white">Авторизация</p>
        <div class="card-body">
            <div class="form-floating">
                <input class="form-control form-control-lg mb-3" type="text" placeholder="Логин" name="login" id="loginId">
                <label for="loginId">
                    Логин
                </label>
            </div>

            <div class="form-floating">
                <input class="form-control form-control-lg mb-3" type="password" placeholder="Пароль" name="password" id="passwordId">
                <label for="passwordId">
                    Пароль
                </label>
            </div>

            <label>
                <input class="form-check-input" type="checkbox" name="save"> Запомните меня
            </label>

            <div class="mt-5 mb-4">
                <button class="btn btn-primary bg-gradient text-white btn-lg w-100" type="submit">
                    Войти
                </button>
            </div>
        </div>
    </form>
</x-layout>
