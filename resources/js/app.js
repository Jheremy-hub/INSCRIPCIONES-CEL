import './bootstrap';

// Validación de DNI peruano
window.validateDNI = function(dni) {
    const regex = /^[0-9]{8}$/;
    return regex.test(dni);
};

// Preview de imágenes
window.setupImagePreview = function(input, previewId) {
    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                if (preview) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
            };
            reader.readAsDataURL(file);
        }
    });
};

// Drag and Drop para archivos
window.setupDragDrop = function(element) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        element.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        element.addEventListener(eventName, () => {
            element.classList.add('dragover');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        element.addEventListener(eventName, () => {
            element.classList.remove('dragover');
        }, false);
    });

    element.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        const input = element.querySelector('input[type="file"]');
        if (input && files.length > 0) {
            input.files = files;
            const event = new Event('change', { bubbles: true });
            input.dispatchEvent(event);
        }
    }, false);
};

// Validación en tiempo real
document.addEventListener('DOMContentLoaded', function() {
    // DNI validation
    const dniInput = document.querySelector('input[name="dni"]');
    if (dniInput) {
        dniInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 8);
        });
    }

    // Email validation
    const emailInput = document.querySelector('input[name="email"]');
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.classList.add('error');
            } else {
                this.classList.remove('error');
            }
        });
    }

    // Setup drag and drop for all file upload areas
    document.querySelectorAll('.cel-file-upload').forEach(element => {
        setupDragDrop(element);
    });
});
