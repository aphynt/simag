<footer class="footer mt-auto py-3 bg-white text-center">
    <div class="container">
        <span class="text-muted"> Copyright © <span id="year"></span> <a href="javascript:void(0);"
                class="text-dark fw-medium">{{ config('app.name') }}</a>.
            Designed with <span class="bi bi-heart-fill text-danger"></span> by <a href="https://ahmadfadillah.my.id/"
                target="_blank">
                <span class="fw-medium text-primary">Aphynt</span>
            </a> All
            rights
            reserved
        </span>
    </div>
</footer> <!-- End Footer -->

<!-- Country-selector modal -->
<div class="modal fade" id="header-responsive-search" tabindex="-1" aria-labelledby="header-responsive-search"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" class="form-control border-end-0" placeholder="Search Anything ..."
                        aria-label="Search Anything ..." aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i
                            class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Country-selector modal -->



</div>

<!-- SCRIPTS -->
<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="ti ti-arrow-narrow-up fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->

<script>
    function disableButton() {
  document.getElementById("myButton").disabled = true;
}
</script>

<!-- Popper JS -->
<script src="{{ asset('dash') }}/build/assets/libs/%40popperjs/core/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('dash') }}/build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Node Waves JS-->
<script src="{{ asset('dash') }}/build/assets/libs/node-waves/waves.min.js"></script>

<!-- Simplebar JS -->
<script src="{{ asset('dash') }}/build/assets/libs/simplebar/simplebar.min.js"></script>
<link rel="modulepreload" href="{{ asset('dash') }}/build/assets/simplebar-B35Aj-bA.js" />
<script type="module" src="{{ asset('dash') }}/build/assets/simplebar-B35Aj-bA.js"></script>
<!-- Auto Complete JS -->
<script src="{{ asset('dash') }}/build/assets/libs/%40tarekraafat/autocomplete.js/autoComplete.min.js"></script>

<!-- Color Picker JS -->
<script src="{{ asset('dash') }}/build/assets/libs/%40simonwep/pickr/pickr.es5.min.js"></script>

<!-- Date & Time Picker JS -->
<script src="{{ asset('dash') }}/build/assets/libs/flatpickr/flatpickr.min.js"></script>

<script src="{{ asset('dash') }}/code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Datatables Cdn -->
<script src="{{ asset('dash') }}/cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('dash') }}/cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('dash') }}/cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('dash') }}/cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('dash') }}/cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="{{ asset('dash') }}/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="{{ asset('dash') }}/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="{{ asset('dash') }}/cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="{{ asset('dash') }}/cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Internal Datatables JS -->
<link rel="modulepreload" href="{{ asset('dash') }}/build/assets/datatables-_3Z3Rdpk.js" /><script type="module" src="{{ asset('dash') }}/build/assets/datatables-_3Z3Rdpk.js"></script>


<!-- Apex Charts JS -->
<script src="{{ asset('dash') }}/build/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Sales Dashboard -->
<link rel="modulepreload" href="{{ asset('dash') }}/build/assets/sales-dashboard-BU3coFtq.js" />
<script type="module" src="{{ asset('dash') }}/build/assets/sales-dashboard-BU3coFtq.js"></script>


<!-- Sticky JS -->
<script src="{{ asset('dash') }}/build/assets/sticky.js"></script>

<!-- Custom-Switcher JS -->
<link rel="modulepreload" href="{{ asset('dash') }}/build/assets/custom-switcher-BayzdO2G.js" />
<script type="module" src="{{ asset('dash') }}/build/assets/custom-switcher-BayzdO2G.js"></script>
<!-- APP JS-->
<link rel="modulepreload" href="{{ asset('dash') }}/build/assets/app-C4M4tSMb.js" />
<script type="module" src="{{ asset('dash') }}/build/assets/app-C4M4tSMb.js"></script>
<!-- END SCRIPTS -->

</body>

</html>
