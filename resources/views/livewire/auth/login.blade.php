<div class="p-2 text-dark bg-opacity-25 d-flex flex-column justify-content-center align-items-center min-vh-100">

    <i class="bi bi-house-gear-fill"style="font-size: 5rem;"></i>
    <h2 class="text-dark-emphasis">ConstruCasa</h3>
    <p class="text-light-emphasis">Sistema de Administração</p>

        <div class="card shadow border border-secondary p-3 mb-5 bg-white rounded" style="width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-light-emphasis mb-3">Entre na sua conta</h5>


                @if (@session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form wire:submit.prevent="login">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" wire:model='email' class="form-control"
                            placeholder="Digite seu email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>

                        <div class="input-group">
                            <input type="password" id="password" wire:model="password" class="form-control"
                                placeholder="Digite sua senha">

                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                <i id="passwordIcon" class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-secondary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function togglePassword() {
                const password = document.getElementById('password');
                const icon = document.getElementById('passwordIcon');

                if (password.type === 'password') {
                    password.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    password.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            }
        </script>
</div>
