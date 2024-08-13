<!-- Modal -->
<div class="modal fade" id="modifyPasswordModal" tabindex="-1" aria-labelledby="modifyPasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(18, 18, 18); color:rgb(3, 216, 17);">
            <h1 class="modal-title fs-5" id="modifyPasswordLabel">Changer le mot de passe</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('admin.users.password.change',['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group">
                            <label for="current_password">Mot de passe actuel</label>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autofocus>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password">Nouveau mot de passe</label>
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation">Confirmer le nouveau mot de passe</label>
                            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                        </div>

                    <button type="submit" class="btn btn mt-3" style="background-color: rgb(3, 216, 17); color: #212221;">Changer</button>

                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn" data-bs-dismiss="modal" style="background-color: #212221; color: rgb(3, 216, 17);">Fermer</button>
            </div>
        </div>
    </div>
</div>
