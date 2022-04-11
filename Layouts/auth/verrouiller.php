<div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                <?php get_flash_message_error(); ?>
                                    <h4 class="text-center mb-4">Compte vérouiller</h4>
                                    <form action="lock-screen" method="POST">
                                        <div class="form-group">
                                            <label><strong class="mb-5 p-2 text-danger">Mot de passse</strong></label>
                                            <input type="password" class="form-control color-scheme-5" name="password" placeholder="Mot de passe" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block color-scheme-6">Déverrouiller</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
