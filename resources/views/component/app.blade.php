<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi UKM UMPAR')</title>
    <link rel="icon" href="{{ asset('umpar.png') }}" type="image/png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Vite compiled CSS -->
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-800 bg-gradient-to-b from-sky-50 to-white min-h-screen flex flex-col">

    @if (!Request::is('/'))
        @include('component.navbar')
    @endif

    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('component.footer')

    <!-- Alpine Custom Directives -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.directive('intersect', (el, {
                value,
                modifiers
            }) => {
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            value(entry.target);
                            if (modifiers.includes('once')) {
                                observer.unobserve(entry.target);
                            }
                        }
                    });
                });
                observer.observe(el);
            });

            Alpine.data('gallery', () => ({
                photos: [...],
                current: 0,
                next() {
                    this.current = (this.current + 1) % this.photos.length
                },
                prev() {
                    this.current = (this.current - 1 + this.photos.length) % this.photos.length
                },
            }));

            Alpine.data('contactForm', () => ({
                name: '',
                email: '',
                phone: '',
                message: '',
                submitted: false,
                loading: false,
                errors: {},
                validate() {
                    ...
                },
                submit() {
                    ...
                },
                resetForm() {
                    ...
                }
            }));
        });
    </script>
</body>

</html>
