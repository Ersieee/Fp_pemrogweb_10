<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Gaya tambahan untuk preview gambar agar terlihat rapi */
        #ktpPreview img, #selfiePreview img {
            max-width: 100%;
            height: auto;
            max-height: 200px; /* Batasi tinggi preview */
            object-fit: contain;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>
<body class="about-page" style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f0f2f5;">

    <nav style="position: fixed; top: 0; width: 100%; z-index: 100;">
        <ul>
            <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ url('/rental') }}" class="{{ Request::is('rental') ? 'active' : '' }}"><i class="fas fa-car"></i> Rental</a></li>
            <li><a href="{{ url('/pelayanan') }}" class="{{ Request::is('pelayanan') ? 'active' : '' }}"><i class="fas fa-concierge-bell"></i> Pelayanan</a></li>
            <li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}"><i class="fas fa-users"></i> Tentang Kami</a></li>
            <li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Kontak</a></li>
            <li><a href="{{ url('/blog') }}" class="<{{ Request::is('blog') ? 'active' : '' }}"><i class="fas fa-blog"></i> Blog</a></li>
            <li><a href="/login" title="login"><i class="fas fa-user-circle navbar-login-icon"></i></a></li>
        </ul>
    </nav>

    <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded shadow-md w-96" style="margin-top: 80px;" enctype="multipart/form-data">
        @csrf
        <h2 class="text-xl font-semibold mb-4 text-center">Daftar Akun</h2>

        <input name="name" type="text" placeholder="Nama Lengkap" class="w-full p-2 mb-3 border rounded" required>
        @error('name')
            <p class="text-red-500 text-xs mt-1 mb-2">{{ $message }}</p>
        @enderror

        <input name="email" type="email" placeholder="Email" class="w-full p-2 mb-3 border rounded" required>
        @error('email')
            <p class="text-red-500 text-xs mt-1 mb-2">{{ $message }}</p>
        @enderror

        <input name="phone" type="text" placeholder="Nomor Telepon" class="w-full p-2 mb-3 border rounded" required>
        @error('phone')
            <p class="text-red-500 text-xs mt-1 mb-2">{{ $message }}</p>
        @enderror

        <input name="password" type="password" placeholder="Password" class="w-full p-2 mb-3 border rounded" required>
        @error('password')
            <p class="text-red-500 text-xs mt-1 mb-2">{{ $message }}</p>
        @enderror

        <input name="password_confirmation" type="password" placeholder="Konfirmasi Password" class="w-full p-2 mb-4 border rounded" required>

        {{-- BAGIAN BARU: Verifikasi KTP & Wajah --}}
        <div class="border-t border-gray-300 mt-6 pt-6 text-center text-gray-600">
            — Verifikasi Identitas —
        </div>
        <p class="text-center text-sm text-gray-500 mb-4 mt-2">
            Untuk menyelesaikan pendaftaran, mohon unggah foto KTP dan lakukan verifikasi wajah.
        </p>

        <label for="foto_ktp" class="block text-sm font-medium text-gray-700 mb-1">Foto KTP (Pastikan Jelas & Tidak Buram)</label>
        <input type="file" name="foto_ktp_file" id="foto_ktp" accept="image/*" capture="environment" class="w-full p-2 mb-2 border rounded text-sm text-gray-900 focus:outline-none focus:border-blue-500">
        <button type="button" id="btnAmbilKtp" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 mb-4">Ambil Foto KTP</button>
        <div id="ktpPreview" class="text-center mb-4"></div>

        <label for="selfie_wajah" class="block text-sm font-medium text-gray-700 mb-1 mt-4">Foto Wajah (Selfie)</label>
        <video id="videoSelfie" width="100%" height="auto" autoplay playsinline class="rounded-lg mb-2" style="background-color: #eee;"></video>
        <button type="button" id="btnAmbilSelfie" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 mb-4">Ambil Foto Wajah</button>
        <canvas id="canvasSelfie" style="display:none;"></canvas>
        <div id="selfiePreview" class="text-center mb-4"></div>

        {{-- Hidden input fields untuk data yang akan dikirim setelah verifikasi API --}}
        <input type="hidden" name="nik" id="nik_ktp_hidden">
        <input type="hidden" name="full_name_ktp" id="full_name_ktp_hidden">
        <input type="hidden" name="dob_ktp" id="dob_ktp_hidden">
        <input type="hidden" name="address_ktp" id="address_ktp_hidden">
        <input type="hidden" name="ktp_image_url" id="ktp_image_url_hidden">
        <input type="hidden" name="selfie_image_url" id="selfie_image_url_hidden">
        <input type="hidden" name="face_verification_status" id="face_verification_status_hidden" value="PENDING"> {{-- Default status --}}
        <input type="hidden" name="verification_transaction_id" id="verification_transaction_id_hidden">


        <button type="submit" id="btnDaftar" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600 mt-4" disabled>Daftar</button>
        <p class="mt-4 text-sm text-center">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login</a></p>
    </form>

