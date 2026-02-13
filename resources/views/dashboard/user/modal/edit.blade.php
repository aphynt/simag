<div class="modal fade" id="ubahUser{{ $item->id }}" tabindex="-1" aria-labelledby="modalTambahUser" data-bs-keyboard="false"
    aria-hidden="true">
    <!-- Scrollable modal -->
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="staticBackdropLabel4">Edit User
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
             <form action="{{ route('user.list.update', $item->id) }}" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIP/NIM</label>
                        <input type="text" name="nim" class="form-control" value="{{ $item->nim }}" readonly required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="{{ $item->role }}">{{ ucwords($item->role) }}</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="prodi">Prodi</option>
                            <option value="wd3">WD3</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select name="program_studi" class="form-select">
                            <option value="{{ $item->program_studi }}">{{ ucwords($item->program_studi) }}</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>

            </form>

        </div>
    </div>
</div>
