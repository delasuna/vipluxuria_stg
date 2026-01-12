<?php
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
?>

<!-- MODAL +18 -->
<div id="age-overlay">
    <div class="age-modal">
        <h2>Conte&uacutedo Adulto</h2>
        <p>Este site contém conte&uacutedo destinado exclusivamente a maiores de 18 anos.</p>

        <div class="buttons">
            <button id="btn-accept">Tenho mais de 18 anos</button>
            <button id="btn-deny">Sair</button>
        </div>
    </div>
</div>

<style>
#age-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(6px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;
}

.age-modal {
    background: #111;
    color: #fff;
    padding: 30px;
    max-width: 420px;
    width: 90%;
    border-radius: 12px;
    text-align: center;
}

.age-modal .buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.age-modal button {
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

#btn-accept { background: #d1006c; color: #fff; }
#btn-deny   { background: #444; color: #fff; }
</style>

<script>
(function () {
    const overlay = document.getElementById('age-overlay');
    const accept  = document.getElementById('btn-accept');
    const deny    = document.getElementById('btn-deny');

    if (!overlay) return;

    if (localStorage.getItem('ageAccepted') === 'true') {
        overlay.style.display = 'none';
        return;
    }

    document.body.style.overflow = 'hidden';

    accept.addEventListener('click', () => {
        localStorage.setItem('ageAccepted', 'true');
        document.body.style.overflow = '';
        overlay.remove();
    });

    deny.addEventListener('click', () => {
        window.location.href = 'https://www.google.com.br';
    });
})();
</script>
