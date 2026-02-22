<div class="modal fade" id="verifikasiTolak{{ $data->uuid }}" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST"
                      action="{{ route('evaluasi.verifikasiTolak', $data->uuid) }}"
                      class="modal-content">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">
                            Tolak Evaluasi
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Keterangan Verifikasi</label>
                            <textarea name="keterangan_evaluasi"
                                      class="form-control"
                                      rows="4"
                                      required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit"
                                class="btn btn-success">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
