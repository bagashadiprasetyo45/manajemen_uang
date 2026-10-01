        </main>
        <footer class="footer"><span>© <?= date('Y') ?> KEUANGAN BAGAS</span><span>Catat, pahami, tumbuh.</span></footer>
    </div>
</div>
<div id="toast-stack" class="toast-stack">
    <?php foreach (consumeFlash() as $message): ?>
        <div class="toast toast-<?= e($message['type']) ?>"><i data-lucide="<?= $message['type'] === 'success' ? 'check-circle-2' : 'alert-circle' ?>"></i><span><?= e($message['message']) ?></span><button type="button" class="toast-close" aria-label="Tutup">×</button></div>
    <?php endforeach; ?>
</div>
<div class="modal-backdrop" data-modal-backdrop></div>
<div class="confirm-modal glass-card" id="confirm-modal" aria-hidden="true">
    <div class="modal-icon danger-icon"><i data-lucide="triangle-alert"></i></div>
    <h3>Konfirmasi tindakan</h3>
    <p id="confirm-message">Apakah kamu yakin ingin melanjutkan?</p>
    <div class="modal-actions"><button type="button" class="btn btn-ghost" data-close-confirm>Batal</button><button type="button" class="btn btn-danger" data-confirm-submit>Lanjutkan</button></div>
</div>
<script src="assets/js/app.js"></script>
<?php if (!empty($pageScripts)) echo $pageScripts; ?>
<script>document.addEventListener('DOMContentLoaded', () => { if (window.lucide) lucide.createIcons(); });</script>
</body>
</html>