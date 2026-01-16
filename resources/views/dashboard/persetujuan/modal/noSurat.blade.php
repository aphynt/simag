<div class="modal fade" id="noSurat{{ $d->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan No. Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body">
                <form action="{{ route('persetujuan.updateNoSurat', $d->uuid) }}" method="POST">
                    @csrf
                    @method('put')

                    <!-- INPUT NO SURAT -->
                    <div class="mb-3 text-start">
                        <label class="form-label">No. Surat</label>
                        <input type="text"
                               name="no_surat"
                               class="form-control"
                               placeholder="Contoh: 123/FIK-UMI/VI/2026"
                               required>
                    </div>

                    <!-- TANGGAL SURAT (OPSIONAL) -->
                    <div class="mb-3 text-start">
                        <label class="form-label">Tanggal Surat</label>
                        <input type="date"
                               name="tanggal_surat"
                               class="form-control" required>
                    </div>

                    <!-- BUTTON -->
                    <div class="text-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan No. Surat
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
