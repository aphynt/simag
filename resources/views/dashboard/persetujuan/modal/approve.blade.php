<div class="modal fade" id="approveMagang{{ $d->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                {{-- <lord-icon
                    src="../tdrtiskw.json"
                    trigger="loop"
                    colors="primary:#f7b84b,secondary:#405189"
                    style="width:130px;height:130px">
                </lord-icon> --}}

                <div class="mt-0 pt-4">
                    <h4>Yakin ingin approve Magang ini?</h4>

                    <form action="{{ route('persetujuan.approve', $d->uuid) }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-success">
                            Approve
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
