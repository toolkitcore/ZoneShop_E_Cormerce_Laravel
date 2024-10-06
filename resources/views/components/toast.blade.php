<!-- resources/views/components/toast.blade.php -->
@if (session('success') || session('error'))
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        function showToast(text, options) {
            Toastify({
                text: text,
                gravity: options.gravity, // 'top' hoặc 'bottom'
                position: options.position, // 'left' hoặc 'right'
                duration: options.duration,
                close: true,
                backgroundColor: options.backgroundColor, // Thêm màu cho toast
            }).showToast();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                var toastText = "{{ session('success') }}";
                var toastOptions = {
                    gravity: 'top',
                    position: 'right',
                    duration: 5000,
                    close: 'close',
                    backgroundColor: '#28a745', // Màu xanh cho thông báo thành công
                };
                showToast(toastText, toastOptions);
            @endif

            @if (session('error'))
                var toastText = "{{ session('error') }}";
                var toastOptions = {
                    gravity: 'top',
                    position: 'right',
                    duration: 5000,
                    close: 'close',
                    backgroundColor: '#dc3545', // Màu đỏ cho thông báo lỗi
                };
                showToast(toastText, toastOptions);
            @endif
        });
    </script>
@endif