<script>
    const videoSelfie = document.getElementById('videoSelfie');
    const canvasSelfie = document.getElementById('canvasSelfie');
    const btnAmbilKtp = document.getElementById('btnAmbilKtp');
    const btnAmbilSelfie = document.getElementById('btnAmbilSelfie');
    const fotoKtpInput = document.getElementById('foto_ktp');
    const ktpPreview = document.getElementById('ktpPreview');
    const selfiePreview = document.getElementById('selfiePreview');
    const btnDaftar = document.getElementById('btnDaftar');

    // Hidden input fields
    const nikKtpHidden = document.getElementById('nik_ktp_hidden');
    const fullNameKtpHidden = document.getElementById('full_name_ktp_hidden');
    const dobKtpHidden = document.getElementById('dob_ktp_hidden');
    const addressKtpHidden = document.getElementById('address_ktp_hidden');
    const ktpImageURLHidden = document.getElementById('ktp_image_url_hidden');
    const selfieImageURLHidden = document.getElementById('selfie_image_url_hidden');
    const faceVerificationStatusHidden = document.getElementById('face_verification_status_hidden');
    const verificationTransactionIdHidden = document.getElementById('verification_transaction_id_hidden');

    let ktpFile = null;
    let selfieBlob = null; // Use Blob for direct upload if API supports

    // Fungsi untuk mengakses kamera
    async function setupCamera() {
        try {
            // Pastikan stream sebelumnya dihentikan jika ada
            if (videoSelfie.srcObject) {
                videoSelfie.srcObject.getTracks().forEach(track => track.stop());
                videoSelfie.srcObject = null;
            }
            const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user' } }); // 'user' untuk kamera depan
            videoSelfie.srcObject = stream;
            videoSelfie.play();
            console.log("Kamera aktif.");
        } catch (err) {
            console.error("Gagal mengakses kamera: ", err);
            alert("Gagal mengakses kamera. Mohon izinkan akses kamera untuk verifikasi wajah."); // Berikan alert ke user
        }
    }

    // Event listener untuk input file KTP
    btnAmbilKtp.addEventListener('click', () => {
        fotoKtpInput.click(); // Trigger the hidden file input
    });

    fotoKtpInput.addEventListener('change', (event) => {
        ktpFile = event.target.files[0];
        if (ktpFile) {
            const reader = new FileReader();
            reader.onload = (e) => {
                ktpPreview.innerHTML = `<img src="${e.target.result}" alt="Preview KTP" class="max-w-xs h-auto rounded-lg shadow-md border border-gray-300">`;
                console.log("KTP file selected, ready for API upload.");
                checkVerificationProgress(); // Cek jika kedua file sudah siap
            };
            reader.readAsDataURL(ktpFile); // Untuk preview
        } else {
            ktpPreview.innerHTML = '';
            ktpFile = null;
            checkVerificationProgress();
        }
    });

    // Event listener untuk tombol ambil selfie
    btnAmbilSelfie.addEventListener('click', () => {
        if (!videoSelfie.srcObject) {
            alert("Kamera belum aktif. Mohon izinkan akses kamera terlebih dahulu.");
            return;
        }

        canvasSelfie.width = videoSelfie.videoWidth;
        canvasSelfie.height = videoSelfie.videoHeight;
        canvasSelfie.getContext('2d').drawImage(videoSelfie, 0, 0, canvasSelfie.width, canvasSelfie.height);
        canvasSelfie.toBlob((blob) => {
            selfieBlob = blob;
            const imageUrl = URL.createObjectURL(blob);
            selfiePreview.innerHTML = `<img src="${imageUrl}" alt="Preview Selfie" class="max-w-xs h-auto rounded-lg shadow-md border border-gray-300">`;
            console.log("Selfie taken, ready for API upload.");

            // Stop camera stream setelah mengambil foto
            if (videoSelfie.srcObject) {
                videoSelfie.srcObject.getTracks().forEach(track => track.stop());
                videoSelfie.srcObject = null; // Reset srcObject
            }
            checkVerificationProgress(); // Cek jika kedua file sudah siap
        }, 'image/png');
    });

    // Fungsi untuk mensimulasikan API KYC
    // GANTI DENGAN IMPLEMENTASI API KYC ASLI ANDA
    async function simulateKycApi(type, file) {
        return new Promise(resolve => {
            setTimeout(() => {
                if (type === 'ktp_ocr') {
                    // Contoh data KTP yang didapat dari OCR
                    resolve({
                        success: true,
                        data: {
                            nik: '3304123456789012', // Contoh NIK
                            full_name: 'Budi Santoso', // Contoh nama
                            dob: '1990-05-15', // Contoh tanggal lahir
                            address: 'Jl. Contoh No. 123, Desa Contoh, Kec. Contoh, Kab. Contoh', // Contoh alamat
                            image_url: 'https://via.placeholder.com/150/0000FF/FFFFFF?text=KTP-Uploaded' // URL dummy
                        },
                        message: 'OCR KTP berhasil.'
                    });
                } else if (type === 'face_verification') {
                    // Contoh hasil verifikasi wajah
                    resolve({
                        success: true,
                        status: 'VERIFIED', // Bisa juga 'PENDING', 'FAILED', 'MANUAL_REVIEW'
                        data: {
                            image_url: 'https://via.placeholder.com/150/FF0000/FFFFFF?text=Selfie-Uploaded', // URL dummy
                            transaction_id: 'TXN' + Date.now() // ID transaksi dummy
                        },
                        message: 'Verifikasi wajah berhasil.'
                    });
                }
            }, 2000); // Simulasi delay 2 detik
        });
    }


    // Fungsi untuk memicu proses verifikasi ke API (Contoh)
    async function processVerification() {
        if (!ktpFile || !selfieBlob) {
            console.log("KTP atau Selfie belum lengkap.");
            return;
        }

        btnDaftar.disabled = true; // Nonaktifkan tombol daftar sementara proses
        btnDaftar.textContent = 'Memverifikasi Identitas...';
        btnDaftar.classList.remove('bg-green-500', 'hover:bg-green-600', 'bg-orange-500', 'hover:bg-orange-600'); // Hapus semua warna
        btnDaftar.classList.add('bg-gray-400', 'cursor-not-allowed');

        try {
            // --- LANGKAH 1: Unggah KTP & Lakukan OCR ---
            console.log("Mulai proses OCR KTP...");
            // GANTI simulateKycApi dengan fetch ke API KYC KTP OCR Anda yang sesungguhnya
            const ktpResult = await simulateKycApi('ktp_ocr', ktpFile);

            if (ktpResult.success) {
                nikKtpHidden.value = ktpResult.data.nik || '';
                fullNameKtpHidden.value = ktpResult.data.full_name || '';
                dobKtpHidden.value = ktpResult.data.dob || ''; // Format 'YYYY-MM-DD'
                addressKtpHidden.value = ktpResult.data.address || '';
                ktpImageURLHidden.value = ktpResult.data.image_url || '';
                console.log("OCR KTP berhasil. Data KTP:", ktpResult.data);
            } else {
                alert('Verifikasi KTP gagal: ' + (ktpResult.message || 'Terjadi kesalahan saat OCR KTP.'));
                resetFormForRetry();
                return;
            }

            // --- LANGKAH 2: Unggah Selfie & Lakukan Face Match/Liveness ---
            console.log("Mulai proses verifikasi wajah...");
            // GANTI simulateKycApi dengan fetch ke API KYC Face Verification Anda yang sesungguhnya
            const faceResult = await simulateKycApi('face_verification', selfieBlob);

            if (faceResult.success) {
                faceVerificationStatusHidden.value = faceResult.status;
                selfieImageURLHidden.value = faceResult.data.image_url || '';
                verificationTransactionIdHidden.value = faceResult.data.transaction_id || '';
                console.log("Verifikasi wajah berhasil. Status:", faceResult.status);

                if (faceResult.status === 'VERIFIED') {
                    btnDaftar.disabled = false;
                    btnDaftar.textContent = 'Daftar';
                    btnDaftar.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    btnDaftar.classList.add('bg-green-500', 'hover:bg-green-600');
                    alert('Verifikasi identitas berhasil! Anda dapat mendaftar sekarang.');
                } else if (faceResult.status === 'MANUAL_REVIEW') {
                    btnDaftar.disabled = false;
                    btnDaftar.textContent = 'Daftar (Perlu Review)';
                    btnDaftar.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    btnDaftar.classList.add('bg-orange-500', 'hover:bg-orange-600');
                    alert('Verifikasi identitas memerlukan peninjauan. Anda dapat mendaftar, namun akun akan aktif setelah diverifikasi.');
                } else { // FAILED
                    alert('Verifikasi wajah gagal: ' + (faceResult.message || 'Mohon coba lagi dengan foto yang lebih jelas.'));
                    faceVerificationStatusHidden.value = 'FAILED';
                    resetFormForRetry();
                }
            } else {
                alert('Verifikasi wajah gagal: ' + (faceResult.message || 'Terjadi kesalahan.'));
                faceVerificationStatusHidden.value = 'FAILED';
                resetFormForRetry();
            }

        } catch (error) {
            console.error("Error selama proses verifikasi:", error);
            alert("Terjadi kesalahan saat memverifikasi identitas. Mohon periksa koneksi atau coba lagi.");
            faceVerificationStatusHidden.value = 'FAILED';
            resetFormForRetry();
        }
    }

    // Fungsi untuk mereset form jika verifikasi gagal atau perlu diulang
    function resetFormForRetry() {
        btnDaftar.disabled = true;
        btnDaftar.textContent = 'Daftar';
        btnDaftar.classList.remove('bg-gray-400', 'cursor-not-allowed', 'bg-orange-500', 'hover:bg-orange-600');
        btnDaftar.classList.add('bg-green-500', 'hover:bg-green-600');
        // Reset file dan preview
        ktpFile = null;
        selfieBlob = null;
        fotoKtpInput.value = ''; // Reset input file
        ktpPreview.innerHTML = '';
        selfiePreview.innerHTML = '';
        // Reset hidden fields
        nikKtpHidden.value = '';
        fullNameKtpHidden.value = '';
        dobKtpHidden.value = '';
        addressKtpHidden.value = '';
        ktpImageURLHidden.value = '';
        selfieImageURLHidden.value = '';
        faceVerificationStatusHidden.value = 'PENDING';
        verificationTransactionIdHidden.value = '';

        // Aktifkan kembali kamera
        setupCamera();
        console.log("Form direset, siap untuk mencoba verifikasi lagi.");
    }

    // Cek progress verifikasi dan panggil processVerification jika kedua file sudah ada
    function checkVerificationProgress() {
        if (ktpFile && selfieBlob) {
            // Semua input yang diperlukan untuk verifikasi sudah ada, panggil prosesnya
            processVerification();
        } else {
            // Jika belum lengkap, tombol daftar tetap disabled
            btnDaftar.disabled = true;
            btnDaftar.textContent = 'Daftar';
            btnDaftar.classList.remove('bg-gray-400', 'cursor-not-allowed', 'bg-orange-500', 'hover:bg-orange-600');
            btnDaftar.classList.add('bg-green-500', 'hover:bg-green-600');
        }
    }

    // Inisialisasi kamera dan nonaktifkan tombol daftar saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        setupCamera();
        btnDaftar.disabled = true; // Pastikan tombol di-disable saat load
    });

    // Mencegah submit form jika verifikasi belum VERIFIED atau MANUAL_REVIEW
    document.querySelector('form').addEventListener('submit', (e) => {
        // Izinkan submit jika statusnya VERIFIED atau MANUAL_REVIEW
        if (faceVerificationStatusHidden.value !== 'VERIFIED' && faceVerificationStatusHidden.value !== 'MANUAL_REVIEW') {
            e.preventDefault();
            alert('Anda harus menyelesaikan verifikasi KTP dan wajah terlebih dahulu untuk mendaftar.');
            return false; // Mencegah submit
        }
        // Jika status sudah VERIFIED atau MANUAL_REVIEW, form akan di-submit
        console.log("Form disubmit dengan status verifikasi:", faceVerificationStatusHidden.value);
    });

</script>
</body>
</html> 