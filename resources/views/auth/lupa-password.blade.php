<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Admin</title>
    <link rel="icon" href="umpar.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="mt-12 flex flex-col items-center">
                    <!-- Back Button -->
                    <div class="w-full mb-6">
                        <a href="javascript:history.back()"
                            class="inline-flex items-center text-gray-600 hover:text-gray-800 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>

                    <!-- Icon -->
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 7a2 2 0 012 2m0 0v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9a2 2 0 012-2m6 0V7a2 2 0 00-2-2H9a2 2 0 00-2 2v2m6 0h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>

                    <h1 class="text-2xl xl:text-3xl font-extrabold text-center mb-2">
                        Lupa Password?
                    </h1>
                    <p class="text-gray-500 text-center mb-8 max-w-md">
                        Masukkan email Anda dan kami akan mengirimkan link untuk reset password ke email Anda.
                    </p>

                    <!-- Success Message -->
                    <div id="successMessage"
                        class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6 w-full text-center">
                        <div class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Link reset password telah dikirim ke email Anda!
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage"
                        class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6 w-full text-center">
                        <div class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span id="errorText">Email tidak ditemukan dalam sistem.</span>
                        </div>
                    </div>

                    <div class="w-full flex-1">
                        <form id="forgotPasswordForm" onsubmit="handleSubmit(event)">
                            <div class="mx-auto max-w-xs">
                                <!-- Email Input -->
                                <div class="relative">
                                    <input id="email"
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-blue-400 focus:bg-white transition-all duration-200"
                                        type="email" placeholder="Masukkan email Anda" name="email" required />
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                            </path>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button id="submitBtn"
                                    class="mt-6 tracking-wide w-full py-4 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                                    type="submit">
                                    <span id="submitText">Kirim Link Reset</span>
                                    <div id="loadingSpinner" class="hidden ml-2">
                                        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </div>
                                </button>

                                <!-- Divider -->
                                <div class="my-8 border-b text-center">
                                    <div
                                        class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                        Atau
                                    </div>
                                </div>

                                <!-- Back to Login -->
                                <div class="text-center">
                                    <p class="text-sm text-gray-600">
                                        Sudah ingat password Anda?
                                        <a href="javascript:history.back()"
                                            class="font-semibold text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                            Kembali ke Login
                                        </a>
                                    </p>
                                </div>

                                <!-- Help Text -->
                                <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div class="text-sm text-blue-700">
                                            <p class="font-medium mb-1">Tips:</p>
                                            <ul class="text-xs space-y-1 text-blue-600">
                                                <li>• Periksa folder spam/junk email Anda</li>
                                                <li>• Link reset berlaku selama 24 jam</li>
                                                <li>• Gunakan email yang terdaftar sebagai admin</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Panel with Image -->
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                <div class="w-full h-full bg-cover bg-center bg-no-repeat flex items-center justify-center"
                    style="background-image: url('img/auth.png');">
                    <!-- Overlay content -->
                    <div class="text-center text-white p-8 bg-black bg-opacity-30 rounded-2xl max-w-md">
                        <svg class="w-16 h-16 mx-auto mb-4 text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                        <h3 class="text-xl font-bold mb-2">Keamanan Terjamin</h3>
                        <p class="text-sm opacity-90">
                            Kami menggunakan enkripsi tingkat tinggi untuk melindungi data Anda dan proses reset
                            password yang aman.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleSubmit(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');

            // Hide previous messages
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');

            // Show loading state
            submitBtn.disabled = true;
            submitText.textContent = 'Mengirim...';
            loadingSpinner.classList.remove('hidden');

            // Simulate API call (replace with actual implementation)
            setTimeout(() => {
                // Reset button state
                submitBtn.disabled = false;
                submitText.textContent = 'Kirim Link Reset';
                loadingSpinner.classList.add('hidden');

                // Simulate success/error (replace with actual logic)
                const isSuccess = email.includes('@'); // Simple validation for demo

                if (isSuccess) {
                    successMessage.classList.remove('hidden');
                    document.getElementById('email').value = '';

                    // Auto hide success message after 5 seconds
                    setTimeout(() => {
                        successMessage.classList.add('hidden');
                    }, 5000);
                } else {
                    errorMessage.classList.remove('hidden');

                    // Auto hide error message after 5 seconds
                    setTimeout(() => {
                        errorMessage.classList.add('hidden');
                    }, 5000);
                }
            }, 2000);
        }

        // Real-time email validation
        document.getElementById('email').addEventListener('input', function(e) {
            const email = e.target.value;
            const submitBtn = document.getElementById('submitBtn');

            if (email && email.includes('@') && email.includes('.')) {
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                submitBtn.disabled = false;
            } else {
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                submitBtn.disabled = true;
            }
        });

        // Initialize button state
        document.addEventListener('DOMContentLoaded', function() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            submitBtn.disabled = true;
        });
    </script>
</body>

</html>
