@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Halaman Presensi</h4>
                </div>
                <div class="card-body">
                    <!-- Tampilkan Waktu dan Tanggal (Real-Time) -->
                    <div class="text-center mb-4">
                        <h5 id="tanggal"></h5>
                        <p id="jam"></p>
                    </div>

                    <!-- Jika belum check-in -->
                    @if(!session('hasCheckedIn'))
                    <form action="{{ route('presensi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Kamera untuk mengambil foto -->
                        <div class="form-group text-center">
                            <div id="camera-controls">
                                <button type="button" class="btn btn-primary mt-3" id="start-camera">Buka Kamera</button>
                                <video id="video" width="100%" height="300" style="display:none;" autoplay></video>
                                <canvas id="canvas" class="d-none"></canvas>
                                <button type="button" class="btn btn-success mt-3" id="take-photo" style="display:none;">Ambil Foto</button>
                            </div>
                            <div id="photo-result" class="d-none text-center">
                                <h5>Foto Hasil Presensi</h5>
                                <img id="photo" width="100%" alt="Foto Kehadiran" />
                                <input type="hidden" name="foto_kehadiran" id="foto_kehadiran" />
                                <br>
                                <button type="button" class="btn btn-warning mt-3" id="retake-photo">Ambil Foto Ulang</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Masuk (Check In)</button>
                    </form>
                    @else
                    <!-- Jika sudah check-in -->
                    <form action="{{ route('presensi.checkout', ['uuid' => session('presensi_uuid')]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="deskripsi_pekerjaan">Apa yang Anda kerjakan hari ini?</label>
                            <textarea name="deskripsi_pekerjaan" class="form-control" rows="4" placeholder="Isi deskripsi pekerjaan..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block mt-3">Keluar (Check Out)</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Menampilkan waktu real-time berdasarkan zona waktu Jakarta
    function updateClock() {
        const now = new Date().toLocaleString("en-US", { timeZone: "Asia/Jakarta" });
        const nowDate = new Date(now);

        document.getElementById('tanggal').innerHTML = nowDate.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        document.getElementById('jam').innerHTML = nowDate.toLocaleTimeString('id-ID');
    }

    setInterval(updateClock, 1000); // Memperbarui jam setiap detik

    // Kamera dan Foto
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const takePhotoButton = document.getElementById('take-photo');
    const startCameraButton = document.getElementById('start-camera');
    const photoResultDiv = document.getElementById('photo-result');
    const cameraControlsDiv = document.getElementById('camera-controls');
    const fotoKehadiranInput = document.getElementById('foto_kehadiran');
    const photoImage = document.getElementById('photo');
    const retakePhotoButton = document.getElementById('retake-photo');

    let cameraStream = null;

    // Buka Kamera
    startCameraButton.addEventListener('click', () => {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                cameraStream = stream;
                video.srcObject = stream;
                video.style.display = "block";
                startCameraButton.style.display = "none";
                takePhotoButton.style.display = "inline-block";
            })
            .catch((err) => {
                alert("Kamera tidak dapat diakses: " + err.message);
            });
    });

    // Ambil Foto
    takePhotoButton.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        const imageDataURL = canvas.toDataURL('image/png');
        fotoKehadiranInput.value = imageDataURL;
        photoImage.src = imageDataURL;

        // Tampilkan Base64 di console
        console.log("Base64 Image Data:", imageDataURL);

        video.style.display = "none";
        photoResultDiv.style.display = "block";
        cameraControlsDiv.style.display = "none";

        if (cameraStream) {
            cameraStream.getTracks().forEach(track => track.stop());
        }
    });

    // Ambil Foto Ulang
    retakePhotoButton.addEventListener('click', () => {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                cameraStream = stream;
                video.srcObject = stream;
                video.style.display = "block";
                photoResultDiv.style.display = "none";
                takePhotoButton.style.display = "inline-block";
            })
            .catch((err) => {
                alert("Kamera tidak dapat diakses: " + err.message);
            });
    });
</script>
@endsection
