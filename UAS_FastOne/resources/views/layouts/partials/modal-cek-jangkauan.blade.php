{{--
  File ini hanya berisi kode untuk modal "Cek Jangkauan".
  Dapat di-include di view mana pun yang membutuhkannya.
--}}
<div class="modal fade" id="modalCekJangkauan" tabindex="-1" aria-labelledby="modalCekJangkauanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCekJangkauanLabel">Cek Ketersediaan Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Silakan masukkan alamat lengkap Anda untuk mengecek apakah layanan FAST ONE sudah tersedia di area Anda.</p>
                {{-- Form ini nantinya bisa dihubungkan ke controller untuk diproses --}}
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamatLengkap" name="alamat" rows="3" placeholder="Contoh: Jl. Veteran No.93, Kb. Dalem, Kec. Gresik, Kabupaten Gresik, Jawa Timur 61122" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Cek Sekarang</button>
                </form>
                <p class="mt-3 text-center text-muted"><small>Atau hubungi tim kami untuk bantuan pengecekan.</small></p>
            </div>
        </div>
    </div>
</div>
