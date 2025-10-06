<div class="container my-5">
    <h2>Přihlášení do administrace</h2>
    <form action="/krajca/fotbal/login" method="post">
        <?= csrf_field() ?>
        <p>Pro přístup do administrace klikněte na tlačítko níže.</p>
        <button type="submit" class="btn btn-primary">Přihlásit se</button>
    </form>
</div>