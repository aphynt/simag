<div class="modal fade" id="insertMonitoring" tabindex="-1" aria-labelledby="insertMonitoring" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('monitoring.insert') }}">
                                            @csrf

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalVerifikasiLabel">
                                                    <i class="ri-check-double-line me-1 text-success"></i>
                                                    Verifikasi Pengajuan
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="keteranganVerifikasi" class="form-label">Keterangan</label>
                                                    <textarea name="keterangan"
                                                            id="keteranganVerifikasi"
                                                            class="form-control"
                                                            rows="3"
                                                            placeholder="Tuliskan catatan/verifikasi untuk pengajuan ini..."
                                                            required></textarea>
                                                </div>
                                                {{-- Jika mau kirim status via form juga --}}
                                                <input type="hidden" name="status" value="diverifikasi">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="ri-check-line me-1"></i>
                                                    Simpan Verifikasi
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
