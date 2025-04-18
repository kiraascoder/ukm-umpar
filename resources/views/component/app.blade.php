<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi UKM UMPAR')</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-800 bg-gradient-to-b from-sky-50 to-white">
    @include('component.navbar')
    <div class="container mx-auto">
        @yield('content')
    </div>
    @include('component.footer')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.directive('intersect', (el, {
                value,
                expression,
                modifiers
            }) => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            value(entry.target);
                            if (modifiers.includes('once')) {
                                observer.unobserve(entry.target);
                            }
                        }
                    });
                }, {
                    root: null,
                    threshold: 0.1,
                    rootMargin: '0px'
                });

                observer.observe(el);

                return () => {
                    observer.unobserve(el);
                };
            });
            Alpine.data('gallery', () => ({
                photos: [
                    'https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1497217968520-7d8d34bfa9c6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1602353225887-4486f295dde7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1565538810643-b5bdb714032a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
                ],
                current: 0,
                next() {
                    this.current = (this.current + 1) % this.photos.length;
                },
                prev() {
                    this.current = (this.current - 1 + this.photos.length) % this.photos.length;
                }
            }));

            // Contact form
            Alpine.data('contactForm', () => ({
                name: '',
                email: '',
                phone: '',
                message: '',
                submitted: false,
                loading: false,
                errors: {},

                validate() {
                    this.errors = {};

                    if (!this.name.trim()) {
                        this.errors.name = 'Name is required';
                    }

                    if (!this.email.trim()) {
                        this.errors.email = 'Email is required';
                    } else if (!/^\S+@\S+\.\S+$/.test(this.email)) {
                        this.errors.email = 'Please enter a valid email';
                    }

                    if (!this.message.trim()) {
                        this.errors.message = 'Message is required';
                    }

                    return Object.keys(this.errors).length === 0;
                },

                submit() {
                    if (this.validate()) {
                        this.loading = true;
                        setTimeout(() => {
                            this.loading = false;
                            this.submitted = true;
                            this.resetForm();
                        }, 1500);
                    }
                },

                resetForm() {
                    this.name = '';
                    this.email = '';
                    this.phone = '';
                    this.message = '';
                }
            }));
        });
    </script>
</body>

</html>
