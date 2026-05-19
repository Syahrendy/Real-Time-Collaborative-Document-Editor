function waitForEcho(callback, attempts = 0) {
    if (window.Echo) {
        callback();
        return;
    }

    if (attempts > 200) {
        console.warn('Laravel Echo tidak tersedia. Jalankan: php artisan reverb:start');
        return;
    }

    setTimeout(() => waitForEcho(callback, attempts + 1), 50);
}

function initDocumentEditor() {
    const root = document.getElementById('editor-app');
    if (!root) {
        return;
    }

    const documentId = root.dataset.documentId;
    const userId = Number(root.dataset.userId);
    const editor = document.getElementById('editor');
    const statusEl = document.getElementById('editor-status');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    if (!editor) {
        return;
    }

    let applyingRemote = false;
    let syncTimeout;
    let saveTimeout;

    const setStatus = (text, color = 'text-slate-400') => {
        if (statusEl) {
            statusEl.textContent = text;
            statusEl.className = `text-xs ${color}`;
        }
    };

    const syncContent = () => {
        fetch(`/document/${documentId}/sync`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                Accept: 'application/json',
            },
            body: JSON.stringify({ content: editor.value }),
        })
            .then(async (response) => {
                const data = await response.json().catch(() => ({}));

                if (!response.ok) {
                    throw new Error('Sync failed');
                }

                if (data.broadcast === false) {
                    setStatus('Reverb mati — jalankan: php artisan reverb:start', 'text-amber-600');
                    return;
                }

                setStatus('Tersinkron', 'text-green-600');
            })
            .catch(() => setStatus('Gagal simpan ke server', 'text-red-500'));
    };

    const saveRevision = () => {
        fetch(`/document/${documentId}/update`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                Accept: 'application/json',
            },
            body: JSON.stringify({ content: editor.value }),
        }).catch(() => {});
    };

    editor.addEventListener('input', () => {
        if (applyingRemote) {
            return;
        }

        setStatus('Mengetik...', 'text-blue-500');

        clearTimeout(syncTimeout);
        syncTimeout = setTimeout(syncContent, 80);

        clearTimeout(saveTimeout);
        saveTimeout = setTimeout(saveRevision, 2000);
    });

    const channel = window.Echo.join(`document.${documentId}`);

    channel
        .here(() => setStatus('Terhubung — siap kolaborasi', 'text-green-600'))
        .joining(() => setStatus('User lain bergabung', 'text-green-600'))
        .leaving(() => setStatus('User lain keluar', 'text-slate-400'))
        .listen('.document.updated', (event) => {
            if (Number(event.userId) === userId) {
                return;
            }

            applyingRemote = true;
            editor.value = event.content ?? '';
            applyingRemote = false;

            setStatus('Diperbarui oleh kolaborator', 'text-green-600');
        })
        .error(() => setStatus('WebSocket gagal — jalankan: php artisan reverb:start', 'text-red-500'));
}

document.addEventListener('DOMContentLoaded', () => {
    waitForEcho(initDocumentEditor);
});
