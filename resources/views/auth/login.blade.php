<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FastPrint Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4">

    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-100 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-100 rounded-full blur-[120px]"></div>
    </div>

    <div
        class="w-full max-w-[1100px] grid md:grid-cols-2 bg-white rounded-[32px] shadow-2xl overflow-hidden border border-white">

        <div
            class="hidden md:flex flex-col justify-center items-center bg-indigo-600 p-12 text-white relative overflow-hidden">
            <div class="relative z-10 text-center">
                <h2 class="text-4xl font-bold mb-6">Selamat Datang Kembali</h2>
                <p class="text-indigo-100 text-lg leading-relaxed">
                    Kelola data produk dan inventaris FastPrint dalam satu dashboard terintegrasi.
                </p>
            </div>
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full -ml-10 -mb-10"></div>
        </div>

        <div class="p-8 md:p-16 flex flex-col justify-center">
            <div class="mb-10 text-center md:text-left">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-indigo-600 rounded-xl mb-4 text-white">
                    <i class="fas fa-print text-xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-slate-900">Login Akun</h1>
                <p class="text-slate-500 mt-2">Silakan masukkan kredensial Anda</p>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 ml-1">Email / Username</label>
                    <div class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <i class="far fa-envelope"></i>
                        </span>
                        <input type="email" name="email" required
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all"
                            placeholder="nama@email.com">
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center ml-1">
                        <label class="text-sm font-semibold text-slate-700">Password</label>
                        <a href="#" class="text-xs text-indigo-600 font-semibold hover:underline">Lupa
                            Password?</a>
                    </div>
                    <div class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input type="password" name="password" required
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <label class="flex items-center space-x-3 cursor-pointer group">
                    <input type="checkbox"
                        class="w-5 h-5 rounded-lg border-slate-300 text-indigo-600 focus:ring-indigo-500/20 cursor-pointer">
                    <span class="text-sm text-slate-600 group-hover:text-slate-900 transition-colors">Ingat saya di
                        perangkat ini</span>
                </label>

                <button type="submit"
                    class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-200 transition-all transform hover:-translate-y-0.5 active:scale-[0.98]">
                    Masuk Sekarang
                </button>
            </form>
        </div>
    </div>
</body>

</html>
