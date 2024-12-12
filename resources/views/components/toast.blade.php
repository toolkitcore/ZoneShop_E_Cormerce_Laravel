<!-- resources/views/components/toast.blade.php -->
@if (session('success') || session('error') || session('warning') || $errors->any())
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

        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                showToast("{{ session('success') }}", {
                    gravity: 'top',
                    position: 'right',
                    duration: 5000,
                    close: true,
                    backgroundColor: '#28a745' // Màu xanh cho thông báo thành công
                });
            @endif

            @if (session('error'))
                showToast("{{ session('error') }}", {
                    gravity: 'top',
                    position: 'right',
                    duration: 5000,
                    close: true,
                    backgroundColor: '#dc3545' // Màu đỏ cho thông báo lỗi
                });
            @endif

            @if (session('warning'))
                showToast("{{ session('warning') }}", {
                    gravity: 'top',
                    position: 'right',
                    duration: 5000,
                    close: true,
                    backgroundColor: '#ffcc00' // Màu cam cho thông báo cảnh báo
                });
            @endif

            @if ($errors->any())
                var errorText =
                    "@foreach ($errors->all() as $error){{ $error }}@endforeach";
                showToast(errorText, {
                    gravity: 'top',
                    position: 'right',
                    duration: 10000, // Thời gian hiển thị lâu hơn cho lỗi xác thực
                    close: true,
                    backgroundColor: '#ffc107' // Màu vàng cho thông báo lỗi xác thực
                });
            @endif
        });
    </script>
@endif
