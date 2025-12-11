<div class="modal fade" id="resetPassword{{ $item->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <lord-icon
                    src="../tdrtiskw.json"
                    trigger="loop"
                    colors="primary:#f7b84b,secondary:#405189"
                    style="width:130px;height:130px">
                </lord-icon>

                <div class="mt-0 pt-4">
                    <h4>Yakin ingin mereset password?</h4>
                    <p class="text-muted">Password akan diubah ke default</p>

                    <form action="{{ route('user.resetPassword', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">
                            Reset Password
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
