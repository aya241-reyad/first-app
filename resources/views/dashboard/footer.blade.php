  <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="text-body">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link">DragonTeam</a>
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
 
 <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('dashboard/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('dashboard/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('dashboard/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('dashboard/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
     
    <script src="{{ asset('dashboard/vendor/libs/apex-charts/apexcharts.js')}}"></script>

   
    <!-- Main JS -->
    <script src=" {{ asset('dashboard/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src=" {{ asset('dashboard/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
