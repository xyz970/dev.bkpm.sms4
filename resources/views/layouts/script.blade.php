  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
  <script src="{{ asset('assets/js/yearpicker.js') }}"></script>
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

  <script>
      $(function() {
          const notifications = localStorage.getItem('notifications')
          if (notifications != 0) {
              $('#notification-count').text(notifications);
          }
      });
      $('#dropdown').on('click', function() {
          localStorage.removeItem("notifications");
          localStorage.setItem("notifications", 0);
          const notifications = localStorage.getItem("notifications");
          if (notifications == 0) {
              $('#notification-count').text('');
              $('#notification-count').attr('data-count', 0);
          }
      });
      var notificationsWrapper = $('#notification-count');
      var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount = parseInt($('#notification-count').data('count'));
      console.log(notificationsCount);
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('ab2f05fba0804d52a57f', {
          cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind("App\\Events\\BroadcastMessage", function(data) {});
      channel.bind('pusher:subscription_succeeded', function(data) {});


      channel.bind('my-event', function(data) {
          notifications = parseInt(localStorage.getItem('notifications'));
          notifications += 1;
          console.log(notifications)
          localStorage.setItem("notifications", notifications);
          notificationsWrapper.attr('data-count', notifications);
          notificationsWrapper.text(notifications);
      });
  </script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
